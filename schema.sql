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
(3, 'River Tubing Kemuning', 'river-tubing-kemuning', 'Petualangan basah-basahan menyusuri aliran sungai Kemuning Kali Senatah, Kali Guci, & Kali Pring Kuning yang jernih dan segar.', 'fas fa-water'),
(4, 'Paket Hemat Jeep Kemuning', 'paket-hemat-jeep-kemuning', 'Paket wisata jeep adventure paling hemat dihitung per orang, sudah include makan siang prasmanan, snack, aula transit, asuransi, dan gratis dokumentasi.', 'fas fa-tags'),
(5, 'Sewa Villa & Glamping Kemuning', 'villa-glamping-kemuning', 'Paket menginap santai 2D1N / 3D2N di villa asri pegunungan dan glamping kebun teh Kemuning berhawa sejuk dengan pemandangan langsung Gunung Lawu.', 'fas fa-hotel');

-- SEED DATA: PAKET JEEP ADVENTURE KEMUNING (PERSIS KEMUNINGADVENTURE.COM)
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, itinerary, inclusions, thumbnail, is_active) VALUES
(1, 'Jeep Adventure Short 1', 'jeep-adventure-short-1', 350000, 'per_armada', 1, '1 - 1.5 Jam', 'HEMAT', 'Pilihan rute santai Jembatan Kaca atau Hutan Karet keliling kebun teh.', 'Rute A: Start Transit - Jembatan Kaca (Non HTM) - Spot Foto Bersama - Kebun Teh Kemuning - Finish\nRute B: Start Transit - Kebun Sayur - Spot Foto Bersama - Hutan Karet - Kebun Teh Kemuning - Finish', 'Armada Jeep 4x4 Terawat (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir Selama Trip\nSpot Foto Bersama Kebun Teh\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_4.webp', 1),
(1, 'Jeep Adventure Short 2 (Susur Sungai)', 'jeep-adventure-short-2', 400000, 'per_armada', 1, '1 - 1.5 Jam', 'TERLARIS', 'Trek offroad lumpur dan sensasi susur sungai Jimber Park yang memacu adrenalin.', 'Rute A: Start Transit - Spot Foto Bersama - Offroad Lumpur & Susur Sungai Jimber Park - Kebun Teh Kemuning - Finish\nRute B: Start Transit - Offroad Hutan Pinus - Spot Foto Bersama - Hutan Karet - Kebun Teh Kemuning - Finish\nRute C: Start Transit - Offroad Sungai Segoro Gunung - Spot Foto Bersama - Hutan Karet - Kebun Teh Kemuning - Finish', 'Armada Jeep 4x4 Terawat (Maks 4 Orang)\nDriver Lokal Ramah & Berpengalaman\nBBM & Parkir Selama Trip\nTrek Offroad Lumpur & Susur Sungai\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto & Video', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp', 1),
(1, 'Jeep Adventure Medium 1', 'jeep-adventure-medium-1', 500000, 'per_armada', 1, '2 - 2.5 Jam', 'FAVORIT', 'Kombinasi offroad lumpur, sungai, dan singgah ke Jembatan Kaca atau Bukit Paralayang.', 'Rute A: Start Transit - Jembatan Kaca (Non HTM) - Spot Foto - Offroad Lumpur & Susur Sungai Jimber Park - Hutan Karet - Kebun Teh - Finish\nRute B: Start Transit - Offroad Hutan Pinus - Bukit Paralayang - Spot Foto - Hutan Karet - Kebun Teh - Finish\nRute C: Start Transit - Bukit Paralayang - Offroad Sungai Segoro Gunung - Spot Foto - Hutan Karet - Kebun Teh - Finish', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Retribusi Parkir\nSpot Foto Hits Jembatan Kaca / Paralayang\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto & Video', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp', 1),
(1, 'Jeep Adventure Medium 2', 'jeep-adventure-medium-2', 550000, 'per_armada', 1, '2 - 2.5 Jam', 'POPULER', 'Jelajah Hutan Pinus, trabas kebun teh, offroad lumpur sungai Jimber Park.', 'Rute A: Start Transit - Offroad Hutan Pinus - Spot Foto - Offroad Lumpur & Susur Sungai Jimber Park - Kebun Teh - Finish\nRute B: Start Transit - Kebun Sayur - Offroad Hutan Pinus - Offroad Sungai Segoro Gunung - Spot Foto - Kebun Teh - Finish\nRute C: Start Transit - Jembatan Kaca (Non HTM) - Trabas Kebun Teh - Offroad Hutan Pinus - Spot Foto - Hutan Karet - Finish', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir Selama Trip\nTrek Offroad Hutan Pinus & Susur Sungai\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto & Video', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_5.webp', 1),
(1, 'Jeep Adventure Long 1 (Candi Cetho / Jumog)', 'jeep-adventure-long-1', 650000, 'per_armada', 1, '2.5 - 3 Jam', 'ADVENTURE', 'Trip panjang menuju Candi Cetho atau Air Terjun Jumog dipadu offroad susur sungai.', 'Rute A: Start Transit - Candi Cetho (Non HTM) - Kebun Teh Kemuning - Spot Foto - Offroad Lumpur & Susur Sungai Jimber Park - Hutan Karet - Finish\nRute B: Start Transit - Offroad Hutan Pinus - Bukit Paralayang - Offroad Lumpur & Susur Sungai - Hutan Karet - Kebun Teh - Finish\nRute C: Start Transit - Air Terjun Jumog / Telaga Madirda / Candi Sukuh (Pilih Salah Satu & Non HTM) - Offroad Lumpur & Susur Sungai - Hutan Karet - Finish', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir Selama Trip\nDestinasi Budaya & Wisata Alam\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto & Video', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_3.webp', 1),
(1, 'Jeep Adventure Long 2 (Ultimate Long Trip)', 'jeep-adventure-long-2', 750000, 'per_armada', 1, '2.5 - 3.5 Jam', 'VIP', 'Rute penjelajahan terlengkap: Candi Cetho, Jembatan Kaca, Hutan Pinus Dalan Pedot, dan Offroad Sungai.', 'Rute A: Start Transit - Candi Cetho (Non HTM) - Jembatan Kaca (Non HTM) - Trabas Kebun Teh - Bukit Paralayang - Offroad Hutan Pinus - Offroad Lumpur & Susur Sungai - Finish\nRute B: Start Transit - Air Terjun Jumog / Telaga Madirda / Candi Sukuh (Non HTM) - Trabas Hutan Pinus Dalan Pedot - Bukit Paralayang - Offroad Lumpur - Finish\nRute C: Start Transit - Jembatan Kaca (Non HTM) - Bukit Paralayang - Offroad Hutan Pinus - Offroad Sungai Segoro Gunung - Offroad Lumpur & Susur Sungai - Finish', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir Selama Trip\nRute Lengkap Destinasi Hits & Offroad\nAsuransi Resmi Wisata\nGratis Dokumentasi Foto & Video', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_7.webp', 1);

-- SEED DATA: PAKET OUTBOUND KEMUNING (PERSIS KEMUNINGADVENTURE.COM)
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, thumbnail, is_active) VALUES
(2, 'Paket Outbound 1 (Fun Game & Makan)', 'paket-outbound-1', 90000, 'per_orang', 16, 'Half Day', 'HEMAT', 'Fun game team building lengkap dengan makan siang prasmanan dan oleh-oleh khas Kemuning.', 'Welcome Drink & Snack Tradisional\nFun Game (Team Building)\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp', 1),
(2, 'Paket Outbound 2 (Outbound + River Tubing)', 'paket-outbound-2', 135000, 'per_orang', 16, '1 Hari', 'FAVORIT', 'Kombinasi games kebersamaan, river tubing menyegarkan, makan siang prasmanan, dan oleh-oleh.', 'Welcome Drink & Snack Tradisional\nFun Game (Team Building)\nRiver Tubing Kali Guci / Senatah\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/foto-paket-combo-seru-3.webp', 1),
(2, 'Paket Outbound 3 (Games/Tubing + Jeep Short 1)', 'paket-outbound-3', 195000, 'per_orang', 16, '1 Hari', 'POPULER', 'Pilih Fun Game atau River Tubing dipadu serunya Jeep Adventure Rute Short 1.', 'Welcome Drink & Snack Tradisional\nFun Game ATAU River Tubing (Pilih Salah Satu)\nJeep Adventure Rute Short 1 (Kapasitas 4 Org/Jeep)\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/foto-paket-wisata-kemuning-jeep-1.webp', 1),
(2, 'Paket Outbound 4 (Games/Tubing + Jeep Short 2 Offroad)', 'paket-outbound-4', 210000, 'per_orang', 16, '1 Hari', 'TERLARIS', 'Pilih Fun Game atau River Tubing dipadu Jeep Adventure Short 2 (Susur Sungai & Lumpur).', 'Welcome Drink & Snack Tradisional\nFun Game ATAU River Tubing (Pilih Salah Satu)\nJeep Adventure Rute Short 2 (Offroad Lumpur & Susur Sungai)\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/paket-combo-seru-4.webp', 1),
(2, 'Paket Outbound 5 (Outbound + Tubing + Jeep Short 1)', 'paket-outbound-5', 220000, 'per_orang', 16, '1 Hari Penuh', 'KOMPLIT', 'Paket komplit 3 aktivitas: Fun Game Team Building + River Tubing + Jeep Adventure Short 1.', 'Welcome Drink & Snack Tradisional\nFun Game (Team Building)\nRiver Tubing\nJeep Adventure Rute Short 1\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/foto-paket-combo-seru-5.webp', 1),
(2, 'Paket Outbound 6 (Outbound + Tubing + Jeep Short 2)', 'paket-outbound-6', 235000, 'per_orang', 16, '1 Hari Penuh', 'BEST SELLER', 'Paket paling lengkap: Fun Game + River Tubing + Jeep Adventure Short 2 Offroad Lumpur Sungai!', 'Welcome Drink & Snack Tradisional\nFun Game (Team Building)\nRiver Tubing\nJeep Adventure Rute Short 2 (Offroad Lumpur & Susur Sungai)\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/paket-combo-seru-2.webp', 1),
(2, 'Paket Outbound 7 (Outbound + Tubing + Jeep Medium 1)', 'paket-outbound-7', 260000, 'per_orang', 16, '1 Hari Penuh', 'PREMIUM', '3 Aktivitas lengkap dengan rute jeep lebih panjang ke Jembatan Kaca / Bukit Paralayang.', 'Welcome Drink & Snack Tradisional\nFun Game (Team Building)\nRiver Tubing\nJeep Adventure Rute Medium 1 (Jembatan Kaca / Paralayang)\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp', 1),
(2, 'Paket Outbound 8 (Outbound + Tubing + Jeep Medium 2)', 'paket-outbound-8', 275000, 'per_orang', 16, '1 Hari Penuh', 'VIP GATHERING', 'Paket gathering terlengkap dengan Jeep Medium 2 (Hutan Pinus, Trabas Kebun Teh & Offroad Sungai).', 'Welcome Drink & Snack Tradisional\nFun Game (Team Building)\nRiver Tubing\nJeep Adventure Rute Medium 2 (Hutan Pinus & Offroad Sungai)\nMakan Siang Prasmanan Khas Kemuning\nTrainer & Fasilitator Profesional\nTool Game Lengkap\nTempat Transit (Resto) & Sound System\nDokumentasi Foto & Video\nOleh-oleh Khas Kemuning', '/assets/uploads/foto_galeri_jelajah_kemuning_outbound_2.webp', 1);

