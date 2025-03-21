<?php
namespace Backend;

use PDO;
use PDOException;

class Config {
    private static ?PDO $pdo = null;

    public static function getDbConnection(): ?PDO {
        if (self::$pdo === null) {
            try {
                $dsn = "mysql:host=localhost;dbname=muruugi_db";
                $username = "root"; 
                $password = ""; 
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ];

                self::$pdo = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                error_log("Database connection failed: " . $e->getMessage(), 3, "../backend/error.log");
                return null; // Return null instead of stopping execution
            }
        }
        return self::$pdo;
    }

    public static function disconnect(): void {
        self::$pdo = null;
    }
}
?>
