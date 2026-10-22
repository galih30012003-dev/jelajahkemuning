# Spesifikasi Desain & Rekayasa Sistem: JelajahKemuning.com Rebuild

**Tanggal:** 2026-10-22  
**Status:** Disetujui (Approved)  
**Tipe Proyek:** Architectural Rebuild (Migrasi dari WordPress ke Custom PHP + MySQL cPanel)  
**Pemilik Domain:** CV Jelajah Kemuning (NIB: 0705250012458)  
**Fokus Utama:** Performa Ekstrem (PageSpeed 95-100), Tampilan Premium Konversi Tinggi, Fitur Interaktif (Kuis & Proposal PDF), serta Tracking Google Ads Offline Conversion (GCLID & IP).

---

## 1. Latar Belakang & Tujuan Proyek

Website `jelajahkemuning.com` sebelumnya menggunakan WordPress dengan beban resource tinggi dan keterbatasan kustomisasi. Rebuild ini bertujuan untuk:
1. **Meningkatkan Konversi WhatsApp & Lead Penjualan:** Tampilan berorientasi aksi (Action-Driven UI) untuk mempermudah calon wisatawan maupun panitia rombongan menghubungi admin via WhatsApp.
2. **Performa Instan & Lepas dari WordPress:** Dibangun dengan Custom Native PHP modern tanpa ketergantungan plugin pihak ketiga yang rentan rusak atau lemot, siap di-upload ke shared hosting cPanel biasa.
3. **Mempertahankan Ranking SEO Organik:** Mempertahankan URL slug lama yang sudah terindeks di mesin pencari Google.
4. **Fitur Khusus Bisnis Wisata:**
   - *Smart Package Finder (Kuis Rekomendasi)* untuk membantu pengunjung memilih paket.
   - *Auto-Generate Proposal PDF* untuk kebutuhan panitia kantor/instansi mengajukan anggaran ke atasan.
   - *Traffic Attribution & GCLID Tracker* untuk mendeteksi sumber kunjungan (Google Ads vs Organik) dan mencatat GCLID guna ekspor data Offline Conversion ke Google Ads.
5. **Admin Panel Mandiri:** Pengelola website dapat dengan leluasa menambah/mengubah harga paket, mengunggah foto galeri, menulis artikel blog dengan bantuan kalkulator skor SEO, dan memantau lead masuk.

---

## 2. Identitas Visual & Desain UI (Kemuning Signature)

Gaya visual yang digunakan adalah **Kemuning Signature (Eco-Adventure & Corporate Trust)**:
- **Warna Utama (Primary):** `Tea Emerald Green` (`#0F3F28` & `#155E3B`) melambangkan kesegaran kebun teh Kemuning dan alam lereng Gunung Lawu.
- **Warna Aksen / Call to Action (CTA):** `Warm Terracotta / Bright Amber` (`#EA580C` & `#F97316`) untuk tombol WhatsApp, penawaran harga, dan tombol aksi utama agar memiliki kontras tinggi dan eye-catching.
- **Latar Belakang & Kartu:** `Warm Clean Cream / Pure White` (`#F8FAF8` & `#FFFFFF`) dengan border halus (`#E2E8F0`).
- **Elemen Kredibilitas (Trust Badges):** Menampilkan badge resmi:
  - "Resmi CV Jelajah Kemuning"
  - "NIB: 0705250012458"
  - "Tersedia Asuransi Resmi Wisata"
  - "Driver & Pemandu Lokal Berlisensi"
- **Desain Mobile-First:** Navigasi bawah melayang (Sticky Bottom Bar) di layar HP berisi tombol "Pilih Paket" dan "Chat WhatsApp Admin".

---

## 3. Arsitektur Informasi & Struktur URL

Struktur URL berikut dipertahankan demi menjaga otoritas SEO yang telah terbangun:

### 3.1. Halaman Publik
| URL | Tipe | Keterangan |
| :--- | :--- | :--- |
| `/` | Beranda | Hero, Trust Badges, Quick Filter, Top 3 Paket, Kuis Widget, Galeri, FAQ, Kontak |
| `/jeep-adventure-kemuning/` | Halaman Paket | Paket Jeep Short, Medium, Long, Candi Cetho, Rute Offroad & Santai |
| `/river-tubing-kemuning/` | Halaman Paket | Paket Tubing Kali Senatah, Kali Pucung, & fasilitas keamanan |
| `/paket-outbound-kemuning/` | Halaman Paket | Paket Outbound Kantor, Fun Games, Team Building, Sound System |
| `/paket-hemat-jeep-kemuning/`| Halaman Paket | Paket Hemat Jeep per orang include makan siang & snack |
| `/villa-glamping-kemuning/` | Halaman Paket (Baru)| Paket Menginap 2D1N / 3D2N, Sewa Villa Kebun Teh & Glamping |
| `/cari-paket/` | Fitur Interaktif | Halaman khusus kuis interaktif pencarian paket wisata |
| `/proposal/` | Fitur PDF | Form generator proposal resmi berkop CV Jelajah Kemuning |
| `/artikel/` | Blog Hub | Daftar artikel edukasi & tips wisata Kemuning |
| `/artikel/[slug]` | Single Blog | Detail artikel blog SEO lengkap dengan Schema Markup |
| `/galeri/` | Dokumentasi | Dokumentasi foto & video rombongan |
| `/tentang-kami/` | Profil | Profil CV, legalitas izin usaha, alamat meeting point |
| `/kontak/` | Hubungi | Form pesan, kontak admin, peta Google Maps interaktif |
| `/sitemap.xml` | SEO Endpoint | Dynamic XML Sitemap untuk Google Search Console |
| `/robots.txt` | Crawler Directives | Pengaturan bot search engine |

### 3.2. Panel Admin
| URL | Fungsi |
| :--- | :--- |
| `/admin/login.php` | Otentikasi aman admin (session + CSRF protection) |
| `/admin/index.php` | Dashboard metrik (total paket, artikel, dan lead masuk) |
| `/admin/paket.php` | Manajemen CRUD paket wisata, kategori, dan harga dinamis |
| `/admin/artikel.php`| Manajemen CRUD blog + Rich Text Editor + Real-time SEO Analyzer |
| `/admin/galeri.php` | Upload & hapus dokumentasi foto rombongan |
| `/admin/leads.php`  | Log pengunjung (IP, Sumber, GCLID, Unduhan Proposal) + Export CSV Offline Conversion |
| `/admin/settings.php`| Pengaturan nomor WA, GTM, GA4, Pixel, rekening bank, & NIB |

---

## 4. Spesifikasi Fitur Unggulan

### 4.1. Smart Package Finder (Kuis Rekomendasi)
- **Komponen Input:**
  1. *Tipe Rombongan:* Keluarga, Rombongan Kantor/Instansi, Komunitas/Teman, atau Pasangan.
  2. *Aktivitas Impian:* Offroad Jeep, River Tubing, Outbound/Fun Games, Menginap di Villa/Glamping.
  3. *Jumlah Peserta & Waktu:* < 10 orang, 10–30 orang, > 30 orang; Durasi (Half Day / Full Day / 2D1N).
- **Logika Output:** Menghitung rekomendasi paket terbaik dan perkiraan harga total.
- **Action Trigger:** Tombol *"Konsultasikan Paket Ini ke WA"* yang secara otomatis membawa pesan pre-filled berisi ringkasan pilihan kuis tersebut.

### 4.2. Auto-Generate Proposal / Penawaran PDF
- Menggunakan library PHP PDF mandiri (FPDF) tanpa ketergantungan eksternal.
- **Input Pengunjung:** Nama Instansi / Perusahaan, Nama Kontak (PIC), No. HP/WhatsApp, Pilihan Paket, Estimasi Peserta, dan Rencana Tanggal Trip.
- **Output Dokumen PDF:**
  - Header kop surat resmi CV Jelajah Kemuning (Logo, Alamat Terminal Wisata, NIB, Email, Telp).
  - Judul: "Surat Penawaran Paket Wisata Kemuning Karanganyar".
  - Tabel rincian fasilitas (inclusions & exclusions).
  - Simulasi kalkulasi biaya per orang dan estimasi total rombongan.
  - Syarat & ketentuan pemesanan, DP, serta nomor rekening bank resmi CV.
  - Tanda tangan digital CV Jelajah Kemuning.
- **Logging Lead:** Setiap penawaran yang dibuat otomatis tersimpan ke tabel `leads_log` di database.

### 4.3. Attribution Tracker & Google Ads Offline Conversion Module
- **Tracking Parameter Kunjungan:**
  - Saat pengunjung mendarat, sistem membaca `$_GET['gclid']`, `$_GET['utm_source']`, `$_GET['utm_medium']`, `$_GET['utm_campaign']`.
  - Jika `gclid` ditemukan, disimpan dalam cookie `_jk_gclid` (lifetime 90 hari) dan PHP Session.
  - Sistem mendeteksi `$_SERVER['HTTP_REFERER']` untuk membedakan Organic Google, Direct, Instagram/Facebook, atau Ads.
  - IP Address pengunjung diambil melalui `$_SERVER['HTTP_CF_CONNECTING_IP']` (jika pakai Cloudflare) atau `$_SERVER['REMOTE_ADDR']`.