-- SEED DATA: PAKET RIVER TUBING KEMUNING (PERSIS KEMUNINGADVENTURE.COM)
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, thumbnail, is_active) VALUES
(3, 'River Tubing Kali Guci', 'river-tubing-kali-guci', 45000, 'per_orang', 16, '45 Menit', 'HEMAT', 'Arus sungai alami segar dengan jarak luncur ± 1 KM. Pilihan upgrade: Rute Medium (+15rb), Rute Long (+30rb).', 'Rute Short (-+ 1 KM)\nPelampung & Alat Safety Lengkap\nGuide (Pemandu Sungai Berpengalaman)\nDokumentasi Foto & Video\nP3K Standar Keselamatan\nShuttle Kereta Ke Lokasi (Bila Diperlukan)', '/assets/uploads/river-tubing-02.webp', 1),
(3, 'River Tubing Kali Senatah', 'river-tubing-kali-senatah', 75000, 'per_orang', 16, '1 Jam', 'FAVORIT', 'Menyusuri keindahan arus sungai Kali Senatah yang jernih berbatu dengan jarak luncur panjang ± 1.8 KM.', 'Rute Long (-+ 1.8 KM)\nPelampung & Alat Safety SNI\nGuide (Pemandu Sungai & Rescue Team)\nDokumentasi Foto & Video\nP3K Standar Keselamatan\nShuttle Kereta Ke Lokasi (Bila Diperlukan)', '/assets/uploads/river-tubing-01.webp', 1),
(3, 'River Tubing Kali Pring Kuning', 'river-tubing-kali-pring-kuning', 80000, 'per_orang', 16, '1 Jam', 'POPULER', 'Sensasi river tubing seru di aliran Kali Pring Kuning dengan jarak luncur ± 1.3 KM.', 'Rute Long (-+ 1.3 KM)\nPelampung & Alat Safety SNI\nGuide (Pemandu Sungai & Rescue Team)\nDokumentasi Foto & Video\nP3K Standar Keselamatan\nShuttle Kereta Ke Lokasi (Bila Diperlukan)', '/assets/uploads/foto-paket-river-tubing-kemuning.webp', 1);

