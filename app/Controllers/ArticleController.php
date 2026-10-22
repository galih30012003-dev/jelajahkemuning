<?php
class ArticleController {
    public function getPublishedArticles(): array {
        $db = Database::getInstance()->getConnection();
        return $db->query("SELECT * FROM articles WHERE status = 'published' ORDER BY published_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleBySlug(string $slug): ?array {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM articles WHERE slug = :s AND status = 'published' LIMIT 1");
        $stmt->execute([':s' => $slug]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            $update = $db->prepare("UPDATE articles SET views = views + 1 WHERE id = :id");
            $update->execute([':id' => $article['id']]);
            $article['views'] = (int)$article['views'] + 1;
        }

        return $article ?: null;
    }

    public function index(): void {
        $articles = $this->getPublishedArticles();
        $pageTitle = 'Artikel & Panduan Wisata Kemuning Karanganyar';
        $pageDesc = 'Tips liburan, rute jeep, rekomendasi kuliner, dan panduan wisata lengkap di Kemuning Karanganyar.';

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/articles.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }

    public function detail(string $slug): void {
        $article = $this->getArticleBySlug($slug);
        if (!$article) {
            http_response_code(404);
            $pageTitle = 'Artikel Tidak Ditemukan';
            require __DIR__ . '/../Views/layouts/header.php';
            echo '<div class="container" style="padding:80px 0; text-align:center;"><h2>Artikel Tidak Ditemukan</h2></div>';
            require __DIR__ . '/../Views/layouts/footer.php';
            return;
        }

        $pageTitle = $article['meta_title'] ?: $article['title'] . ' - Jelajah Kemuning';
        $pageDesc = $article['meta_description'] ?: substr(strip_tags($article['content']), 0, 160);

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/article-detail.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }
}
