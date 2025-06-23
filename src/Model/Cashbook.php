<?php

require_once __DIR__ . '/../Core/Database.php';
class Cashbook
{
    public static function getStatistics($startDate, $endDate)
    {
        try {
            $db = Database::connect();

            // Get initial debt from contracts total price (no quantity field)
            $initialDebt = $db->prepare("
                SELECT 
                    p.id AS providerId,
                    p.name AS providerName,
                    SUM(c.price) AS totalDebt
                FROM 
                    Contracts c
                    INNER JOIN Providers p ON c.providerId = p.id
                WHERE 
                    c.signedDate BETWEEN ? AND ?
                GROUP BY 
                    p.id, p.name
            ");
            $initialDebt->execute([$startDate, $endDate]);
            $initialDebtAmount = $initialDebt->fetch(PDO::FETCH_ASSOC)['totalDebt'] ?? 0;

            // Get paid amount from bills in period
            $paidDebt = $db->prepare("
                SELECT 
                    p.id AS providerId,
                    p.name AS providerName,
                    SUM(b.quantity * ps.providePrice) AS totalPaidAmount
                FROM 
                    Bills b
                    INNER JOIN Contracts c ON b.refContractId = c.id
                    INNER JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                    INNER JOIN Providers p ON ps.providerId = p.id
                WHERE 
                    b.paidDate BETWEEN ? AND ?
                GROUP BY 
                    p.id, p.name
            ");
            $paidDebt->execute([$startDate, $endDate]);
            $paidAmount = $paidDebt->fetch(PDO::FETCH_ASSOC)['totalPaidAmount'] ?? 0;

            // Get final debt based on services and bills
            $finalDebt = $db->prepare("
                SELECT 
                    p.id AS providerId,
                    p.name AS providerName,
                    COALESCE(SUM(c.price), 0) - COALESCE(SUM(b.quantity * ps.providePrice), 0) AS outstandingDebt
                FROM 
                    Contracts c
                    INNER JOIN Providers p ON c.providerId = p.id
                    INNER JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                    LEFT JOIN Bills b ON b.refContractId = c.id AND b.paidDate IS NOT NULL
                WHERE 
                    c.signedDate BETWEEN ? AND ?
                GROUP BY 
                    p.id, p.name
            ");
            $finalDebt->execute([$startDate, $endDate]);
            $finalDebtAmount = $finalDebt->fetch(PDO::FETCH_ASSOC)['outstandingDebt'] ?? 0;

            // Get arising debt from overdue contracts
            $arisingDebt = $db->prepare("
                SELECT 
                    p.id AS providerId,
                    p.name AS providerName,
                    COALESCE(SUM(CASE 
                        WHEN c.expireDate < '2025-05-31' THEN c.price - COALESCE((b.quantity * ps.providePrice), 0) 
                        ELSE 0 
                    END), 0) AS overdueDebt
                FROM 
                    Contracts c
                    INNER JOIN Providers p ON c.providerId = p.id
                    INNER JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                    LEFT JOIN Bills b ON b.refContractId = c.id AND b.paidDate IS NOT NULL
                WHERE 
                    c.signedDate BETWEEN ? AND ?
                GROUP BY 
                    p.id, p.name
            ");
            $arisingDebt->execute([$startDate, $endDate]); 
            $arisingDebtAmount = $arisingDebt->fetch(PDO::FETCH_ASSOC)['overdueDebt'] ?? 0;

            return [
                'initial_debt' => $initialDebtAmount,
                'final_debt' => $finalDebtAmount,
                'paid_debt' => $paidAmount,
                'arising_debt' => $arisingDebtAmount
            ];
        } catch (Exception $e) {
            Logger::write('Error in Cashbook::getStatistics: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function getProviderDebts($startDate, $endDate)
    {
        try {
            $db = Database::connect();

            $sql = "
                SELECT 
                    p.id,
                    p.name,
                    (
                        SELECT COALESCE(SUM(c2.price), 0)
                        FROM Contracts c2
                        WHERE c2.providerId = p.id 
                        AND c2.signedDate < ?
                    ) as initial_debt,
                    (
                        SELECT COALESCE(SUM(ps3.providePrice * b.quantity), 0)
                        FROM Contracts c3
                        JOIN Bills b ON b.refContractId = c3.id
                        JOIN Services s3 ON c3.serviceId = s3.id
                        JOIN ProvideService ps3 ON (ps3.serviceId = s3.id AND ps3.providerId = c3.providerId)
                        WHERE c3.providerId = p.id
                        AND b.createDate BETWEEN ? AND ?
                    ) as final_debt,
                    (
                        SELECT COALESCE(SUM(ps4.providePrice * b.quantity), 0)
                        FROM Contracts c4
                        JOIN Bills b ON b.refContractId = c4.id
                        JOIN Services s4 ON c4.serviceId = s4.id
                        JOIN ProvideService ps4 ON (ps4.serviceId = s4.id AND ps4.providerId = c4.providerId)
                        WHERE c4.providerId = p.id
                        AND b.paidDate BETWEEN ? AND ?
                    ) as paid_debt,
                    (
                        SELECT SUM(
                            CASE WHEN c5.expireDate < CURDATE() 
                            THEN (
                                c5.price - COALESCE(( 
                                    SELECT SUM(ps6.providePrice * b2.quantity)
                                    FROM Bills b2
                                    JOIN Services s6 ON c5.serviceId = s6.id
                                    JOIN ProvideService ps6 ON (ps6.serviceId = s6.id AND ps6.providerId = c5.providerId)
                                    WHERE b2.refContractId = c5.id
                                ), 0)
                            )
                            ELSE 0 END
                        )
                        FROM Contracts c5
                        WHERE c5.providerId = p.id
                        AND c5.signedDate BETWEEN ? AND ?
                    ) as arising_debt
                FROM Providers p
                GROUP BY p.id, p.name
                ORDER BY p.name
            ";

            $stmt = $db->prepare($sql);
            $stmt->execute([$startDate, $startDate, $endDate, $startDate, $endDate, $startDate, $endDate]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Cashbook::getProviderDebts: ' . $e->getMessage());
            throw $e;
        }
    }
}