-- SEED DATA: PAKET HEMAT JEEP KEMUNING (PERSIS KEMUNINGADVENTURE.COM)
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, thumbnail, is_active) VALUES
(4, 'Paket Hemat Jeep A (Rute Short 2)', 'paket-hemat-jeep-a', 165000, 'per_orang', 16, 'Half Day', 'FAVORIT', 'Trip jeep offroad susur sungai Jimber Park include makan siang prasmanan dan aula transit.', 'Welcome Drink & Snack Rebusan\nJeep Adventure Rute Short 2 (Susur Sungai & Lumpur)\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata)\nAir Mineral Disetiap Jeep\nMinimal 16 Orang (Kelipatan 4 Orang)', '/assets/uploads/foto-paket-hemat-jeep-adventure-kemuning.webp', 1),
(4, 'Paket Hemat Jeep B (Rute Medium 1)', 'paket-hemat-jeep-b', 185000, 'per_orang', 16, 'Half Day', 'TERLARIS', 'Trip jeep rute medium ke Jembatan Kaca / Bukit Paralayang + Offroad Sungai include makan siang.', 'Welcome Drink & Snack Rebusan\nJeep Adventure Rute Medium 1 (Jembatan Kaca / Paralayang)\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata)\nAir Mineral Disetiap Jeep\nMinimal 16 Orang (Kelipatan 4 Orang)', '/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp', 1),
(4, 'Paket Hemat Jeep C (Rute Medium 2)', 'paket-hemat-jeep-c', 200000, 'per_orang', 16, 'Half Day', 'POPULER', 'Trip jeep rute medium 2 (Hutan Pinus & Trabas Kebun Teh) include makan siang prasmanan.', 'Welcome Drink & Snack Rebusan\nJeep Adventure Rute Medium 2 (Hutan Pinus & Offroad Sungai)\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata)\nAir Mineral Disetiap Jeep\nMinimal 16 Orang (Kelipatan 4 Orang)', '/assets/uploads/foto-paket-wisata-kemuning-jeep-1.webp', 1),
(4, 'Paket Hemat Jeep D (Rute Long 1)', 'paket-hemat-jeep-d', 220000, 'per_orang', 16, 'Full Day', 'VIP', 'Trip jeep rute long hingga Candi Cetho / Air Terjun Jumog include makan siang prasmanan.', 'Welcome Drink & Snack Rebusan\nJeep Adventure Rute Long 1 (Candi Cetho / Jumog / Pinus)\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata)\nAir Mineral Disetiap Jeep\nMinimal 16 Orang (Kelipatan 4 Orang)', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp', 1);

-- SEED DATA: PAKET HEMAT RIVER TUBING KEMUNING (PERSIS KEMUNINGADVENTURE.COM)
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, thumbnail, is_active) VALUES
(3, 'Paket Hemat Tubing A (Kali Guci Short)', 'paket-hemat-tubing-a', 95000, 'per_orang', 16, 'Half Day', 'HEMAT', 'River Tubing Kali Guci Rute Short lengkap dengan shuttle kereta kelinci & makan siang prasmanan.', 'Welcome Drink & Snack Rebusan\nRiver Tubing Kali Guci (Rute Short)\nShuttle Kereta Kelinci\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata) & Air Mineral\nMinimal 16 Orang', '/assets/uploads/river-tubing-02.webp', 1),
(3, 'Paket Hemat Tubing B (Kali Guci Medium)', 'paket-hemat-tubing-b', 110000, 'per_orang', 16, 'Half Day', 'POPULER', 'River Tubing Kali Guci Rute Medium lengkap dengan shuttle kereta kelinci & makan siang prasmanan.', 'Welcome Drink & Snack Rebusan\nRiver Tubing Kali Guci (Rute Medium)\nShuttle Kereta Kelinci\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata) & Air Mineral\nMinimal 16 Orang', '/assets/uploads/river-tubing-01.webp', 1),
(3, 'Paket Hemat Tubing C (Kali Pring Kuning)', 'paket-hemat-tubing-c', 120000, 'per_orang', 16, 'Half Day', 'FAVORIT', 'River Tubing Kali Pring Kuning track seru lengkap dengan shuttle kereta kelinci & makan siang prasmanan.', 'Welcome Drink & Snack Rebusan\nRiver Tubing Kali Pring Kuning\nShuttle Kereta Kelinci\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata) & Air Mineral\nMinimal 16 Orang', '/assets/uploads/foto-paket-river-tubing-kemuning.webp', 1),
(3, 'Paket Hemat Tubing D (Kali Senatah Long)', 'paket-hemat-tubing-d', 135000, 'per_orang', 16, 'Half Day', 'BEST VALUE', 'River Tubing Kali Senatah Rute Long 1.8 KM lengkap dengan shuttle kereta kelinci & makan siang prasmanan.', 'Welcome Drink & Snack Rebusan\nRiver Tubing Kali Senatah (Rute Long 1.8 KM)\nShuttle Kereta Kelinci\nMakan Siang Prasmanan Khas Kemuning\nDokumentasi Foto & Video\nTempat Transit & Sound System\nGuide (Pemandu Wisata) & Air Mineral\nMinimal 16 Orang', '/assets/uploads/foto_galeri_jelajah_kemuning_tubing_1.webp', 1);

