<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('initializes in-memory sqlite database and executes schema successfully', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    Database::setTestInstance($pdo);
    $db = Database::getInstance();
    $conn = $db->getConnection();

    assertTrue($conn instanceof PDO, 'Connection must be an instance of PDO');

    // Run schema
    $schema = file_get_contents(__DIR__ . '/../schema.sql');
    $sqliteSchema = str_replace(
        ['AUTO_INCREMENT', 'ENGINE=InnoDB', 'DEFAULT CHARSET=utf8mb4', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP', 'LONGTEXT'],
        ['AUTOINCREMENT', '', '', 'DATETIME DEFAULT CURRENT_TIMESTAMP', 'TEXT'],
        $schema
    );
    $sqliteSchema = preg_replace('/ENUM\([^)]+\)/', 'TEXT', $sqliteSchema);

    $conn->exec($sqliteSchema);

    // Verify tables exist
    $tables = $conn->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
    assertTrue(in_array('categories', $tables), 'Table categories must exist');
    assertTrue(in_array('packages', $tables), 'Table packages must exist');
    assertTrue(in_array('articles', $tables), 'Table articles must exist');
    assertTrue(in_array('leads_log', $tables), 'Table leads_log must exist');
    assertTrue(in_array('settings', $tables), 'Table settings must exist');
    assertTrue(in_array('admin_users', $tables), 'Table admin_users must exist');
});
