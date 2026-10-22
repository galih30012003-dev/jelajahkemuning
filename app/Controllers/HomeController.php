<?php
class HomeController {
    public function getHomeData(): array {
        $db = Database::getInstance()->getConnection();

        $categories = $db->query("SELECT * FROM categories ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

        // 3 Paket Terlaris Rombongan
        $topCombos = $db->query("SELECT p.*, c.name as category_name FROM packages p JOIN categories c ON p.category_id = c.id WHERE (p.category_id = 2 AND (p.slug LIKE '%combo%' OR p.slug LIKE '%seru-3%')) OR p.badge = 'TERLARIS' ORDER BY p.price ASC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
        if (empty($topCombos)) {
            $topCombos = $db->query("SELECT p.*, c.name as category_name FROM packages p JOIN categories c ON p.category_id = c.id WHERE p.is_active = 1 LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
        }

        // Packages by Category
        $jeepPackages = $db->query("SELECT * FROM packages WHERE category_id = 1 AND is_active = 1 ORDER BY price ASC")->fetchAll(PDO::FETCH_ASSOC);
        $outboundPackages = $db->query("SELECT * FROM packages WHERE category_id = 2 AND is_active = 1 ORDER BY price ASC")->fetchAll(PDO::FETCH_ASSOC);
        $tubingPackages = $db->query("SELECT * FROM packages WHERE category_id = 3 AND is_active = 1 ORDER BY price ASC")->fetchAll(PDO::FETCH_ASSOC);
        $hematPackages = $db->query("SELECT * FROM packages WHERE category_id = 4 AND is_active = 1 ORDER BY price ASC")->fetchAll(PDO::FETCH_ASSOC);
        $villaPackages = $db->query("SELECT * FROM packages WHERE category_id = 5 AND is_active = 1 ORDER BY price ASC")->fetchAll(PDO::FETCH_ASSOC);

        $testimonials = [
            [
                'name' => 'Leo Adhiasta',
                'trip' => 'Trip Jeep Adventure Kemuning',
                'stars' => 5,
                'comment' => 'Rekomendasi banget, harga terjangkau, sopir ramah, dokumentasi bagus, jalan offroad ekstrim dan seru, rombongan kami sangat puas!'
            ],
            [
                'name' => 'Widodo Redmi',
                'trip' => 'Trip Combo Outbound, Jeep & Tubing',
                'stars' => 5,
                'comment' => 'Pokoknya asik bersama team Jelajah Kemuning.. Driver ramah sopan, diajak ngobrol asik, harga terjangkau. Tidak ada kata kata lain pokoknya joooos!'
            ],
            [
                'name' => 'Airlangga Malik',
                'trip' => 'Trip Gathering Kantor & Outbound',
                'stars' => 5,
                'comment' => 'Mantab adventure bersama jelajah kemuning, dengan pelayanan yg ramah, driver-drivernya baik, pemandangan kebun teh bagus.. sukses terus!'
            ],
            [
                'name' => 'Arvian Kusuma Putra',
                'trip' => 'Trip Anniversary Komunitas',
                'stars' => 5,
                'comment' => 'Pengalaman menyenangkan ketika tour wisata, pemandu ramah, makanan prasmanan enak, lokasi resto transit bersih. Pokoknya TOP BGT rekomen deh!'
            ]
        ];

        $faqs = [
            ['q' => 'Apakah bisa untuk wisatawan dari luar kota?', 'a' => 'Ya, bisa banget! Admin kami siap bantu koordinasi rute perjalanan, rekomendasi itinerary, dan meeting point penjemputan dari stasiun atau bandara Solo.'],
            ['q' => 'Minimal peserta untuk booking paket berapa orang?', 'a' => 'Untuk paket gathering outbound minimal 16 orang. Untuk Jeep Adventure dihitung per armada (maksimal 4 orang per mobil). Sedangkan River Tubing minimal 5 orang.'],
            ['q' => 'Apakah tersedia asuransi keselamatan?', 'a' => 'Tersedia asuransi resmi wisata sesuai ketentuan paket untuk menjamin kenyamanan dan keselamatan seluruh peserta rombongan.'],
            ['q' => 'Titik kumpul / meeting point di mana?', 'a' => 'Meeting point utama di Terminal Wisata Kemuning, Ngargoyoso, Karanganyar dengan area parkir bus luas, toilet bersih, dan aula transit.'],
            ['q' => 'Bisa custom rute & durasi kegiatan?', 'a' => 'Bisa! Kamu bisa request rute jeep khusus (Jembatan Kaca, Candi Cetho, Paralayang), konsep fun games, hingga jadwal makan siang sesuai kebutuhan.'],
            ['q' => 'Apakah aman untuk anak-anak / lansia / pemula?', 'a' => 'Sangat aman. Rute santai dan track tubing sudah dilengkapi standar keselamatan tinggi dengan pemandu lokal berpengalaman.'],
            ['q' => 'Cara booking dan pembayarannya bagaimana?', 'a' => 'Cukup klik tombol WhatsApp, pilih paket dan tanggal, lalu admin kami akan mengirimkan invoice dan konfirmasi jadwal trip.'],
        ];

        return [
            'categories' => $categories,
            'topCombos' => $topCombos,
            'topPackages' => $topCombos, // alias for backwards test compatibility
            'jeepPackages' => $jeepPackages,
            'outboundPackages' => $outboundPackages,
            'tubingPackages' => $tubingPackages,
            'hematPackages' => $hematPackages,
            'villaPackages' => $villaPackages,
            'testimonials' => $testimonials,
            'faqs' => $faqs
        ];
    }

    public function index(): void {
        $data = $this->getHomeData();
        $categories = $data['categories'];
        $topCombos = $data['topCombos'];
        $jeepPackages = $data['jeepPackages'];
        $outboundPackages = $data['outboundPackages'];
        $tubingPackages = $data['tubingPackages'];
        $hematPackages = $data['hematPackages'];
        $villaPackages = $data['villaPackages'];
        $testimonials = $data['testimonials'];
        $faqs = $data['faqs'];

        $pageTitle = 'Paket Wisata Kemuning - Jeep Adventure, Outbound & River Tubing Karanganyar';
        $pageDesc = 'Pusat paket wisata Kemuning resmi CV Jelajah Kemuning. Melayani Jeep Offroad Kebun Teh, River Tubing, Outbound Gathering Kantor, dan Sewa Villa berizin resmi NIB & asuransi.';

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/home.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }
}
