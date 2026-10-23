<?php
class StaticController {
    public function show(string $page): void {
        $db = Database::getInstance()->getConnection();

        if ($page === 'galeri') {
            $galleries = $db->query("SELECT * FROM galleries ORDER BY sort_order ASC, id DESC")->fetchAll(PDO::FETCH_ASSOC);
            $pageTitle = 'Galeri Dokumentasi Wisata - Jelajah Kemuning';
            $pageDesc = 'Dokumentasi asli keseruan Jeep Adventure, River Tubing, dan Gathering Outbound di Kemuning Karanganyar.';
            $pageCanonical = Helpers::canonicalUrl('/galeri/');
            $pageSchemas = [
                Helpers::buildBreadcrumbSchema([
                    'Beranda' => '/',
                    'Galeri' => '/galeri/'
                ])
            ];
            require __DIR__ . '/../Views/layouts/header.php';
            require __DIR__ . '/../Views/gallery.php';
            require __DIR__ . '/../Views/layouts/footer.php';
        } elseif ($page === 'kontak' || $page === 'tentang-kami') {
            $titleName = ($page === 'kontak') ? 'Kontak & Lokasi' : 'Tentang Kami';
            $pageTitle = ($page === 'kontak') ? 'Kontak & Lokasi - Jelajah Kemuning' : 'Tentang Kami - CV Jelajah Kemuning';
            $pageDesc = 'Hubungi admin CV Jelajah Kemuning untuk reservasi paket wisata, alamat meeting point terminal wisata Kemuning, Karanganyar.';
            $pageCanonical = Helpers::canonicalUrl('/' . $page . '/');
            $pageSchemas = [
                Helpers::buildBreadcrumbSchema([
                    'Beranda' => '/',
                    $titleName => '/' . $page . '/'
                ])
            ];
            require __DIR__ . '/../Views/layouts/header.php';
            require __DIR__ . '/../Views/contact.php';
            require __DIR__ . '/../Views/layouts/footer.php';
        } else {
            http_response_code(404);
            $pageTitle = 'Halaman Tidak Ditemukan';
            require __DIR__ . '/../Views/layouts/header.php';
            echo '<div class="container" style="padding:80px 0; text-align:center;"><h2>Halaman Tidak Ditemukan</h2></div>';
            require __DIR__ . '/../Views/layouts/footer.php';
        }
    }
}
