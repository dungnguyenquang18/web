<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Logger.php';

class Service
{
    private $id;
    private $name;
    private $des;
    private $status;
    private $createDate;
    private $updateDate;

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDes()
    {
        return $this->des;
    }
    public function setDes($des)
    {
        $this->des = $des;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function getUpdateDate()
    {
        return $this->updateDate;
    }
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    public static function getAllServices()
    {
        try {
            $db = Database::connect();
            $sql = "SELECT 
            s.id,
            s.name as name,
            s.des as des,
            ps.unit as units,
            ps.providePrice as price,
            s.status as status,
            s.createDate as createDate
                FROM Services s
                LEFT JOIN ProvideService ps ON s.id = ps.serviceId
                GROUP BY s.id, s.name, s.des, ps.unit, ps.providePrice, s.status, s.createDate
                ORDER BY s.name";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Service::getAllServices: ' . $e->getMessage());
            return [];
        }
    }

    public static function getById($id)
    {
        try {
            $db = Database::connect();
            $sql = "SELECT * FROM Services WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Service::getById: ' . $e->getMessage());
            return null;
        }
    }

    public static function create($data)
    {
        try {
            $db = Database::connect();

            $sql = "INSERT INTO Services (name, des, status, createDate, updateDate) 
                    VALUES (:name, :des, :status, :createDate, :updateDate)";

            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':des', $data['des']);
            $stmt->bindValue(':status', $data['status'] ?? 'Đang cung cấp');
            $stmt->bindValue(':createDate', date('Y-m-d'));
            $stmt->bindValue(':updateDate', null);

            return $stmt->execute() ? $db->lastInsertId() : false;
        } catch (Exception $e) {
            Logger::write('Error in Service::create: ' . $e->getMessage());
            return false;
        }
    }

    public static function update($id, $data)
    {
        try {
            $db = Database::connect();
            $sql = "UPDATE Services 
                   SET name = :name, 
                       des = :des, 
                       status = :status, 
                       updateDate = :updateDate 
                   WHERE id = :id";

            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':name' => $data['name'],
                ':des' => $data['des'],
                ':status' => $data['status'],
                ':updateDate' => date('Y-m-d')
            ]);

            return true;
        } catch (Exception $e) {
            Logger::write('Error in Service::update: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function getAllActiveServices()
    {
        try {
            $db = Database::connect();

            $sql = "SELECT 
                    s.id,
                    s.name,
                    s.des,
                    ps.unit,
                    ps.providePrice,
                    ps.currency,
                    p.name as providerName,
                    p.id as providerId
                FROM Services s
                INNER JOIN ProvideService ps ON s.id = ps.serviceId
                INNER JOIN Providers p ON ps.providerId = p.id
                WHERE p.status = 'Đang hoạt động'
                ORDER BY s.name, p.name";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            // Group services by service ID to handle multiple providers
            $services = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $serviceId = $row['id'];
                if (!isset($services[$serviceId])) {
                    $services[$serviceId] = [
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'des' => $row['des'],
                        'providers' => []
                    ];
                }

                $services[$serviceId]['providers'][] = [
                    'id' => $row['providerId'],
                    'name' => $row['providerName'],
                    'price' => $row['providePrice'],
                    'unit' => $row['unit'],
                    'currency' => $row['currency']
                ];
            }

            return array_values($services);
        } catch (Exception $e) {
            Logger::write('Error in Service::getAllActiveServices: ' . $e->getMessage());
            return [];
        }
    }

    public static function getDebtInfo()
    {
        try {
            $db = Database::connect();
            $sql = "SELECT 
                    c.id as contractId,
                    c.customerId,
                    cu.name as customerName,
                    s.name as serviceName,
                    ps.providePrice,
                    c.quantity as contractQuantity,
                    c.endDate,
                    (c.quantity * ps.providePrice) as initialDebt,
                    COALESCE(SUM(b.quantity * ps.providePrice), 0) as finalDebt,
                    COALESCE(SUM(b.paidAmount), 0) as paidDebt,
                    CASE 
                        WHEN c.endDate < CURDATE() AND 
                             (c.quantity * ps.providePrice) > COALESCE(SUM(b.paidAmount), 0)
                        THEN (c.quantity * ps.providePrice) - COALESCE(SUM(b.paidAmount), 0)
                        ELSE 0 
                    END as arisingDebt
                FROM Contracts c
                INNER JOIN Customers cu ON c.customerId = cu.id
                INNER JOIN Services s ON c.serviceId = s.id
                INNER JOIN ProvideService ps ON (c.serviceId = ps.serviceId AND c.providerId = ps.providerId)
                LEFT JOIN Bills b ON c.id = b.contractId
                GROUP BY c.id, c.customerId, cu.name, s.name, ps.providePrice, c.quantity, c.endDate
                ORDER BY c.endDate DESC";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Service::getDebtInfo: ' . $e->getMessage());
            return [];
        }
    }
    public static function delete($id)
    {
        try {
            $db = Database::connect();
            $sql = "DELETE FROM Services WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            Logger::write('Error in Service::delete: ' . $e->getMessage());
            return false;
        }
    }
}