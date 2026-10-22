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

            try {
                $this->pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (\PDOException $e) {
                // If MySQL is not running (e.g. running locally via php -S localhost without active MySQL server),
                // smoothly fall back to a local SQLite database with automated schema initialization.
                $dataDir = __DIR__ . '/data';
                if (!is_dir($dataDir)) {
                    @mkdir($dataDir, 0755, true);
                }
                $sqlitePath = $dataDir . '/local.sqlite';
                $isNew = !file_exists($sqlitePath) || filesize($sqlitePath) === 0;

                $this->pdo = new PDO('sqlite:' . $sqlitePath, null, null, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);

                if ($isNew && file_exists(__DIR__ . '/../schema.sql')) {
                    $schema = file_get_contents(__DIR__ . '/../schema.sql');
                    $sqliteSchema = str_replace(
                        ['AUTO_INCREMENT', 'ENGINE=InnoDB', 'DEFAULT CHARSET=utf8mb4', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP', 'LONGTEXT'],
                        ['AUTOINCREMENT', '', '', 'DATETIME DEFAULT CURRENT_TIMESTAMP', 'TEXT'],
                        $schema
                    );
                    $sqliteSchema = preg_replace('/ENUM\([^)]+\)/', 'TEXT', $sqliteSchema);

                    // Execute statement by statement
                    $statements = array_filter(array_map('trim', explode(';', $sqliteSchema)));
                    foreach ($statements as $stmt) {
                        if (!empty($stmt)) {
                            try {
                                $this->pdo->exec($stmt);
                            } catch (\Throwable $t) {
                                // Ignore non-critical syntax variations
                            }
                        }
                    }
                }
            }
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