- **Event Lead Recording:**
  - Terpicu saat pengunjung menekan tombol WhatsApp atau mendownload proposal PDF.
  - Data yang dicatat di tabel `leads_log`:
    - `ip_address`, `user_agent`, `traffic_source`, `utm_source`, `utm_campaign`, `gclid`, `event_type` (`wa_click` / `proposal_download`), `detail_lead`, `created_at`.
- **Fitur Export Google Ads Offline Conversion:**
  - Di `/admin/leads.php` tersedia fitur filter tanggal dan tombol **"Export Google Ads Conversion CSV"**.
  - Format output CSV:
    `Google Click ID,Conversion Name,Conversion Time,Conversion Value,Conversion Currency`
    Contoh: `EAIaIQobChMI...,Lead WhatsApp Wisata,2026-10-22 14:30:00,100000,IDR`
  - Siap diunggah langsung ke dashboard Google Ads > Goals > Conversions > Uploads.

### 4.4. Dynamic XML Sitemap & Robots.txt
- Endpoint `/sitemap.xml` mengeksekusi script PHP yang membaca seluruh URL halaman statis, kategori paket, dan artikel blog yang aktif.
- Output otomatis berformat XML valid dengan tag `<loc>`, `<lastmod>`, `<changefreq>`, dan `<priority>`.
- Halaman `/robots.txt` mengizinkan seluruh bot pencari merayapi konten dan melarang akses ke folder `/admin/` dan `/app/`.

---

## 5. Skema Database MySQL

Database dirancang dengan engine InnoDB, charset `utf8mb4_unicode_ci`:

```sql
-- 1. Tabel Kategori Paket
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT NULL,
    icon VARCHAR(50) DEFAULT 'fas fa-map-marked-alt',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Tabel Paket Wisata
CREATE TABLE IF NOT EXISTS packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(200) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    price INT NOT NULL DEFAULT 0,
    price_strike INT DEFAULT 0,
    price_type ENUM('per_orang', 'per_armada', 'per_paket') DEFAULT 'per_orang',
    min_participants INT DEFAULT 1,
    duration VARCHAR(100) NULL,
    badge VARCHAR(50) NULL, -- 'TERLARIS', 'FAVORIT', 'HEMAT', 'NEW'
    summary TEXT NULL,
    inclusions TEXT NULL,   -- Rincian fasilitas (tersimpan baris per baris / JSON)
    exclusions TEXT NULL,
    itinerary TEXT NULL,
    thumbnail VARCHAR(255) NULL,
    is_active TINYINT(1) DEFAULT 1,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Tabel Artikel Blog & SEO
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content LONGTEXT NOT NULL,
    thumbnail VARCHAR(255) NULL,
    meta_title VARCHAR(255) NULL,
    meta_description VARCHAR(255) NULL,
    focus_keyword VARCHAR(100) NULL,
    views INT DEFAULT 0,
    status ENUM('published', 'draft') DEFAULT 'published',
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Tabel Galeri Foto
CREATE TABLE IF NOT EXISTS galleries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    category_tag VARCHAR(50) DEFAULT 'jeep', -- jeep, tubing, outbound, villa
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Tabel Leads & Tracking Konversi
CREATE TABLE IF NOT EXISTS leads_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_type VARCHAR(50) NOT NULL, -- 'wa_click', 'proposal_pdf', 'quiz_submit'
    lead_name VARCHAR(150) NULL,
    lead_phone VARCHAR(50) NULL,
    institution VARCHAR(150) NULL,
    package_name VARCHAR(200) NULL,
    participants INT DEFAULT 0,
    ip_address VARCHAR(45) NOT NULL,
    user_agent VARCHAR(255) NULL,
    traffic_source VARCHAR(100) DEFAULT 'Direct',
    utm_source VARCHAR(100) NULL,
    utm_medium VARCHAR(100) NULL,
    utm_campaign VARCHAR(100) NULL,
    gclid VARCHAR(255) NULL,
    status ENUM('new', 'contacted', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. Tabel Pengaturan Sistem (Settings)
CREATE TABLE IF NOT EXISTS settings (
    setting_key VARCHAR(100) PRIMARY KEY,
    setting_value TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7. Tabel Akun Admin
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    last_login DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

---

## 6. Arsitektur Teknis & Struktur Direktori

### 6.1. Struktur Folder Bersih
```text
jelajahkemuning/
├── .htaccess                 # Routing URL bersih, gzip, header keamanan
├── index.php                 # Front-Controller utama
├── config.php                # Database PDO & konfigurasi global
├── sitemap.php               # Dynamic XML sitemap generator
├── robots.txt                # Directive robots crawler
├── app/
│   ├── Database.php          # Database Singleton PDO wrapper
│   ├── Tracker.php           # Modul pencatat IP, Traffic Source & GCLID
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── PackageController.php
│   │   ├── QuizController.php
│   │   ├── ProposalController.php
│   │   ├── ArticleController.php
│   │   └── ContactController.php
│   ├── Views/
│   │   ├── layouts/
│   │   │   ├── header.php
│   │   │   ├── footer.php
│   │   │   └── floating-cta.php
│   │   ├── home.php
│   │   ├── package-detail.php
│   │   ├── quiz.php
│   │   ├── proposal-form.php
│   │   ├── articles.php
│   │   ├── article-detail.php
│   │   ├── gallery.php
│   │   └── contact.php
│   └── Lib/
│       └── FPDF/             # Library PDF generator tanpa dependency eksternal
├── admin/
│   ├── auth.php              # Middleware proteksi sesi login admin
│   ├── login.php             # Form login admin
│   ├── logout.php            # Destruksi sesi admin
│   ├── index.php             # Dashboard ringkasan lead & traffic
│   ├── paket.php             # CRUD Paket wisata & kategori
│   ├── artikel.php           # CRUD Blog artikel + SEO evaluator
│   ├── galeri.php            # Manajemen foto kegiatan
│   ├── leads.php             # Log IP, GCLID & Export CSV Offline Conversion
│   └── settings.php          # Manajemen no WA, GTM, Pixel, NIB, rekening
└── assets/
    ├── css/
    │   └── style.min.css     # CSS terkompilasi modern, responsive, ultra-ringan
    ├── js/
    │   ├── main.js           # Script navigasi, filter, accordion FAQ
    │   ├── quiz.js           # Interactive package finder logic
    │   └── tracker.js        # Event listener klik WhatsApp & data-layer push
    ├── images/               # Asset logo, icon, ilustrasi (WebP/SVG)
    └── uploads/              # Folder penyimpanan media yang diunggah admin
