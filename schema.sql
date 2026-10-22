-- Tabel Kategori Paket
CREATE TABLE IF NOT EXISTS categories (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT NULL,
    icon VARCHAR(50) DEFAULT 'fas fa-map-marked-alt',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Paket Wisata
CREATE TABLE IF NOT EXISTS packages (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    category_id INTEGER NOT NULL,
    name VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    price INTEGER NOT NULL DEFAULT 0,
    price_strike INTEGER DEFAULT 0,
    price_type VARCHAR(50) DEFAULT 'per_orang',
    min_participants INTEGER DEFAULT 1,
    duration VARCHAR(100) NULL,
    badge VARCHAR(50) NULL,
    summary TEXT NULL,
    inclusions TEXT NULL,
    exclusions TEXT NULL,
    itinerary TEXT NULL,
    thumbnail VARCHAR(255) NULL,
    is_active INTEGER DEFAULT 1,
    sort_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Artikel Blog & SEO
CREATE TABLE IF NOT EXISTS articles (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content LONGTEXT NOT NULL,
    thumbnail VARCHAR(255) NULL,
    meta_title VARCHAR(255) NULL,
    meta_description VARCHAR(255) NULL,
    focus_keyword VARCHAR(100) NULL,
    views INTEGER DEFAULT 0,
    status VARCHAR(50) DEFAULT 'published',
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Galeri Foto
CREATE TABLE IF NOT EXISTS galleries (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    category_tag VARCHAR(50) DEFAULT 'jeep',
    sort_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Leads & Tracking Konversi
CREATE TABLE IF NOT EXISTS leads_log (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    event_type VARCHAR(50) NOT NULL,
    lead_name VARCHAR(150) NULL,
    lead_phone VARCHAR(50) NULL,
    institution VARCHAR(150) NULL,
    package_name VARCHAR(200) NULL,
    participants INTEGER DEFAULT 0,
    ip_address VARCHAR(45) NOT NULL,
    user_agent VARCHAR(255) NULL,
    traffic_source VARCHAR(100) DEFAULT 'Direct',
    utm_source VARCHAR(100) NULL,
    utm_medium VARCHAR(100) NULL,
    utm_campaign VARCHAR(100) NULL,
    gclid VARCHAR(255) NULL,
    status VARCHAR(50) DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Pengaturan Sistem
CREATE TABLE IF NOT EXISTS settings (
    setting_key VARCHAR(100) PRIMARY KEY,
    setting_value TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Akun Admin
CREATE TABLE IF NOT EXISTS admin_users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    last_login DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- SEED DATA (5 Kategori Resmi)
INSERT INTO categories (id, name, slug, description, icon) VALUES
(1, 'Jeep Adventure Kemuning', 'jeep-adventure-kemuning', 'Sensasi offroad seru keliling kebun teh, susur sungai lumpur, bukit paralayang, hingga Candi Cetho bersama armada 4x4 terawat dan driver lokal berpengalaman.', 'fas fa-truck-monster'),
(2, 'Paket Outbound Kemuning', 'paket-outbound-kemuning', 'Paket gathering kantor, sekolah, dan komunitas dengan konsep fun games, team building, trainer profesional, aula luas, dan konsumsi prasmanan lengkap.', 'fas fa-users'),
(3, 'River Tubing Kemuning', 'river-tubing-kemuning', 'Petualangan basah-basahan menyusuri aliran sungai Kemuning Kali Senatah yang jernih dan segar. Dilengkapi helm, pelampung, rescue team, dan shuttle penjemputan.', 'fas fa-water'),
(4, 'Paket Hemat Jeep Kemuning', 'paket-hemat-jeep-kemuning', 'Paket wisata jeep adventure paling hemat dihitung per orang, sudah include makan siang prasmanan, snack, aula transit, asuransi, dan gratis dokumentasi.', 'fas fa-tags'),
(5, 'Sewa Villa & Glamping Kemuning', 'villa-glamping-kemuning', 'Paket menginap santai 2D1N / 3D2N di villa asri pegunungan dan glamping kebun teh Kemuning berhawa sejuk dengan pemandangan langsung Gunung Lawu.', 'fas fa-hotel');

-- SEED DATA: PAKET JEEP ADVENTURE LENGKAP
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, itinerary, inclusions, is_active) VALUES
(1, 'Jeep Special 1 (Offroad Kali & Kebun Teh)', 'jeep-special-1', 450000, 'per_armada', 1, '1.5 Jam', 'TERLARIS', 'Sensasi offroad Gunung Cilik dan susur sungai lumpur yang memacu adrenalin.', 'Start Transit Area Kemuning – Offroad Gunung Cilik – Kelok 0 – Offroad Susur Sungai & Lumpur – Kebun Teh Jimber – Lewat Hutan Karet – Finish', 'Armada Jeep 4x4 Terawat (Maks 4 Orang)\nDriver Lokal Ramah & Berpengalaman\nBBM & Retribusi Parkir\nSpot Foto Kebun Teh & Kali\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto', 1),
(1, 'Jeep Special 2 (Jembatan Kaca & Paralayang)', 'jeep-special-2', 470000, 'per_armada', 1, '2.5 Jam', 'FAVORIT', 'Trip lengkap ke spot hits Jembatan Kaca Skyhills dan Bukit Paralayang.', 'Start Transit Area Kemuning – Jembatan Kaca Kemuning Skyhills – Landing Paralayang – Offroad Susur Sungai & Lumpur – Kebun Teh Jimber – Hutan Karet – Finish', 'Armada Jeep 4x4 Terawat (Maks 4 Orang)\nDriver Lokal Ramah & Berpengalaman\nBBM & Parkir\nSpot Foto Hits Paralayang\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto', 1),
(1, 'Jeep Special 3 (Candi Cetho / Pinus Long)', 'jeep-special-3', 600000, 'per_armada', 1, '3 Jam', 'PREMIUM', 'Trip jelajah budaya dan alam pegunungan hingga Candi Cetho dan Hutan Pinus.', 'Start Transit Area Kemuning – Candi Cetho / Hutan Pinus – Bukit Paralayang – Offroad Susur Sungai & Lumpur – Kebun Teh Jimber – Finish', 'Armada Jeep 4x4 Terawat (Maks 4 Orang)\nDriver Lokal Ramah & Berpengalaman\nBBM & Parkir\nSensasi Offroad Ekstrem & Budaya\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto', 1),
(1, 'Jeep Short Trip (Offroad / Santai)', 'jeep-short-trip', 300000, 'per_armada', 1, '1 Jam', 'HEMAT', 'Pilihan rute offroad ringan atau santai keliling kebun teh penduduk.', 'Rute A (Offroad): Gunung Cilik – Hutan Karet – Kebun Teh Jimber – Landing Paralayang | Rute B (Santai): Kebun Sayur – Landing Paralayang – Kebun Teh Kemuning', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir\nAsuransi Resmi\nGratis Foto Bersama', 1),
(1, 'Jeep Medium Trip (Hutan Pinus & Skyhills)', 'jeep-medium-trip', 400000, 'per_armada', 1, '1.5 Jam', 'POPULER', 'Pilihan rute kebun pinus, jembatan kaca, atau susur sungai kelok 0.', 'Rute A: Hutan Pinus – Paralayang – Kebun Teh | Rute B: Jembatan Kaca – Paralayang – Kebun Teh | Rute C: Kebun Sayur – Hutan Pinus – Paralayang', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir\nAsuransi Resmi\nGratis Dokumentasi', 1),
(1, 'Jeep Long Trip (Candi Sukuh & Air Terjun)', 'jeep-long-trip', 600000, 'per_armada', 1, '4 Jam', 'ADVENTURE', 'Trip penjelajahan terpanjang hingga Candi Sukuh, Telaga Madirda, dan Air Terjun Jumog.', 'Start Transit – Candi Sukuh – Telaga Madirda – Air Terjun Jumog – Hutan Pinus – Paralayang – Finish', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir Selama Trip\nAsuransi Resmi Wisata\nGratis Dokumentasi Trip', 1);

-- SEED DATA: PAKET OUTBOUND & GATHERING LENGKAP
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, is_active) VALUES
(2, 'Paket Outbound Basic Fun Games', 'outbound-basic', 80000, 'per_orang', 16, 'Half Day', 'HEMAT', 'Cocok untuk gathering santai, kebersamaan keluarga dan komunitas.', 'Welcome Drink & Snack Rebusan\nOutbound Fun Game & Ice Breaking\nMakan Siang Prasmanan Khas Kemuning\nAula Transit & Sound System\nTrainer & Fasilitator Profesional\nAir Mineral Selama Kegiatan\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video', 1),
(2, 'Paket Outbound + Kereta Kelinci & Oleh-oleh', 'outbound-kereta-kelinci', 105000, 'per_orang', 16, 'Half Day', 'FAMILY', 'Outbound seru plus keliling desa wisata Kemuning dengan Kereta Kelinci.', 'Welcome Drink & Snack Rebusan\nMakan Siang Prasmanan Khas Kemuning\nOutbound Fun Game & Team Building\nKeliling Kereta Kelinci & Pusat Oleh-Oleh\nAula Transit & Sound System\nTrainer Profesional\nAsuransi Resmi Wisata\nGRATIS Dokumentasi', 1),
(2, 'Paket Seru 3 (Outbound + River Tubing)', 'paket-seru-3-outbound-tubing', 130000, 'per_orang', 16, '1 Hari', 'FAVORIT', 'Kombinasi games kebersamaan dan basah-basahan river tubing menyegarkan.', 'Welcome Drink & Snack Rebusan\nMakan Siang Prasmanan Tradisional\nOutbound Fun Game & Team Building\nRiver Tubing Kali Senatah (Track Aman)\nShuttle Penjemputan Mobil Tubing\nAula Transit & Sound System Standar\nTrainer & Tim Rescue\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Lengkap', 1),
(2, 'Paket Combo Terlaris (Outbound + Jeep Short + Tubing)', 'paket-terlaris-outbound-jeep-tubing', 185000, 'per_orang', 16, '1 Hari Penuh', 'TERLARIS', 'Paket paling favorit rombongan kantor: Outbound, Jeep Offroad, dan River Tubing sekaligus!', 'Welcome Drink & Snack Rebusan\nMakan Siang Prasmanan Khas Kemuning\nOutbound & Fun Game Team Building\nJeep Adventure Kemuning (Short Offroad)\nRiver Tubing Kali Senatah\nShuttle Penjemputan River Tubing\nAula Transit & Sound System\nTrainer Profesional & Driver Ramah\nAir Mineral Sepuasnya\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video (Drive)', 1),
(2, 'Paket Super Combo (Outbound + Jeep Medium + Tubing)', 'paket-super-combo-jeep-medium', 210000, 'per_orang', 16, '1 Hari Penuh', 'BEST VALUE', 'Paket komplit dengan durasi jeep lebih panjang ke Jembatan Kaca & Paralayang.', 'Welcome Drink & Snack Rebusan\nMakan Siang Prasmanan Khas Kemuning\nOutbound & Fun Game Team Building\nJeep Adventure (Medium Trip ke Skyhills)\nRiver Tubing Kali Senatah\nShuttle Penjemputan Tubing\nAula Transit & Sound System\nTrainer Profesional & Rescue Team\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video', 1),
(2, 'Paket Ultimate Outbound (Jeep Long + Tubing)', 'paket-ultimate-outbound', 230000, 'per_orang', 16, '1 Hari Penuh', 'VIP', 'Paket gathering terlengkap dengan rute jeep terjauh hingga Hutan Pinus & Candi Cetho.', 'Welcome Drink & Snack Rebusan\nMakan Siang Prasmanan Khas Kemuning\nOutbound & Fun Game Team Building\nJeep Adventure (Long Trip Offroad)\nRiver Tubing Kali Senatah\nShuttle Penjemputan Tubing\nAula Transit & Sound System\nTrainer Profesional & Rescue Team\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Lengkap', 1);

-- SEED DATA: RIVER TUBING KEMUNING
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, is_active) VALUES
(3, 'River Tubing Kali Senatah (Track Panjang)', 'river-tubing-kali-senatah', 80000, 'per_orang', 5, '1 Jam', 'FAVORIT', 'Arus sungai jernih berbatu dengan jeram seru namun tetap aman untuk pemula & anak-anak.', 'River Tubing Track Panjang (-+ 1.5 KM)\nPelampung, Helm Standar & Sepatu Air\nShuttle Penjemputan Mobil Pick-up\nTrainer & Rescue Team Berpengalaman\nKamar Mandi Bilas & Ruang Ganti\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Softcopy', 1),
(3, 'River Tubing Adventure Kali Pucung', 'river-tubing-kali-pucung', 50000, 'per_orang', 5, '45 Menit', 'HEMAT', 'Sensasi tubing air alami di lereng kebun teh dengan harga sangat terjangkau.', 'River Tubing Track Standar\nPelampung & Helm Pengaman\nInstruktur & Pemandu Lokal\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto', 1),
(3, 'River Tubing Kali Senatah Medium', 'river-tubing-senatah-medium', 75000, 'per_orang', 5, '50 Menit', 'POPULER', 'Pilihan favorit keluarga dengan jeram menyenangkan dan arus stabil.', 'River Tubing Track Menengah\nPerlengkapan Lengkap Safety Support\nShuttle Penjemputan Mobil Tubing\nPemandu Lokal Berpengalaman\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto', 1);

-- SEED DATA: PAKET HEMAT JEEP (HITUNGAN PER ORANG INCLUDE MAKAN)
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, is_active) VALUES
(4, 'Paket Hemat Jeep Short (Include Makan)', 'paket-hemat-jeep-short', 150000, 'per_orang', 16, 'Half Day', 'FAVORIT', 'Wisata jeep rombongan praktis dihitung per orang, sudah termasuk makan siang & aula.', 'Jeep Adventure Short (Maks 4 Orang/Jeep)\nMakan Siang Prasmanan Khas Kemuning\nWelcome Drink & Snack Rebusan\nAula Transit & Sound System\nTrainer / Pendamping Rombongan\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video', 1),
(4, 'Paket Hemat Jeep Medium (Include Makan)', 'paket-hemat-jeep-medium', 165000, 'per_orang', 16, 'Half Day', 'TERLARIS', 'Trip jeep durasi lebih lama lewat kebun teh Margo Lawu & spot paralayang.', 'Jeep Adventure Medium (Maks 4 Orang/Jeep)\nMakan Siang Prasmanan Khas Kemuning\nWelcome Drink & Snack Rebusan\nAula Transit & Sound System\nTrainer / Pendamping Rombongan\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video', 1),
(4, 'Paket Hemat Jeep Long (Include Makan)', 'paket-hemat-jeep-long', 195000, 'per_orang', 16, 'Full Day', 'POPULER', 'Jelajah offroad seru ke Hutan Pinus dan Jembatan Kaca Skyhills.', 'Jeep Adventure Long (Maks 4 Orang/Jeep)\nMakan Siang Prasmanan Khas Kemuning\nWelcome Drink & Snack Rebusan\nAula Transit & Sound System\nTrainer / Pendamping Rombongan\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video', 1),
(4, 'Paket Hemat Jeep Long Plus (Include Makan)', 'paket-hemat-jeep-long-plus', 210000, 'per_orang', 16, 'Full Day', 'VIP', 'Rute terlengkap ke Candi Cetho, kebun teh, offroad sungai, dan makan siang prasmanan.', 'Jeep Adventure Long Plus (Maks 4 Orang/Jeep)\nMakan Siang Prasmanan Khas Kemuning\nWelcome Drink & Snack Rebusan\nAula Transit & Sound System\nTrainer / Pendamping Rombongan\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video', 1);

-- SEED DATA: PAKET VILLA & GLAMPING
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, is_active) VALUES
(5, 'Paket Menginap Villa Kebun Teh 2D1N', 'paket-menginap-villa-kemuning-2d1n', 350000, 'per_orang', 10, '2 Hari 1 Malam', 'POPULER', 'Menginap nyaman di villa asri kebun teh Kemuning sejuk dengan fasilitas lengkap.', 'Menginap 1 Malam di Villa Private Kemuning\nMakan 3x Prasmanan + Snack Tradisional\nFree Teh Kemuning Hangat Sepuasnya\nWater Heater, WiFi, & Aula Santai\nApi Unggun & Fasilitas Barbeque\nAsuransi Resmi', 1),
(5, 'Paket Stay & Play (Villa + Jeep Offroad + Tubing 2D1N)', 'paket-stay-play-villa-jeep-tubing', 550000, 'per_orang', 15, '2 Hari 1 Malam', 'BEST SELLER', 'Paket liburan all-in: Menginap di villa, trip offroad jeep, dan serunya river tubing.', 'Menginap 1 Malam di Villa Pilihan\nMakan 3x Prasmanan + 2x Snack\nJeep Adventure Offroad Kebun Teh\nRiver Tubing Kali Senatah Lengkap\nTrainer & Pendamping Rombongan\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video Drive', 1);

-- SEED DATA: PENGATURAN UMUM
INSERT INTO settings (setting_key, setting_value) VALUES
('cv_name', 'CV Jelajah Kemuning'),
('nib', '0705250012458'),
('no_wa_1', '6281234567890'),
('email', 'info@jelajahkemuning.com'),
('bank_info', 'BCA 1234567890 a.n CV Jelajah Kemuning'),
('alamat', 'Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793');

-- SEED DATA: ADMIN DEFAULT
INSERT INTO admin_users (username, password_hash, full_name, email) VALUES
('admin', '$2y$10$wTf4R6Vw0y8Pq7Oq9bA1b.KkL0iK4FjG8O7Q5k4V1l2b3N4m5O6p.', 'Admin Jelajah Kemuning', 'admin@jelajahkemuning.com');
