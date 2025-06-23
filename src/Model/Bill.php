<?php
require_once __DIR__ . '/../Core/Database.php';

class Bill
{
    private $id;
    private $name;
    private $des;
    private $quantity;
    private $createDate;
    private $paidDate;
    private $vat;
    private $refContractId;

    // Constructor
    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getter & Setter
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

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function getPaidDate()
    {
        return $this->paidDate;
    }
    public function setPaidDate($paidDate)
    {
        $this->paidDate = $paidDate;
    }

    public function getVat()
    {
        return $this->vat;
    }
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    public function getRefContractId()
    {
        return $this->refContractId;
    }
    public function setRefContractId($refContractId)
    {
        $this->refContractId = $refContractId;
    }

    // CRUD methods

    // Lấy tất cả hóa đơn
    public static function all()
    {
        $db = Database::connect();
        $sql = "SELECT b.*, (b.quantity * ps.providePrice) as total, c.status
                FROM Bills b
                LEFT JOIN Contracts c ON b.refContractId = c.id
                LEFT JOIN ProvideService ps ON c.serviceId = ps.serviceId AND c.providerId = ps.providerId
                ORDER BY b.paidDate DESC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy hóa đơn theo id
    public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM Bills WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new Bill($data) : null;
    }

    // Thêm hóa đơn mới
    public function save()
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO Bills (name, des, quantity, createDate, paidDate, vat, refContractId) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $this->name,
            $this->des,
            $this->quantity,
            $this->createDate,
            $this->paidDate,
            $this->vat,
            $this->refContractId
        ]);
    }

    // Cập nhật hóa đơn
    public function update()
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE Bills SET name=?, des=?, quantity=?, createDate=?, paidDate=?, vat=?, refContractId=? WHERE id=?");
        return $stmt->execute([
            $this->name,
            $this->des,
            $this->quantity,
            $this->createDate,
            $this->paidDate,
            $this->vat,
            $this->refContractId,
            $this->id
        ]);
    }

    // Xóa hóa đơn
    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM Bills WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Lấy hóa đơn theo provider ID
    public static function getBillsByProviderId($providerId)
    {
        $db = Database::connect();
        $sql = "SELECT b.*, c.price as total, c.status
                FROM Bills b
                INNER JOIN Contracts c ON b.refContractId = c.id 
                WHERE c.providerId = ?
                ORDER BY b.createDate DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute([$providerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        try {
            $db = Database::connect();

            // Updated SQL with paidDate
            $sql = "INSERT INTO Bills (name, des, quantity, createDate, paidDate, vat, refContractId) 
                    VALUES (:name, :des, :quantity, :createDate, :paidDate, :vat, :refContractId)";

            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':des', $data['des'] ?? null);
            $stmt->bindValue(':quantity', $data['quantity']);
            $stmt->bindValue(':createDate', $data['createDate']);
            $stmt->bindValue(':paidDate', $data['paidDate']);
            $stmt->bindValue(':vat', $data['vat'] ?? 0);
            $stmt->bindValue(':refContractId', $data['refContractId']);

            return $stmt->execute() ? $db->lastInsertId() : false;
        } catch (Exception $e) {
            Logger::write('Error in Bill::create: ' . $e->getMessage());
            return false;
        }
    }

    public static function generateBillNumber()
    {
        try {
            $db = Database::connect();
            $sql = "SELECT COUNT(*) as count FROM Bills";
            $stmt = $db->query($sql);
            $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

            return 'HD' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        } catch (Exception $e) {
            Logger::write('Error generating bill number: ' . $e->getMessage());
            return 'HD001';
        }
    }
}