```

---

## 7. Keamanan, Optimasi & Panduan Deploy cPanel

### 7.1. Aspek Keamanan
- **Prepared Statements (PDO):** Menjamin seluruh query database kebal terhadap serangan SQL Injection.
- **CSRF Token:** Setiap request POST dari form admin menyertakan token acak untuk mencegah Cross-Site Request Forgery.
- **Sanitasi Upload:** Hanya menerima ekstensi gambar aman (`.jpg`, `.jpeg`, `.png`, `.webp`) dan melakukan verifikasi MIME-Type sebenarnya.
- **Proteksi Direktori Sensitif:** File konfigurasi dan direktori internal diproteksi via `.htaccess` agar tidak bisa diakses langsung lewat browser.

### 7.2. Optimasi Kinerja
- **HTML Server-Side Rendering (SSR):** Konten langsung dirender dari server tanpa menunggu JavaScript di-download, menghasilkan First Contentful Paint (FCP) di bawah 0.4 detik.
- **Gzip Compression:** Diaktifkan melalui `.htaccess` untuk mengompres transfer file HTML, CSS, dan JS hingga 70%.
- **Browser Caching:** Header `Cache-Control` dikonfigurasi selama 1 tahun untuk asset statis gambar, CSS, dan JS.

### 7.3. Langkah Deploy ke Shared Hosting cPanel
1. Buat database MySQL baru di menu **cPanel > MySQL Database Wizard**.
2. Masuk ke **phpMyAdmin**, pilih database tersebut, lalu klik menu **Import** dan upload file skema database (`schema.sql`).
3. Sesuaikan nama database, username, dan password di file `config.php`.
4. Upload seluruh file proyek ke dalam folder `public_html/` (atau direktori domain utama).
5. Akses `https://jelajahkemuning.com/admin/login.php` untuk mulai mengelola website.

---

## 8. Verifikasi & Pengujian Kualitas
- [ ] Pengujian responsive di resolusi HP (360px - 414px), Tablet (768px), dan Desktop (1200px+).
- [ ] Verifikasi seluruh URL lama tidak mengalami broken link (HTTP 200).
- [ ] Pengujian klik WhatsApp dari semua halaman membawa pre-filled text yang benar.
- [ ] Pengujian generate file PDF Proposal menghasilkan format kop surat, rincian biaya, dan syarat resmi yang rapi.
- [ ] Pengujian simulasi klik iklan Google (URL dengan parameter `?gclid=test12345`) berhasil mencatat GCLID ke database dan berhasil diekspor menjadi file CSV Google Ads.
- [ ] Verifikasi Dynamic Sitemap di `https://jelajahkemuning.com/sitemap.xml` terdeteksi valid XML.
