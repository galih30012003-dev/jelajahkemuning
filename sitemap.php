<?php
if (!headers_sent()) {
    header('Content-Type: application/xml; charset=utf-8');
}

$baseUrl = defined('BASE_URL') ? BASE_URL : 'https://jelajahkemuning.com';
$db = Database::getInstance()->getConnection();

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $baseUrl ?>/</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= $baseUrl ?>/cari-paket/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= $baseUrl ?>/proposal/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= $baseUrl ?>/artikel/</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= $baseUrl ?>/galeri/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?= $baseUrl ?>/kontak/</loc>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>

    <?php
    $cats = $db->query("SELECT slug FROM categories")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cats as $cat): ?>
    <url>
        <loc><?= $baseUrl ?>/<?= htmlspecialchars($cat['slug']) ?>/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <?php endforeach; ?>

    <?php
    $articles = $db->query("SELECT slug, published_at FROM articles WHERE status = 'published'")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($articles as $art): ?>
    <url>
        <loc><?= $baseUrl ?>/artikel/<?= htmlspecialchars($art['slug']) ?>/</loc>
        <lastmod><?= date('c', strtotime($art['published_at'])) ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <?php endforeach; ?>
</urlset>
