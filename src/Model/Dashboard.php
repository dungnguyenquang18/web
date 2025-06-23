<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Logger.php';

class Dashboard
{
    public static function getStatistics()
    {
        try {
            $db = Database::connect();
            
            // Get total providers
            $providerCount = $db->query("SELECT COUNT(*) FROM providers")->fetchColumn();
            
            // Get contracts stats with error checking
            $contractStats1 = $db->query("
                SELECT 
                    SUM(price) as total_value
                FROM Contracts
            ")->fetch(PDO::FETCH_ASSOC);
            $contractStats2 = $db->query("
            SELECT 
                    p.id AS providerId,
                    p.name AS providerName,
                    COALESCE(SUM(c.price), 0) - COALESCE(SUM(b.quantity * ps.providePrice), 0) AS outstandingDebt
                FROM 
                    Contracts c
                    INNER JOIN Providers p ON c.providerId = p.id
                    INNER JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                    LEFT JOIN Bills b ON b.refContractId = c.id AND b.paidDate IS NOT NULL

                GROUP BY 
                    p.id, p.name;
            ")->fetch(PDO::FETCH_ASSOC);

            Logger::write('Raw contract stats: ' . json_encode($contractStats1)); // Debug log

            return [
                'provider_count' => (int)$providerCount,
                'total_value' => (float)($contractStats1['total_value'] ?? 0),
                'total_debt' => (float)($contractStats2['outstandingDebt'] ?? 0)
            ];
        } catch (Exception $e) {
            Logger::write('Error in getStatistics: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function getTopProviders($limit = 3)
    {
        try {
            $db = Database::connect();
            
            $sql = "
                SELECT 
                    p.*,
                    COUNT(DISTINCT c.id) as contract_count,
                    SUM(c.price) as total_value
                FROM providers p
                LEFT JOIN Contracts c ON p.id = c.providerId
                GROUP BY p.id
                ORDER BY contract_count DESC, total_value DESC
                LIMIT " . intval($limit);  // Thay đổi cách xử lý LIMIT
        
            $stmt = $db->query($sql);  // Sử dụng query thay vì prepare
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            Logger::write('Raw top providers: ' . json_encode($result));
            
            return $result;
        } catch (Exception $e) {
            Logger::write('Error in getTopProviders: ' . $e->getMessage());
            throw $e;
        }
    }
}