-- SEED DATA: PAKET VILLA & GLAMPING
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, duration, badge, summary, inclusions, thumbnail, is_active) VALUES
(5, 'Paket Menginap Villa Kebun Teh 2D1N', 'paket-menginap-villa-kemuning-2d1n', 350000, 'per_orang', 10, '2 Hari 1 Malam', 'POPULER', 'Menginap nyaman di villa asri kebun teh Kemuning sejuk dengan fasilitas lengkap.', 'Menginap 1 Malam di Villa Private Kemuning\nMakan 3x Prasmanan + Snack Tradisional\nFree Teh Kemuning Hangat Sepuasnya\nWater Heater, WiFi, & Aula Santai\nApi Unggun & Fasilitas Barbeque\nAsuransi Resmi', '/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp', 1),
(5, 'Paket Stay & Play (Villa + Jeep Offroad + Tubing 2D1N)', 'paket-stay-play-villa-jeep-tubing', 550000, 'per_orang', 15, '2 Hari 1 Malam', 'BEST SELLER', 'Paket liburan all-in: Menginap di villa, trip offroad jeep, dan serunya river tubing.', 'Menginap 1 Malam di Villa Pilihan\nMakan 3x Prasmanan + 2x Snack\nJeep Adventure Offroad Kebun Teh\nRiver Tubing Kali Senatah Lengkap\nTrainer & Pendamping Rombongan\nAsuransi Resmi Wisata\nGRATIS Dokumentasi Foto & Video Drive', '/assets/uploads/paket-combo-seru.webp', 1);

