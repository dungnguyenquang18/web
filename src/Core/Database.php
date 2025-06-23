<?php

class Database {
    protected static $conn;
    public static function connect() {
        if (!self::$conn) {
            $config = require __DIR__ . '/../../config/config.php';
            $host = $config['db_host'];
            $dbname = $config['db_name'];
            $user = $config['db_user'];
            $pass = $config['db_pass'];
            $charset = $config['db_charset'];

            self::$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    // Hàm kiểm tra kết nối database
    public static function testConnection() {
        try {
            $conn = self::connect();
            $conn->query('SELECT 1');
            return true;
        } catch (PDOException $e) {
            echo "Kết nối database thất bại: " . $e->getMessage();
            return false;
        }
    }
}

