<?php
class PackageController {
    public function getPackageData(string $slug): array {
        $db = Database::getInstance()->getConnection();

        // Find category
        $stmt = $db->prepare("SELECT * FROM categories WHERE slug = :s LIMIT 1");
        $stmt->execute([':s' => $slug]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$category) {
            return ['category' => null, 'packages' => []];
        }

        // Get active packages
        $stmt = $db->prepare("SELECT * FROM packages WHERE category_id = :cid AND is_active = 1 ORDER BY sort_order ASC, price ASC");
        $stmt->execute([':cid' => $category['id']]);
        $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return ['category' => $category, 'packages' => $packages];
    }

    public function parseInclusions(?string $inclusions): array {
        if (empty($inclusions)) return [];
        $lines = preg_split('/\r\n|\r|\n/', trim($inclusions));
        return array_values(array_filter(array_map('trim', $lines)));
    }

    public function showBySlug(string $slug): void {
        $data = $this->getPackageData($slug);
        $category = $data['category'];
        $packages = $data['packages'];

        if (!$category) {
            http_response_code(404);
            $pageTitle = 'Kategori Tidak Ditemukan - Jelajah Kemuning';
            require __DIR__ . '/../Views/layouts/header.php';
            echo '<div class="container" style="padding:80px 0; text-align:center;"><h2>Paket Wisata Tidak Ditemukan</h2></div>';
            require __DIR__ . '/../Views/layouts/footer.php';
            return;
        }

        $pageTitle = $category['name'] . ' - Paket Wisata Jelajah Kemuning';
        $pageDesc = $category['description'] ?? 'Pilihan paket ' . $category['name'] . ' resmi CV Jelajah Kemuning Karanganyar.';

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/package-detail.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }
}
