<?php
class Database {
    private static ?Database $instance = null;
    private ?PDO $pdo = null;

    private function __construct(?PDO $customPdo = null) {
        if ($customPdo) {
            $this->pdo = $customPdo;
        } else {
            $host = defined('DB_HOST') ? DB_HOST : 'localhost';
            $name = defined('DB_NAME') ? DB_NAME : 'jelajahkemuning_db';
            $user = defined('DB_USER') ? DB_USER : 'root';
            $pass = defined('DB_PASS') ? DB_PASS : '';
            $dsn = "mysql:host=$host;dbname=$name;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function setTestInstance(PDO $pdo): void {
        self::$instance = new self($pdo);
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}
