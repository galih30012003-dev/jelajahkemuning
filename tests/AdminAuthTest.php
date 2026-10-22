<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../admin/auth.php';

it('authenticates admin with bcrypt and validates csrf tokens', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE admin_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL,
            full_name TEXT NOT NULL,
            email TEXT NOT NULL,
            last_login DATETIME NULL
        );
    ");
    Database::setTestInstance($pdo);

    $hash = password_hash('SecretPassword123!', PASSWORD_BCRYPT);
    $pdo->exec("INSERT INTO admin_users (username, password_hash, full_name, email) VALUES ('admin', '$hash', 'Admin JK', 'admin@jelajahkemuning.com')");

    // Invalid login
    assertTrue(!Auth::verifyCredentials('admin', 'WrongPass'), 'Wrong password must be rejected');
    // Valid login
    assertTrue(Auth::verifyCredentials('admin', 'SecretPassword123!'), 'Valid password must be accepted');

    // CSRF test (Review Focus 5)
    $token = Auth::generateCsrf();
    assertTrue(Auth::validateCsrf($token), 'Valid CSRF token must pass');
    assertTrue(!Auth::validateCsrf('invalid_token'), 'Invalid CSRF token must fail');
});
