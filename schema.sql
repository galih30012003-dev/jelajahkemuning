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

-- SEED DATA (Kategori Legacy & Standar)
INSERT INTO categories (id, name, slug, description, icon) VALUES
(1, 'Jeep Adventure Kemuning', 'jeep-adventure-kemuning', 'Sensasi offroad seru keliling kebun teh, susur sungai, dan bukit paralayang Kemuning bersama armada terawat dan driver ramah.', 'fas fa-truck-monster'),
(2, 'River Tubing Kemuning', 'river-tubing-kemuning', 'Wisata air river tubing menyusuri aliran sungai Kemuning Kali Senatah yang segar, aman untuk pemula, keluarga, dan grup.', 'fas fa-water'),
(3, 'Paket Outbound Kemuning', 'paket-outbound-kemuning', 'Paket gathering kantor, sekolah, dan komunitas dengan trainer profesional, fun games, team building, dan aula luas.', 'fas fa-users'),
(4, 'Paket Hemat Jeep Kemuning', 'paket-hemat-jeep-kemuning', 'Pilihan paket jeep adventure hemat per orang include makan siang prasmanan, snack, aula, dan dokumentasi.', 'fas fa-tags'),
(5, 'Sewa Villa & Glamping Kemuning', 'villa-glamping-kemuning', 'Paket menginap santai 2D1N / 3D2N di villa asri dan glamping kebun teh dengan pemandangan Gunung Lawu.', 'fas fa-hotel');

-- SEED DATA (Paket Wisata Awal)
INSERT INTO packages (category_id, name, slug, price, price_type, min_participants, badge, inclusions, is_active) VALUES
(1, 'Jeep Special 1 (Short Offroad)', 'jeep-special-1', 450000, 'per_armada', 1, 'TERLARIS', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir\nJalur Offroad Kebun Teh & Kali\nAsuransi Resmi', 1),
(1, 'Jeep Special 2 (Medium Offroad)', 'jeep-special-2', 470000, 'per_armada', 1, 'FAVORIT', 'Armada Jeep 4x4 (Maks 4 Orang)\nDriver Lokal Berpengalaman\nBBM & Parkir\nLanding Paralayang & Jembatan Kaca\nAsuransi Resmi', 1),
(2, 'River Tubing Kali Senatah', 'river-tubing-kali-senatah', 80000, 'per_orang', 16, 'FAVORIT', 'River Tubing Track Panjang\nPelampung, Helm & Sepatu\nRescue Team & Guide\nShuttle Penjemputan\nAsuransi Resmi', 1),
(3, 'Paket Seru 3 (Outbound + Tubing)', 'paket-seru-3', 185000, 'per_orang', 16, 'TERLARIS', 'Welcome Drink & Snack\nMakan Siang Prasmanan\nOutbound Fun Games & Trainer\nRiver Tubing & Shuttle\nAula & Sound System\nAsuransi & Dokumentasi Gratis', 1),
(4, 'Paket Hemat Jeep Adventure', 'paket-hemat-jeep', 150000, 'per_orang', 16, 'HEMAT', 'Jeep Adventure Short\nMakan Siang Prasmanan\nWelcome Drink & Snack\nAula & Sound System\nAsuransi Resmi\nGratis Dokumentasi', 1);

-- SEED DATA (Pengaturan Awal)
INSERT INTO settings (setting_key, setting_value) VALUES
('cv_name', 'CV Jelajah Kemuning'),
('nib', '0705250012458'),
('no_wa_1', '6281234567890'),
('email', 'info@jelajahkemuning.com'),
('bank_info', 'BCA 1234567890 a.n CV Jelajah Kemuning');

-- SEED DATA (Admin Default: admin / admin123)
INSERT INTO admin_users (username, password_hash, full_name, email) VALUES
('admin', '$2y$10$wTf4R6Vw0y8Pq7Oq9bA1b.KkL0iK4FjG8O7Q5k4V1l2b3N4m5O6p.', 'Admin Jelajah Kemuning', 'admin@jelajahkemuning.com');
