<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Logger.php';

class Provider
{
    private $id;
    private $name;
    private $taxCode;
    private $des;
    private $status;
    private $address;
    private $email;
    private $phone;
    private $createDate;
    private $updatedDate;
    private $websiteUrl;
    private $reputation;

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

    public function getTaxCode()
    {
        return $this->taxCode;
    }
    public function setTaxCode($taxCode)
    {
        $this->taxCode = $taxCode;
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

    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
    }

    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }

    public function getReputation()
    {
        return $this->reputation;
    }
    public function setReputation($reputation)
    {
        $this->reputation = $reputation;
    }

    public static function searchProviderByName($name)
    {
        Logger::write('Model searchProviderByName với tên: ' . $name);
        $db = Database::connect();
        $name = "%" . $name . "%";
        $stmt = $db->prepare("SELECT * FROM providers WHERE name LIKE :name");
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        Logger::write('Model searchProviderByName trả về: ' . json_encode($result));
        return $result;
    }

    public static function createProvider($name, $taxCode, $des, $status, $address, $email, $phone, $createDate, $updatedDate, $websiteUrl, $reputation)
    {
        Logger::write('Model createProvider với: ' . json_encode(func_get_args()));
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO providers (name, taxCode, des, status, address, email, phone, createDate, updatedDate, websiteUrl, reputation) VALUES (:name, :taxCode, :des, :status, :address, :email, :phone, :createDate, :updatedDate, :websiteUrl, :reputation)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":taxCode", $taxCode);
        $stmt->bindParam(":des", $des);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":createDate", $createDate);
        $stmt->bindParam(":updatedDate", $updatedDate);
        $stmt->bindParam(":websiteUrl", $websiteUrl);
        $stmt->bindParam(":reputation", $reputation);
        $stmt->execute();
        Logger::write('Model createProvider đã insert xong');
    }

    public static function getAllProviders()
    {
        Logger::write('Model getAllProviders được gọi');
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM providers");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        Logger::write('Model getAllProviders trả về: ' . json_encode($result));
        return $result;
    }
    public static function findById($id)
    {
        Logger::write('Model findById với ID: ' . $id);
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM providers WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        Logger::write('Model findById trả về: ' . json_encode($result));
        return $result;
    }
    public static function updateProvider($id, $name, $taxCode, $des, $status, $address, $email, $phone, $createDate, $updatedDate, $websiteUrl, $reputation)
    {
        Logger::write('Model updateProvider với ID: ' . $id . ' và dữ liệu: ' . json_encode(func_get_args()));
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE providers SET name = :name, taxCode = :taxCode, des = :des, status = :status, address = :address, email = :email, phone = :phone, createDate = :createDate, updatedDate = :updatedDate, websiteUrl = :websiteUrl, reputation = :reputation WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":taxCode", $taxCode);
        $stmt->bindParam(":des", $des);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":createDate", $createDate);
        $stmt->bindParam(":updatedDate", $updatedDate);
        $stmt->bindParam(":websiteUrl", $websiteUrl);
        $stmt->bindParam(":reputation", $reputation);
        if ($stmt->execute()) {
            Logger::write('Model updateProvider thành công');
            return true;
        } else {
            Logger::write('Model updateProvider thất bại');
            return false;
        }
    }
    public static function getStatisticsByProviderId($id)
    {
        Logger::write('Model getStatisticsByProviderId được gọi với ID: ' . $id);
        $db = Database::connect();

        $sql = "SELECT 
                COUNT(DISTINCT b.id) as total_bills,
                SUM(c.price) as total_amount
            FROM Bills b
            JOIN Contracts c ON b.refContractId = c.id
            WHERE c.providerId = ?";

        $sql2 = "SELECT 
                p.id AS providerId,
                p.name AS providerName,
                COALESCE(SUM(c.price), 0) - COALESCE(SUM(b.quantity * ps.providePrice), 0) AS outstandingDebt
            FROM 
                Contracts c
                INNER JOIN Providers p ON c.providerId = p.id
                INNER JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                LEFT JOIN Bills b ON b.refContractId = c.id AND b.paidDate IS NOT NULL
            WHERE
                c.providerId = ?
            GROUP BY 
                p.id, p.name";

        $sql3 = "SELECT 
                p.id AS providerId,
                p.name AS providerName,
                COALESCE(SUM(c.price), 0) - COALESCE(SUM(b.quantity * ps.providePrice), 0) AS outstandingDebt
            FROM 
                Contracts c
                INNER JOIN Providers p ON c.providerId = p.id
                INNER JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                LEFT JOIN Bills b ON b.refContractId = c.id AND b.paidDate IS NOT NULL
            GROUP BY 
                p.id, p.name";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $x = $db->prepare($sql2);
        $x->bindParam(1, $id, PDO::PARAM_INT);
        $x->execute();

        $y = $db->prepare($sql3);
        $y->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total_bills'  => $result['total_bills'] ?? 0,
            'total_amount' => $result['total_amount'] ?? 0,
            'total_debt'   => $x->fetch(PDO::FETCH_ASSOC)['outstandingDebt'] ?? 0,
            'total_paid'   => $y->fetch(PDO::FETCH_ASSOC)['outstandingDebt'] ?? 0
        ];
    }
    public static function getTopProviders($limit = 3)
    {
        $db = Database::connect();
        $sql = "SELECT p.*, COUNT(c.id) as contract_count, SUM(c.price) as total_value
                FROM providers p
                LEFT JOIN Contracts c ON p.id = c.providerId
                GROUP BY p.id
                ORDER BY contract_count DESC
                LIMIT ?";

        $stmt = $db->prepare($sql);
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getDashboardStats()
    {
        $db = Database::connect();

        // Tổng số nhà cung cấp
        $providerCount = $db->query("SELECT COUNT(*) FROM providers")->fetchColumn();

        // Tổng giá trị hợp đồng và nợ
        $sql = "SELECT 
                SUM(price) as total_value,
                SUM(CASE WHEN status != 'Hoàn thành' THEN price ELSE 0 END) as total_debt
                FROM Contracts";

        $stats = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return [
            'provider_count' => $providerCount,
            'total_value' => $stats['total_value'] ?? 0,
            'total_debt' => $stats['total_debt'] ?? 0
        ];
    }

    public static function getAllActiveProviders()
    {
        try {
            $db = Database::connect();

            $sql = "SELECT 
                    id,
                    name,
                    status,
                    phone,
                    email,
                    address
                FROM Providers 
                WHERE status = 'Đang hoạt động'
                ORDER BY name";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            Logger::write('Error in Provider::getAllActiveProviders: ' . $e->getMessage());
            return [];
        }
    }

    // Add deleteProvider function
    public static function deleteProvider($id)
    {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("DELETE FROM providers WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            Logger::write('Error in Provider::deleteProvider: ' . $e->getMessage());
            return false;
        }
    }
}