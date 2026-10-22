<?php
class HomeController {
    public function getHomeData(): array {
        $db = Database::getInstance()->getConnection();

        $categories = $db->query("SELECT * FROM categories ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
        $topPackages = $db->query("SELECT p.*, c.name as category_name FROM packages p JOIN categories c ON p.category_id = c.id WHERE p.is_active = 1 ORDER BY (p.badge IS NOT NULL) DESC, p.price ASC LIMIT 6")->fetchAll(PDO::FETCH_ASSOC);
        $galleries = $db->query("SELECT * FROM galleries ORDER BY sort_order ASC LIMIT 8")->fetchAll(PDO::FETCH_ASSOC);

        $faqs = [
            ['q' => 'Apakah bisa untuk wisatawan dari luar kota?', 'a' => 'Sangat bisa! Kami melayani penjemputan dari Stasiun Solo Balapan, Bandara Adi Soemarmo, maupun titik temu di terminal wisata Kemuning.'],
            ['q' => 'Apakah tersedia asuransi keselamatan?', 'a' => 'Ya, seluruh paket wisata kami sudah include asuransi resmi untuk menjamin kenyamanan seluruh peserta.'],
            ['q' => 'Berapa minimal peserta untuk booking paket rombongan?', 'a' => 'Untuk paket gathering/outbound minimal 16 orang. Untuk Jeep Adventure bisa per armada (maksimal 4 orang per mobil).'],
            ['q' => 'Bagaimana jika saat trip turun hujan?', 'a' => 'Seluruh armada jeep dilengkapi jas hujan dan rute telah disesuaikan agar tetap aman serta seru.'],
        ];

        return [
            'categories' => $categories,
            'topPackages' => $topPackages,
            'galleries' => $galleries,
            'faqs' => $faqs
        ];
    }

    public function index(): void {
        $data = $this->getHomeData();
        $categories = $data['categories'];
        $topPackages = $data['topPackages'];
        $galleries = $data['galleries'];
        $faqs = $data['faqs'];

        $pageTitle = 'Paket Wisata Kemuning - Jeep, Outbound, River Tubing & Villa';
        $pageDesc = 'Paket wisata Kemuning Karanganyar resmi CV Jelajah Kemuning. Jeep Offroad kebun teh, River Tubing, Outbound Gathering Kantor, dan Sewa Villa berizin NIB & asuransi.';

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/home.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }
}
