<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Logger.php';

class ProvideService
{
    private $serviceId;
    private $providerId;
    private $providePrice;
    private $currency;
    private $unit;
    private $status;

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters and Setters
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

    public function getProvidePrice()
    {
        return $this->providePrice;
    }
    public function setProvidePrice($providePrice)
    {
        $this->providePrice = $providePrice;
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
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    // CRUD Methods
    public static function getByServiceId($serviceId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM ProvideService WHERE serviceId = ?");
        $stmt->execute([$serviceId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteByServiceId($serviceId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM ProvideService WHERE serviceId = ?");
        return $stmt->execute([$serviceId]);
    }

    public static function create($data)
    {
        try {
            $db = Database::connect();
            $sql = "INSERT INTO ProvideService (serviceId, providerId, providePrice, currency, unit) 
                   VALUES (:serviceId, :providerId, :providePrice, :currency, :unit)";

            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':serviceId' => $data['serviceId'],
                ':providerId' => $data['providerId'],
                ':providePrice' => $data['providePrice'],
                ':currency' => $data['currency'] ?? 'VND',
                ':unit' => $data['unit']
            ]);

            return true;
        } catch (Exception $e) {
            Logger::write('Error in ProvideService::create: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function update($serviceId, $providerId, $data)
    {
        try {
            $db = Database::connect();
            $sql = "UPDATE ProvideService 
                   SET providePrice = :providePrice,
                       currency = :currency,
                       unit = :unit,
                       status = :status
                   WHERE serviceId = :serviceId AND providerId = :providerId";

            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':serviceId' => $serviceId,
                ':providerId' => $providerId,
                ':providePrice' => $data['providePrice'],
                ':currency' => $data['currency'] ?? 'VND',
                ':unit' => $data['unit'],
                ':status' => $data['status']
            ]);

            return true;
        } catch (Exception $e) {
            Logger::write('Error in ProvideService::update: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function delete($serviceId, $providerId)
    {
        try {
            $db = Database::connect();
            $sql = "DELETE FROM ProvideService WHERE serviceId = ? AND providerId = ?";
            $stmt = $db->prepare($sql);
            return $stmt->execute([$serviceId, $providerId]);
        } catch (Exception $e) {
            Logger::write('Error in ProvideService::delete: ' . $e->getMessage());
            throw $e;
        }
    }
}