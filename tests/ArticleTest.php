<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Controllers/ArticleController.php';

it('retrieves published articles and handles view counter', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE articles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            content TEXT NOT NULL,
            thumbnail TEXT NULL,
            meta_title TEXT NULL,
            meta_description TEXT NULL,
            focus_keyword TEXT NULL,
            views INTEGER DEFAULT 0,
            status TEXT DEFAULT 'published',
            published_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO articles (title, slug, content, views, status) VALUES ('Tips Liburan Kemuning', 'tips-liburan-kemuning', '<p>Seru banget di kebun teh!</p>', 5, 'published')");

    $ctrl = new ArticleController();
    $list = $ctrl->getPublishedArticles();
    assertEquals(1, count($list));

    $post = $ctrl->getArticleBySlug('tips-liburan-kemuning');
    assertEquals('Tips Liburan Kemuning', $post['title']);
    assertEquals(6, (int)$post['views'], 'Views counter should increment on reading');
});