-- SEED DATA: DOKUMENTASI GALERI ASLI
INSERT INTO galleries (title, image_url, category_tag, sort_order) VALUES
('Jeep Adventure Kelok 0 & Susur Lumpur', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_1.webp', 'jeep', 1),
('Jeep Offroad Hutan Karet & Gunung Cilik', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_2.webp', 'jeep', 2),
('Jeep Sunset & Bukit Paralayang Kemuning', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_3.webp', 'jeep', 3),
('Armada Jeep 4x4 Siap Offroad Kebun Teh', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_4.webp', 'jeep', 4),
('Rombongan Keluarga Menikmati Offroad', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_5.webp', 'jeep', 5),
('Spot Foto Terbaik Kebun Teh Jimber', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_6.webp', 'jeep', 6),
('Offroad Jeep Track Ekstrem Kali Senatah', '/assets/uploads/foto_galeri_jelajah_kemuning_jeep_7.webp', 'jeep', 7),
('Outbound Fun Games Gathering Kantor', '/assets/uploads/foto_galeri_jelajah_kemuning_outbound_1.webp', 'outbound', 8),
('Team Building Seru di Lapangan Kemuning', '/assets/uploads/foto_galeri_jelajah_kemuning_outbound_2.webp', 'outbound', 9),
('Kekompakan Rombongan Dinas & Komunitas', '/assets/uploads/foto_galeri_jelajah_kemuning_outbound_3.webp', 'outbound', 10),
('River Tubing Kali Senatah Seru & Basah', '/assets/uploads/foto_galeri_jelajah_kemuning_tubing_1.webp', 'tubing', 11),
('Jeram Alami River Tubing Air Segar', '/assets/uploads/foto_galeri_jelajah_kemuning_tubing_2.webp', 'tubing', 12),
('Keseruan Rombongan Menyusuri Arus Sungai', '/assets/uploads/foto_galeri_jelajah_kemuning_tubing_3.webp', 'tubing', 13),
('Fun Games & Ice Breaking Bersama Trainer', '/assets/uploads/fun-games-05.webp', 'outbound', 14);

-- SEED DATA: PENGATURAN UMUM
INSERT INTO settings (setting_key, setting_value) VALUES
('cv_name', 'CV Jelajah Kemuning'),
('nib', '0705250012458'),
('no_wa_1', '6285171001566'),
('email', 'info@jelajahkemuning.com'),
('bank_info', 'BCA 1234567890 a.n CV Jelajah Kemuning'),
('alamat', 'Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793');

-- SEED DATA: ADMIN DEFAULT
INSERT INTO admin_users (username, password_hash, full_name, email) VALUES
('admin', '$2y$10$wTf4R6Vw0y8Pq7Oq9bA1b.KkL0iK4FjG8O7Q5k4V1l2b3N4m5O6p.', 'Admin Jelajah Kemuning', 'admin@jelajahkemuning.com');
