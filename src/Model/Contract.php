<?php

require_once __DIR__ . '/../Core/Database.php';

class Contract
{
    private $id;
    private $name;
    private $status;
    private $price;
    private $currency;
    private $unit;
    private $expireDate;
    private $signedDate;
    private $nameA;
    private $phoneA;
    private $nameB;
    private $phoneB;
    private $contractUrl;
    private $serviceId;
    private $providerId;

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

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getUnit()
    {
        return $this->unit;
    }
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    public function getExpireDate()
    {
        return $this->expireDate;
    }
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

    public function getSignedDate()
    {
        return $this->signedDate;
    }
    public function setSignedDate($signedDate)
    {
        $this->signedDate = $signedDate;
    }

    public function getNameA()
    {
        return $this->nameA;
    }
    public function setNameA($nameA)
    {
        $this->nameA = $nameA;
    }

    public function getPhoneA()
    {
        return $this->phoneA;
    }
    public function setPhoneA($phoneA)
    {
        $this->phoneA = $phoneA;
    }

    public function getNameB()
    {
        return $this->nameB;
    }
    public function setNameB($nameB)
    {
        $this->nameB = $nameB;
    }

    public function getPhoneB()
    {
        return $this->phoneB;
    }
    public function setPhoneB($phoneB)
    {
        $this->phoneB = $phoneB;
    }

    public function getContractUrl()
    {
        return $this->contractUrl;
    }
    public function setContractUrl($contractUrl)
    {
        $this->contractUrl = $contractUrl;
    }

    public function getServiceId()
    {
        return $this->serviceId;
    }
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    public function getProviderId()
    {
        return $this->providerId;
    }
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }

    public static function getActiveContracts()
    {
        try {
            $db = Database::connect();

            $sql = "SELECT c.*, 
                    s.name as serviceName,
                    p.name as providerName,
                    (
                        SELECT COUNT(*) 
                        FROM Bills b 
                        WHERE b.refContractId = c.id
                    ) as billCount
                    FROM Contracts c
                    JOIN Services s ON c.serviceId = s.id 
                    JOIN Providers p ON c.providerId = p.id
                    WHERE c.status = 'Đang hoạt động'
                    AND c.expireDate > CURRENT_DATE()
                    ORDER BY c.signedDate DESC";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Contract::getActiveContracts: ' . $e->getMessage());
            return [];
        }
    }
    public static function getUnpayedContracts()
    {
        try {
            $db = Database::connect();

            $sql = "SELECT c.*, 
                    s.name as serviceName,
                    p.name as providerName,
                    c.price as amount,
                    c.currency,
                    c.unit,
                    c.expireDate,
                    c.signedDate
                    FROM Contracts c
                    JOIN Services s ON c.serviceId = s.id 
                    JOIN Providers p ON c.providerId = p.id
                    WHERE NOT EXISTS (
                        SELECT 1 
                        FROM Bills b 
                        WHERE b.refContractId = c.id
                    )
                    ORDER BY c.signedDate DESC";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Contract::getUnpaidContracts: ' . $e->getMessage());
            return [];
        }
    }
    public static function getAll(){
        try {
            $db = Database::connect();

            $sql = "SELECT c.*,
                           s.name as serviceName,  
                           p.name as providerName,
                           ps.providePrice as billCount
                    FROM Contracts c
                    JOIN Services s ON c.serviceId = s.id
                    JOIN Providers p ON c.providerId = p.id
                    JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId";
                    
            $stmt = $db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Contract::getAll: ' . $e->getMessage());
            return [];
        }
    }

    public static function create($data)
    {
        try {
            $db = Database::connect();
            $sql = "INSERT INTO Contracts 
                        (name, status, price, currency, unit, expireDate, signedDate, nameA, phoneA, nameB, phoneB, contractUrl, serviceId, providerId)
                    VALUES 
                        (:name, :status, :price, :currency, :unit, :expireDate, :signedDate, :nameA, :phoneA, :nameB, :phoneB, :contractUrl, :serviceId, :providerId)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":name", $data['name']);
            $stmt->bindParam(":status", $data['status']);
            $stmt->bindParam(":price", $data['price']);
            $stmt->bindParam(":currency", $data['currency']);
            $stmt->bindParam(":unit", $data['unit']);
            $stmt->bindParam(":expireDate", $data['expireDate']);
            $stmt->bindParam(":signedDate", $data['signedDate']);
            $stmt->bindParam(":nameA", $data['nameA']);
            $stmt->bindParam(":phoneA", $data['phoneA']);
            $stmt->bindParam(":nameB", $data['nameB']);
            $stmt->bindParam(":phoneB", $data['phoneB']);
            $stmt->bindParam(":contractUrl", $data['contractUrl']);
            $stmt->bindParam(":serviceId", $data['serviceId'], PDO::PARAM_INT);
            $stmt->bindParam(":providerId", $data['providerId'], PDO::PARAM_INT);

            return $stmt->execute();
        } catch (Exception $e) {
            Logger::write("Error in Contract::create: " . $e->getMessage());
            return false;
        }
    }

    // Hàm xóa hợp đồng theo id
    public static function delete($id)
    {
        try {
            $db = Database::connect();
            $sql = "DELETE FROM Contracts WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            Logger::write("Error in Contract::delete: " . $e->getMessage());
            return false;
        }
    }

    public static function search($keyword)
    {
        try {
            $db = Database::connect();
            // Sử dụng LIKE để so khớp một phần chuỗi
            $sql = "SELECT c.*,
                       s.name as serviceName,  
                       p.name as providerName,
                       ps.providePrice as billCount
                FROM Contracts c
                JOIN Services s ON c.serviceId = s.id
                JOIN Providers p ON c.providerId = p.id
                JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                WHERE c.name LIKE :keyword
                ORDER BY c.signedDate DESC";

            $stmt = $db->prepare($sql);
            $likeKeyword = '%' . $keyword . '%';
            $stmt->bindParam(':keyword', $likeKeyword, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Contract::search: ' . $e->getMessage());
            return [];
        }
    }
}