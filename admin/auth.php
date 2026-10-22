<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../app/Database.php';

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    @session_start();
}

class Auth {
    public static function verifyCredentials(string $username, string $password): bool {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM admin_users WHERE username = :u LIMIT 1");
        $stmt->execute([':u' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return true;
        }
        return false;
    }

    public static function login(string $username, string $password): bool {
        if (self::verifyCredentials($username, $password)) {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("UPDATE admin_users SET last_login = CURRENT_TIMESTAMP WHERE username = :u");
            $stmt->execute([':u' => $username]);

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $username;
            return true;
        }
        return false;
    }

    public static function requireLogin(): void {
        if (empty($_SESSION['admin_logged_in'])) {
            header('Location: /admin/login.php');
            exit;
        }
    }

    public static function generateCsrf(): string {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function validateCsrf(?string $token): bool {
        return !empty($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
