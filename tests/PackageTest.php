<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Helpers.php';
require_once __DIR__ . '/../app/Controllers/PackageController.php';

it('handles packages with and without inclusions without errors', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            description TEXT NULL,
            icon TEXT NULL
        );
        CREATE TABLE packages (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            category_id INTEGER NOT NULL,
            name TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            price INTEGER NOT NULL DEFAULT 0,
            price_strike INTEGER DEFAULT 0,
            price_type TEXT DEFAULT 'per_orang',
            min_participants INTEGER DEFAULT 1,
            duration TEXT NULL,
            badge TEXT NULL,
            summary TEXT NULL,
            inclusions TEXT NULL,
            exclusions TEXT NULL,
            itinerary TEXT NULL,
            thumbnail TEXT NULL,
            is_active INTEGER DEFAULT 1,
            sort_order INTEGER DEFAULT 0
        );
        CREATE TABLE settings (
            setting_key TEXT PRIMARY KEY,
            setting_value TEXT NULL
        );
    ");
    Database::setTestInstance($pdo);

    // Insert dummy category & package
    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep Adventure', 'jeep-adventure-kemuning')");
    $catId = $pdo->lastInsertId();

    // Package with inclusions
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, inclusions) VALUES ($catId, 'Jeep Short', 'jeep-short', 300000, 'Welcome Drink\nJeep 4x4\nDriver\nAsuransi')");
    // Package with empty inclusions (Review Focus 3)
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, inclusions) VALUES ($catId, 'Jeep Custom', 'jeep-custom', 450000, NULL)");

    $controller = new PackageController();
    $data = $controller->getPackageData('jeep-adventure-kemuning');
    assertEquals('Jeep Adventure', $data['category']['name']);
    assertEquals(2, count($data['packages']), 'Should return 2 packages for this category');

    // Test parsing inclusions with NULL value (Review Focus 3)
    $incList = $controller->parseInclusions($data['packages'][1]['inclusions']);
    assertEquals([], $incList, 'Empty inclusions must parse to empty array without notice');
});
