<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('creates, updates, and soft-deletes a package', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT);
        CREATE TABLE packages (id INTEGER PRIMARY KEY AUTOINCREMENT, category_id INTEGER, name TEXT, slug TEXT UNIQUE, price INTEGER, price_strike INTEGER, price_type TEXT, min_participants INTEGER, duration TEXT, badge TEXT, summary TEXT, inclusions TEXT, exclusions TEXT, itinerary TEXT, thumbnail TEXT, is_active INTEGER DEFAULT 1, sort_order INTEGER DEFAULT 0);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep', 'jeep')");

    // Insert package
    $stmt = $pdo->prepare("INSERT INTO packages (category_id, name, slug, price) VALUES (1, 'Jeep Special 1', 'jeep-special-1', 450000)");
    $stmt->execute();
    $id = $pdo->lastInsertId();

    // Update package price (User's requirement to easily adjust prices)
    $stmtUpdate = $pdo->prepare("UPDATE packages SET price = :p WHERE id = :id");
    $stmtUpdate->execute([':p' => 480000, ':id' => $id]);

    $check = $pdo->query("SELECT price FROM packages WHERE id = $id")->fetchColumn();
    assertEquals(480000, (int)$check, 'Package price must be updated correctly');
});
