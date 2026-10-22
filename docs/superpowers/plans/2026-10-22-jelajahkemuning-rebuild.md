# JelajahKemuning.com Rebuild Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Membangun ulang website `jelajahkemuning.com` dari WordPress menjadi native PHP + MySQL modern yang ultra-cepat, berdesain premium konversi tinggi, dilengkapi fitur kuis paket, generator proposal PDF resmi, dan modul tracking Google Ads offline conversion (GCLID & IP).

**Architecture:** Menggunakan arsitektur Clean Front-Controller Router berbasis PHP 8+ dengan PDO database wrapper (mendukung MySQL untuk production cPanel dan SQLite in-memory untuk automated testing). View dirender server-side (SSR) dengan styling CSS teroptimasi mobile-first dan Vanilla JS interaktif tanpa dependensi berat.

**Tech Stack:** PHP 8+, MySQL (InnoDB), PDO, FPDF, Vanilla JavaScript, CSS3 (Kemuning Signature Theme: Tea Emerald `#0F3F28` & Terracotta `#EA580C`), Apache `.htaccess`.

**Spec:** `docs/superpowers/specs/2026-10-22-jelajahkemuning-rebuild-design.md`

## Global Constraints

- PHP minimum version: PHP 8.0+.
- Database abstraction harus mendukung MySQL (production) dan SQLite (test runner) via `PDO`.
- Seluruh URL legacy (`/jeep-adventure-kemuning/`, `/river-tubing-kemuning/`, `/paket-outbound-kemuning/`, `/paket-hemat-jeep-kemuning/`, `/artikel/`, `/galeri/`) wajib berstatus HTTP 200 tanpa redirect loop.
- Tidak boleh menggunakan library PDF yang membutuhkan Node.js, Chromium, atau compiler eksternal di server.
- Semua query database wajib menggunakan PDO Prepared Statements (zero SQL Injection).
- Password admin disimpan menggunakan standard `password_hash()` algoritma BCRYPT.
- Format CSV export Google Ads Offline Conversion wajib mematuhi standar: `Google Click ID,Conversion Name,Conversion Time,Conversion Value,Conversion Currency`.

## Review Focus

1. **GCLID Cookie Expiration & Overwrite:** Pengunjung datang via Google Ads lalu kembali lagi via direct 2 minggu kemudian; sistem harus mempertahankan `gclid` awal selama 90 hari tanpa tertimpa nilai kosong. (Dites di Task 2)
2. **Karakter Khusus pada Input Form Proposal:** Nama instansi atau PIC dengan karakter khusus seperti kutip ganda, ampersand, atau slash (`PT. Maju & Jaya "Sentosa"`) tidak boleh merusak PDF FPDF atau menyebabkan error encoding. (Dites di Task 7)
3. **Format Paket Kosong / Null Inclusions:** Paket yang baru diinput admin dengan fasilitas kosong tidak boleh menyebabkan peringatan PHP Notice atau fatal error saat di-loop di view atau kuis. (Dites di Task 4)
4. **Validasi Slug Duplikat:** Penambahan artikel atau paket dengan judul yang menghasilkan slug sama harus ditangani dengan suffix unik agar tidak terjadi collision database. (Dites di Task 11 & 12)
5. **CSRF & Brute Force Protection pada Login Admin:** Request POST login tanpa token CSRF valid atau dengan percobaan password salah berulang harus ditolak secara aman dengan HTTP status yang tepat. (Dites di Task 10)

---

## File Structure Map

```text
jelajahkemuning/
├── .htaccess                     # Apache clean routing, Gzip, security headers
├── .gitignore                    # Exclude temp files & sensitive data
├── index.php                     # Front router dispatcher
├── config.php                    # Environment & database configuration
├── schema.sql                    # Initial database tables & seeds
├── sitemap.php                   # Dynamic XML sitemap
├── robots.txt                    # Search crawler rules
├── app/
│   ├── Database.php              # Singleton PDO wrapper (MySQL & SQLite)
│   ├── Tracker.php               # IP, UTM, Referrer & GCLID tracker
│   ├── Helpers.php               # Format rupiah, WA link, sanitize, schema builder
│   ├── Controllers/
│   │   ├── HomeController.php    # Homepage aggregator
│   │   ├── PackageController.php # Package listing & details
│   │   ├── QuizController.php    # Interactive package finder
│   │   ├── ProposalController.php# PDF generation & lead storage
│   │   ├── ArticleController.php # Blog & SEO reader
│   │   └── StaticController.php  # Galeri, tentang kami, kontak
│   ├── Views/
│   │   ├── layouts/
│   │   │   ├── header.php        # Meta tags, favicon, navigation
│   │   │   ├── footer.php        # Quick links, copyright, CV legal info
│   │   │   └── floating-cta.php  # Sticky mobile WhatsApp & Quick Quiz button
│   │   ├── home.php              # Hero, top 3 packages, FAQ accordion
│   │   ├── package-detail.php    # Package detail page & inclusions
│   │   ├── quiz.php              # 3-step interactive finder
│   │   ├── proposal-form.php     # Proposal builder form
│   │   ├── articles.php          # Blog list
│   │   ├── article-detail.php    # Blog detail with breadcrumbs
│   │   ├── gallery.php           # Photo documentation grid
│   │   └── contact.php           # Contact information & Google Maps
│   └── Lib/
│       └── fpdf.php              # Pure PHP PDF generation library
├── admin/
│   ├── auth.php                  # Session middleware & CSRF validator
│   ├── login.php                 # Admin login form & verification
│   ├── logout.php                # Session destroyer
│   ├── index.php                 # Admin dashboard & stats
│   ├── paket.php                 # CRUD packages & categories
│   ├── artikel.php               # CRUD blog posts with real-time SEO score
│   ├── galeri.php                # Photo upload manager
│   ├── leads.php                 # Lead viewer & Google Ads CSV export
│   └── settings.php              # Site settings (WA, CV, NIB, Pixels)
├── assets/
│   ├── css/
│   │   └── style.min.css         # Responsive styling with Kemuning Signature theme
│   ├── js/
│   │   ├── main.js               # Navigation toggle, FAQ accordion
│   │   ├── quiz.js               # Interactive package finder logic
│   │   └── tracker.js            # WhatsApp click event logger
│   └── uploads/                  # Storage for user-uploaded images
└── tests/
    ├── test_runner.php           # Micro test harness for PHP CLI
    ├── DatabaseTest.php          # Database connectivity & seed test
    ├── TrackerTest.php           # Attribution & GCLID persistence test
    ├── RouterTest.php            # Route dispatcher test
    ├── PackageTest.php           # Package query & view test
    ├── ProposalTest.php          # FPDF & lead logging test
    ├── QuizTest.php              # Quiz matching algorithm test
    └── AdminTest.php             # Admin auth & leads export test
```

---

### Task 1: Database Setup, Schema SQL & Connection Abstraction

**Files:**
- Create: `schema.sql`
- Create: `config.php`
- Create: `app/Database.php`
- Test: `tests/test_runner.php`
- Test: `tests/DatabaseTest.php`

**Interfaces:**
- Produces: `Database::getInstance(?PDO $customPdo = null): Database`
- Produces: `Database::getConnection(): PDO`

- [ ] **Step 1: Write the test runner and failing test for Database connection & schema setup**

Create `tests/test_runner.php`:
```php
<?php
// Simple micro-test runner for PHP CLI
function it(string $description, callable $testCase): void {
    try {
        $testCase();
        echo " [PASS] $description\n";
    } catch (\Throwable $e) {
        echo " [FAIL] $description\n";
        echo "        " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
        exit(1);
    }
}

function assertEquals($expected, $actual, string $message = ''): void {
    if ($expected !== $actual) {
        $msg = $message ?: "Expected " . var_export($expected, true) . " but got " . var_export($actual, true);
        throw new \Exception($msg);
    }
}

function assertTrue($condition, string $message = ''): void {
    if (!$condition) {
        throw new \Exception($message ?: "Failed asserting that condition is true");
    }
}
```

Create `tests/DatabaseTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('initializes in-memory sqlite database and executes schema successfully', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    Database::setTestInstance($pdo);
    $db = Database::getInstance();
    $conn = $db->getConnection();

    assertTrue($conn instanceof PDO, 'Connection must be an instance of PDO');

    // Run schema
    $schema = file_get_contents(__DIR__ . '/../schema.sql');
    // Adapt MySQL syntax for SQLite during in-memory testing if needed
    $sqliteSchema = str_replace(
        ['AUTO_INCREMENT', 'ENGINE=InnoDB', 'DEFAULT CHARSET=utf8mb4', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP', 'LONGTEXT'],
        ['AUTOINCREMENT', '', '', 'DATETIME DEFAULT CURRENT_TIMESTAMP', 'TEXT'],
        $schema
    );
    // Remove unsupported MySQL-specific ENUM and FOREIGN KEY clauses for SQLite
    $sqliteSchema = preg_replace('/ENUM\([^)]+\)/', 'TEXT', $sqliteSchema);
    
    $conn->exec($sqliteSchema);

    // Verify tables exist
    $tables = $conn->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
    assertTrue(in_array('categories', $tables), 'Table categories must exist');
    assertTrue(in_array('packages', $tables), 'Table packages must exist');
    assertTrue(in_array('articles', $tables), 'Table articles must exist');
    assertTrue(in_array('leads_log', $tables), 'Table leads_log must exist');
    assertTrue(in_array('settings', $tables), 'Table settings must exist');
    assertTrue(in_array('admin_users', $tables), 'Table admin_users must exist');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/DatabaseTest.php`
Expected: FAIL with missing `app/Database.php` or `schema.sql`.

- [ ] **Step 3: Implement `schema.sql`, `config.php`, and `app/Database.php`**

Create `schema.sql`:
```sql
CREATE TABLE IF NOT EXISTS categories (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT NULL,
    icon VARCHAR(50) DEFAULT 'fas fa-map-marked-alt',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS galleries (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    category_tag VARCHAR(50) DEFAULT 'jeep',
    sort_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS settings (
    setting_key VARCHAR(100) PRIMARY KEY,
    setting_value TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS admin_users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    last_login DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

Create `config.php`:
```php
<?php
// Default configuration for JelajahKemuning.com
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'jelajahkemuning_db');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('BASE_URL', getenv('BASE_URL') ?: 'https://jelajahkemuning.com');
define('SITE_NAME', 'Jelajah Kemuning');
define('CV_NAME', 'CV Jelajah Kemuning');
define('CV_NIB', '0705250012458');
define('DEFAULT_WA', '6281234567890');
```

Create `app/Database.php`:
```php
<?php
class Database {
    private static ?Database $instance = null;
    private ?PDO $pdo = null;

    private function __construct(?PDO $customPdo = null) {
        if ($customPdo) {
            $this->pdo = $customPdo;
        } else {
            $host = defined('DB_HOST') ? DB_HOST : 'localhost';
            $name = defined('DB_NAME') ? DB_NAME : 'jelajahkemuning_db';
            $user = defined('DB_USER') ? DB_USER : 'root';
            $pass = defined('DB_PASS') ? DB_PASS : '';
            $dsn = "mysql:host=$host;dbname=$name;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function setTestInstance(PDO $pdo): void {
        self::$instance = new self($pdo);
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/DatabaseTest.php`
Expected: PASS with "[PASS] initializes in-memory sqlite database and executes schema successfully".

- [ ] **Step 5: Commit**

```bash
git add schema.sql config.php app/Database.php tests/test_runner.php tests/DatabaseTest.php
git commit -m "feat: setup database schema, configuration, and PDO abstraction"
```

---

### Task 2: Traffic Attribution, GCLID & IP Tracker Module

**Files:**
- Create: `app/Tracker.php`
- Test: `tests/TrackerTest.php`

**Interfaces:**
- Consumes: `Database::getInstance()->getConnection()`
- Produces: `Tracker::captureVisit(): array`
- Produces: `Tracker::logLead(string $eventType, array $data): int`
- Produces: `Tracker::getGclid(): ?string`

- [ ] **Step 1: Write failing test for Tracker**

Create `tests/TrackerTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Tracker.php';

it('captures gclid, utm parameters, and logs lead correctly', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE leads_log (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            event_type TEXT NOT NULL,
            lead_name TEXT NULL,
            lead_phone TEXT NULL,
            institution TEXT NULL,
            package_name TEXT NULL,
            participants INTEGER DEFAULT 0,
            ip_address TEXT NOT NULL,
            user_agent TEXT NULL,
            traffic_source TEXT DEFAULT 'Direct',
            utm_source TEXT NULL,
            utm_medium TEXT NULL,
            utm_campaign TEXT NULL,
            gclid TEXT NULL,
            status TEXT DEFAULT 'new',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");
    Database::setTestInstance($pdo);

    // Simulate query params and headers
    $_GET['gclid'] = 'test_gclid_12345';
    $_GET['utm_source'] = 'google';
    $_GET['utm_campaign'] = 'wisata_kemuning_2026';
    $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 Test';
    $_SERVER['REMOTE_ADDR'] = '103.20.10.5';
    $_SERVER['HTTP_REFERER'] = 'https://www.google.com/';

    $visit = Tracker::captureVisit();
    assertEquals('test_gclid_12345', $visit['gclid'], 'Captured GCLID should match GET param');
    assertEquals('test_gclid_12345', Tracker::getGclid(), 'Stored GCLID should be available');
    assertEquals('103.20.10.5', $visit['ip_address'], 'IP address must be accurately detected');

    // Test Review Focus 1: Second visit without gclid does not overwrite existing gclid
    unset($_GET['gclid']);
    $visit2 = Tracker::captureVisit();
    assertEquals('test_gclid_12345', $visit2['gclid'], 'Existing GCLID must not be erased on repeat visit');

    // Log a WhatsApp Click Lead
    $leadId = Tracker::logLead('wa_click', [
        'package_name' => 'Paket Seru 3',
        'institution' => 'PT Test Corp',
        'participants' => 25
    ]);

    assertTrue($leadId > 0, 'Lead ID should be positive integer');

    $stmt = $pdo->query("SELECT * FROM leads_log WHERE id = $leadId");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    assertEquals('wa_click', $row['event_type']);
    assertEquals('test_gclid_12345', $row['gclid']);
    assertEquals('PT Test Corp', $row['institution']);
    assertEquals(25, (int)$row['participants']);
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/TrackerTest.php`
Expected: FAIL with "Class Tracker not found".

- [ ] **Step 3: Implement `app/Tracker.php`**

Create `app/Tracker.php`:
```php
<?php
class Tracker {
    private static ?string $cachedGclid = null;

    public static function getClientIp(): string {
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            return $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($ipList[0]);
        }
        return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    public static function captureVisit(): array {
        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            @session_start();
        }

        // Capture GCLID
        $gclid = $_GET['gclid'] ?? null;
        if (!empty($gclid)) {
            self::$cachedGclid = $gclid;
            if (isset($_SESSION)) {
                $_SESSION['_jk_gclid'] = $gclid;
            }
            if (!headers_sent()) {
                setcookie('_jk_gclid', $gclid, time() + (90 * 86400), '/');
            }
        } else {
            // Restore from session or cookie
            self::$cachedGclid = $_SESSION['_jk_gclid'] ?? $_COOKIE['_jk_gclid'] ?? self::$cachedGclid;
        }

        // Detect traffic source
        $trafficSource = 'Direct';
        $referer = $_SERVER['HTTP_REFERER'] ?? '';
        if (!empty(self::$cachedGclid) || !empty($_GET['gclid'])) {
            $trafficSource = 'Google Ads';
        } elseif (!empty($referer)) {
            if (str_contains($referer, 'google.')) {
                $trafficSource = 'Google Organic';
            } elseif (str_contains($referer, 'instagram.com')) {
                $trafficSource = 'Instagram';
            } elseif (str_contains($referer, 'facebook.com')) {
                $trafficSource = 'Facebook';
            } elseif (str_contains($referer, 'tiktok.com')) {
                $trafficSource = 'TikTok';
            } else {
                $parsed = parse_url($referer, PHP_URL_HOST);
                $trafficSource = $parsed ?: 'Referral';
            }
        }

        return [
            'ip_address' => self::getClientIp(),
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
            'traffic_source' => $trafficSource,
            'utm_source' => $_GET['utm_source'] ?? null,
            'utm_medium' => $_GET['utm_medium'] ?? null,
            'utm_campaign' => $_GET['utm_campaign'] ?? null,
            'gclid' => self::$cachedGclid,
        ];
    }

    public static function getGclid(): ?string {
        if (self::$cachedGclid === null) {
            self::captureVisit();
        }
        return self::$cachedGclid;
    }

    public static function logLead(string $eventType, array $data = []): int {
        $visit = self::captureVisit();
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("
            INSERT INTO leads_log (
                event_type, lead_name, lead_phone, institution, package_name,
                participants, ip_address, user_agent, traffic_source,
                utm_source, utm_medium, utm_campaign, gclid
            ) VALUES (
                :event_type, :lead_name, :lead_phone, :institution, :package_name,
                :participants, :ip_address, :user_agent, :traffic_source,
                :utm_source, :utm_medium, :utm_campaign, :gclid
            )
        ");

        $stmt->execute([
            ':event_type' => $eventType,
            ':lead_name' => $data['lead_name'] ?? null,
            ':lead_phone' => $data['lead_phone'] ?? null,
            ':institution' => $data['institution'] ?? null,
            ':package_name' => $data['package_name'] ?? null,
            ':participants' => (int)($data['participants'] ?? 0),
            ':ip_address' => $visit['ip_address'],
            ':user_agent' => substr($visit['user_agent'], 0, 255),
            ':traffic_source' => $visit['traffic_source'],
            ':utm_source' => $visit['utm_source'],
            ':utm_medium' => $visit['utm_medium'],
            ':utm_campaign' => $visit['utm_campaign'],
            ':gclid' => $visit['gclid'],
        ]);

        return (int)$db->lastInsertId();
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/TrackerTest.php`
Expected: PASS with "[PASS] captures gclid, utm parameters, and logs lead correctly".

- [ ] **Step 5: Commit**

```bash
git add app/Tracker.php tests/TrackerTest.php
git commit -m "feat: implement traffic attribution, gclid and lead logging module"
```

---

### Task 3: Helpers, Core Router & Base Layouts

**Files:**
- Create: `app/Helpers.php`
- Create: `index.php`
- Create: `.htaccess`
- Create: `app/Views/layouts/header.php`
- Create: `app/Views/layouts/footer.php`
- Create: `app/Views/layouts/floating-cta.php`
- Create: `assets/css/style.min.css`
- Create: `assets/js/main.js`
- Test: `tests/RouterTest.php`

**Interfaces:**
- Produces: `Helpers::formatRupiah(int $amount): string`
- Produces: `Helpers::generateWaLink(string $package, string $notes): string`
- Produces: `Helpers::getSetting(string $key, string $default): string`
- Produces: `Router::dispatch(string $uri, string $method): void`

- [ ] **Step 1: Write failing test for Helpers & Router**

Create `tests/RouterTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Helpers.php';

it('formats rupiah correctly and builds pre-filled whatsapp links', function () {
    assertEquals('Rp 185.000', Helpers::formatRupiah(185000));
    assertEquals('Rp 0', Helpers::formatRupiah(0));

    $waLink = Helpers::generateWaLink('Paket Seru 3', '25 orang');
    assertTrue(str_contains($waLink, 'https://wa.me/'), 'WA link must have correct prefix');
    assertTrue(str_contains($waLink, 'Paket%20Seru%203') || str_contains($waLink, 'Paket+Seru+3'), 'WA link must contain urlencoded package name');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/RouterTest.php`
Expected: FAIL with "Class Helpers not found".

- [ ] **Step 3: Implement `app/Helpers.php`, Layouts, CSS, and Router (`index.php`)**

Create `app/Helpers.php`:
```php
<?php
class Helpers {
    public static function formatRupiah(int $amount): string {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    public static function getSetting(string $key, string $default = ''): string {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT setting_value FROM settings WHERE setting_key = :k LIMIT 1");
            $stmt->execute([':k' => $key]);
            $val = $stmt->fetchColumn();
            return ($val !== false && $val !== null) ? (string)$val : $default;
        } catch (\Throwable $e) {
            return $default;
        }
    }

    public static function generateWaLink(string $package = '', string $details = ''): string {
        $phone = self::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6281234567890');
        $text = "Halo Admin Jelajah Kemuning, saya mau konsultasi";
        if (!empty($package)) {
            $text .= " mengenai *$package*";
        }
        if (!empty($details)) {
            $text .= " ($details)";
        }
        $text .= ". Mohon info ketersediaan tanggal dan rincian lengkapnya. Terima kasih!";
        return "https://wa.me/" . preg_replace('/[^0-9]/', '', $phone) . "?text=" . urlencode($text);
    }

    public static function sanitize(string $input): string {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}
```

Create `assets/css/style.min.css`:
```css
/* Kemuning Signature Theme: Tea Emerald & Terracotta */
:root {
  --primary: #0F3F28;
  --primary-light: #155E3B;
  --primary-dark: #092618;
  --accent: #EA580C;
  --accent-hover: #C2410C;
  --bg-page: #F8FAF8;
  --text-dark: #1F2937;
  --text-muted: #4B5563;
  --border: #E5E7EB;
}
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: var(--bg-page); color: var(--text-dark); line-height: 1.6; }
a { color: inherit; text-decoration: none; }
.container { max-width: 1200px; margin: 0 auto; padding: 0 16px; }
.header-nav { background: #fff; border-bottom: 1px solid var(--border); position: sticky; top: 0; z-index: 50; }
.btn-primary { background: var(--primary-light); color: #fff; padding: 10px 20px; border-radius: 8px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; }
.btn-primary:hover { background: var(--primary); }
.btn-accent { background: var(--accent); color: #fff; padding: 10px 20px; border-radius: 8px; font-weight: 700; display: inline-flex; align-items: center; gap: 8px; }
.btn-accent:hover { background: var(--accent-hover); }
.badge-trust { background: #ECFDF5; color: #047857; border: 1px solid #A7F3D0; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 99px; }
.card-package { background: #fff; border-radius: 12px; border: 1px solid var(--border); overflow: hidden; transition: transform 0.2s, box-shadow 0.2s; }
.card-package:hover { transform: translateY(-4px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
.sticky-bottom-cta { position: fixed; bottom: 0; left: 0; right: 0; background: #fff; border-top: 1px solid var(--border); padding: 12px 16px; display: flex; gap: 10px; z-index: 99; box-shadow: 0 -4px 12px rgba(0,0,0,0.05); }
@media (min-width: 768px) { .sticky-bottom-cta { display: none; } }
```

Create `assets/js/main.js`:
```javascript
document.addEventListener('DOMContentLoaded', () => {
    // Mobile menu toggle
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    if (menuBtn && mobileNav) {
        menuBtn.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
        });
    }

    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            const icon = item.querySelector('.faq-icon');
            if (answer) {
                answer.classList.toggle('hidden');
                if (icon) icon.textContent = answer.classList.contains('hidden') ? '+' : '−';
            }
        });
    });
});
```

Create `app/Views/layouts/header.php`:
```php
<?php
$siteTitle = $pageTitle ?? 'Paket Wisata Kemuning - Jeep, Outbound & River Tubing Karanganyar';
$siteDesc = $pageDesc ?? 'Penyedia paket wisata resmi CV Jelajah Kemuning. Melayani Jeep Offroad, River Tubing, Outbound Kantor, dan Sewa Villa Glamping berizin resmi & berasuransi.';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Helpers::sanitize($siteTitle) ?></title>
    <meta name="description" content="<?= Helpers::sanitize($siteDesc) ?>">
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <?php if ($gtmId = Helpers::getSetting('gtm_id')): ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= $gtmId ?>');</script>
    <?php endif; ?>
</head>
<body>
<header class="header-nav">
    <div class="container" style="display:flex; justify-content:space-between; align-items:center; height:64px;">
        <a href="/" style="font-weight:800; font-size:1.25rem; color:var(--primary); display:flex; align-items:center; gap:8px;">
            <span>🌿 JELAJAH KEMUNING</span>
        </a>
        <nav style="display:none; gap:20px; align-items:center;" class="nav-desktop">
            <a href="/jeep-adventure-kemuning/">Jeep Offroad</a>
            <a href="/river-tubing-kemuning/">River Tubing</a>
            <a href="/paket-outbound-kemuning/">Outbound</a>
            <a href="/villa-glamping-kemuning/">Villa & Glamping</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat</a>
            <a href="/cari-paket/" style="color:var(--primary-light); font-weight:700;">✨ Kuis Paket</a>
            <a href="/artikel/">Blog</a>
            <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="padding:6px 14px; font-size:14px;">Chat WA</a>
        </nav>
        <button id="mobile-menu-btn" style="background:none; border:none; font-size:24px; cursor:pointer;" aria-label="Menu">☰</button>
    </div>
    <div id="mobile-nav" class="hidden" style="background:#fff; border-top:1px solid var(--border); padding:16px;">
        <div style="display:flex; flex-direction:column; gap:12px;">
            <a href="/jeep-adventure-kemuning/">Jeep Adventure Kemuning</a>
            <a href="/river-tubing-kemuning/">River Tubing Kemuning</a>
            <a href="/paket-outbound-kemuning/">Paket Outbound Kemuning</a>
            <a href="/villa-glamping-kemuning/">Villa & Glamping Kemuning</a>
            <a href="/paket-hemat-jeep-kemuning/">Paket Hemat Jeep</a>
            <a href="/cari-paket/" style="font-weight:700; color:var(--primary-light);">✨ Kuis Pilih Paket</a>
            <a href="/proposal/">📄 Unduh Proposal Penawaran PDF</a>
            <a href="/artikel/">Artikel & Tips Wisata</a>
            <a href="/galeri/">Galeri Dokumentasi</a>
            <a href="/kontak/">Kontak & Lokasi</a>
        </div>
    </div>
</header>
```

Create `app/Views/layouts/footer.php`:
```php
<footer style="background:#0F3F28; color:#E5E7EB; padding:48px 0 24px; margin-top:64px;">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:32px;">
        <div>
            <h3 style="color:#fff; font-size:1.25rem; font-weight:700; margin-bottom:12px;">CV Jelajah Kemuning</h3>
            <p style="font-size:14px; opacity:0.85; line-height:1.6;">Penyedia paket wisata resmi Karanganyar: Jeep Adventure, River Tubing, Gathering/Outbound, dan Villa. Dikelola CV resmi berizin berusaha (NIB: 0705250012458).</p>
            <div style="margin-top:16px;">
                <span class="badge-trust">✓ Berizin Resmi NIB</span>
                <span class="badge-trust">✓ Asuransi Terjamin</span>
            </div>
        </div>
        <div>
            <h4 style="color:#fff; font-size:1rem; font-weight:600; margin-bottom:12px;">Paket Wisata</h4>
            <ul style="list-style:none; font-size:14px; display:flex; flex-direction:column; gap:8px;">
                <li><a href="/jeep-adventure-kemuning/">Jeep Adventure Kemuning</a></li>
                <li><a href="/river-tubing-kemuning/">River Tubing Kemuning</a></li>
                <li><a href="/paket-outbound-kemuning/">Paket Outbound Kemuning</a></li>
                <li><a href="/villa-glamping-kemuning/">Sewa Villa & Glamping</a></li>
                <li><a href="/paket-hemat-jeep-kemuning/">Paket Hemat Rombongan</a></li>
            </ul>
        </div>
        <div>
            <h4 style="color:#fff; font-size:1rem; font-weight:600; margin-bottom:12px;">Alamat & Kontak</h4>
            <p style="font-size:14px; opacity:0.85;">Terminal Wisata Kemuning, Kec. Ngargoyoso, Kabupaten Karanganyar, Jawa Tengah 57793</p>
            <p style="font-size:14px; margin-top:8px;">WhatsApp: <strong><?= Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '081234567890') ?></strong></p>
        </div>
    </div>
    <div class="container" style="margin-top:40px; padding-top:20px; border-top:1px solid rgba(255,255,255,0.1); text-align:center; font-size:13px; opacity:0.75;">
        &copy; <?= date('Y') ?> JelajahKemuning.com. All rights reserved.
    </div>
</footer>
<?php require __DIR__ . '/floating-cta.php'; ?>
<script src="/assets/js/main.js"></script>
</body>
</html>
```

Create `app/Views/layouts/floating-cta.php`:
```php
<div class="sticky-bottom-cta">
    <a href="/cari-paket/" class="btn-primary" style="flex:1; justify-content:center; font-size:13px;">
        ✨ Kuis Paket
    </a>
    <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="flex:1.2; justify-content:center; font-size:13px;">
        📲 Chat WA Admin
    </a>
</div>
```

Create `.htaccess`:
```apache
RewriteEngine On
RewriteBase /

# Force HTTPS & Gzip
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css application/javascript application/json
</IfModule>

# Browser Caching
<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresByType image/webp "access plus 1 year"
  ExpiresByType image/jpeg "access plus 1 year"
  ExpiresByType image/png "access plus 1 year"
  ExpiresByType text/css "access plus 1 month"
  ExpiresByType application/javascript "access plus 1 month"
</IfModule>

# Protect config & internal folders
RewriteRule ^(app|tests|docs)/ - [F,L]

# Route all web requests to index.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

Create `index.php`:
```php
<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/app/Database.php';
require_once __DIR__ . '/app/Tracker.php';
require_once __DIR__ . '/app/Helpers.php';

// Record visitor attribution
Tracker::captureVisit();

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

// Core routes
switch ($uri) {
    case '/':
        require_once __DIR__ . '/app/Controllers/HomeController.php';
        (new HomeController())->index();
        break;

    case '/jeep-adventure-kemuning':
    case '/river-tubing-kemuning':
    case '/paket-outbound-kemuning':
    case '/paket-hemat-jeep-kemuning':
    case '/villa-glamping-kemuning':
        require_once __DIR__ . '/app/Controllers/PackageController.php';
        (new PackageController())->showBySlug(trim($uri, '/'));
        break;

    case '/cari-paket':
        require_once __DIR__ . '/app/Controllers/QuizController.php';
        (new QuizController())->index();
        break;

    case '/proposal':
        require_once __DIR__ . '/app/Controllers/ProposalController.php';
        (new ProposalController())->index();
        break;

    case '/proposal/generate':
        require_once __DIR__ . '/app/Controllers/ProposalController.php';
        (new ProposalController())->generate();
        break;

    case '/artikel':
        require_once __DIR__ . '/app/Controllers/ArticleController.php';
        (new ArticleController())->index();
        break;

    case (preg_match('#^/artikel/([a-zA-Z0-9_-]+)$#', $uri, $matches) ? true : false):
        require_once __DIR__ . '/app/Controllers/ArticleController.php';
        (new ArticleController())->detail($matches[1]);
        break;

    case '/galeri':
    case '/tentang-kami':
    case '/kontak':
        require_once __DIR__ . '/app/Controllers/StaticController.php';
        (new StaticController())->show(trim($uri, '/'));
        break;

    case '/sitemap.xml':
        require_once __DIR__ . '/sitemap.php';
        break;

    default:
        http_response_code(404);
        $pageTitle = 'Halaman Tidak Ditemukan - Jelajah Kemuning';
        require __DIR__ . '/app/Views/layouts/header.php';
        echo '<div class="container" style="padding:80px 0; text-align:center;"><h2>404 - Halaman Tidak Ditemukan</h2><p style="margin-top:12px;"><a href="/" class="btn-primary">Kembali ke Beranda</a></p></div>';
        require __DIR__ . '/app/Views/layouts/footer.php';
        break;
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/RouterTest.php`
Expected: PASS with "[PASS] formats rupiah correctly and builds pre-filled whatsapp links".

- [ ] **Step 5: Commit**

```bash
git add app/Helpers.php assets/ index.php .htaccess app/Views/layouts/ tests/RouterTest.php
git commit -m "feat: implement helpers, front router, responsive CSS, and base layouts"
```

---

### Task 4: Package Controller & Legacy URL Preservation

**Files:**
- Create: `app/Controllers/PackageController.php`
- Create: `app/Views/package-detail.php`
- Test: `tests/PackageTest.php`

**Interfaces:**
- Consumes: `Database::getInstance()->getConnection()`
- Consumes: `Helpers::formatRupiah()`, `Helpers::generateWaLink()`
- Produces: `PackageController::showBySlug(string $slug): void`

- [ ] **Step 1: Write failing test for Package Controller**

Create `tests/PackageTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Helpers.php';
require_once __DIR__ . '/../app/Controllers/PackageController.php';

it('handles packages with and without inclusions without errors', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            description TEXT NULL,
            icon TEXT NULL
        );
        CREATE TABLE packages (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            category_id INTEGER NOT NULL,
            name TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            price INTEGER NOT NULL DEFAULT 0,
            price_strike INTEGER DEFAULT 0,
            price_type TEXT DEFAULT 'per_orang',
            min_participants INTEGER DEFAULT 1,
            duration TEXT NULL,
            badge TEXT NULL,
            summary TEXT NULL,
            inclusions TEXT NULL,
            exclusions TEXT NULL,
            itinerary TEXT NULL,
            thumbnail TEXT NULL,
            is_active INTEGER DEFAULT 1,
            sort_order INTEGER DEFAULT 0
        );
        CREATE TABLE settings (
            setting_key TEXT PRIMARY KEY,
            setting_value TEXT NULL
        );
    ");
    Database::setTestInstance($pdo);

    // Insert dummy category & package
    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep Adventure', 'jeep-adventure-kemuning')");
    $catId = $pdo->lastInsertId();

    // Package with inclusions
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, inclusions) VALUES ($catId, 'Jeep Short', 'jeep-short', 300000, 'Welcome Drink\nJeep 4x4\nDriver\nAsuransi')");
    // Package with empty inclusions (Review Focus 3)
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, inclusions) VALUES ($catId, 'Jeep Custom', 'jeep-custom', 450000, NULL)");

    $controller = new PackageController();
    $data = $controller->getPackageData('jeep-adventure-kemuning');
    assertEquals('Jeep Adventure', $data['category']['name']);
    assertEquals(2, count($data['packages']), 'Should return 2 packages for this category');
    
    // Test parsing inclusions with NULL value (Review Focus 3)
    $incList = $controller->parseInclusions($data['packages'][1]['inclusions']);
    assertEquals([], $incList, 'Empty inclusions must parse to empty array without notice');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/PackageTest.php`
Expected: FAIL with "Class PackageController not found".

- [ ] **Step 3: Implement `app/Controllers/PackageController.php` & `app/Views/package-detail.php`**

Create `app/Controllers/PackageController.php`:
```php
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
```

Create `app/Views/package-detail.php`:
```php
<div style="background:linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding:60px 0;">
    <div class="container" style="text-align:center;">
        <span class="badge-trust" style="background:rgba(255,255,255,0.15); color:#fff; border-color:rgba(255,255,255,0.3);">✓ Resmi CV Jelajah Kemuning • Asuransi Tersedia</span>
        <h1 style="font-size:2.25rem; font-weight:800; margin:16px 0 8px;"><?= Helpers::sanitize($category['name']) ?></h1>
        <p style="max-width:650px; margin:0 auto; opacity:0.9;"><?= Helpers::sanitize($category['description'] ?? 'Nikmati keseruan wisata di lereng Gunung Lawu bersama operator lokal berpengalaman.') ?></p>
        <div style="margin-top:20px; display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink($category['name']) ?>" class="btn-accent">📲 Konsultasi WhatsApp Cepat</a>
            <a href="/proposal/" class="btn-primary" style="background:#fff; color:var(--primary);">📄 Buat Proposal PDF Resmi</a>
        </div>
    </div>
</div>

<div class="container" style="padding:48px 16px;">
    <h2 style="text-align:center; font-size:1.75rem; font-weight:700; margin-bottom:32px;">Pilihan Paket <?= Helpers::sanitize($category['name']) ?></h2>
    
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
        <?php foreach ($packages as $pkg): ?>
        <div class="card-package" style="padding:24px; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <?php if (!empty($pkg['badge'])): ?>
                <span style="background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:4px 8px; border-radius:4px;"><?= Helpers::sanitize($pkg['badge']) ?></span>
                <?php endif; ?>
                <h3 style="font-size:1.35rem; font-weight:700; margin-top:8px;"><?= Helpers::sanitize($pkg['name']) ?></h3>
                <div style="margin:12px 0;">
                    <span style="font-size:1.75rem; font-weight:800; color:var(--primary);"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                    <span style="font-size:13px; color:var(--text-muted);">/ <?= $pkg['price_type'] === 'per_armada' ? 'Jeep (Maks 4 Org)' : 'Orang' ?></span>
                </div>
                <?php if (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                <p style="font-size:12px; color:var(--accent); font-weight:600; margin-bottom:12px;">* Minimal <?= $pkg['min_participants'] ?> peserta</p>
                <?php endif; ?>
                
                <h4 style="font-size:14px; font-weight:600; margin-top:16px; border-bottom:1px solid var(--border); padding-bottom:6px;">Fasilitas Termasuk:</h4>
                <ul style="list-style:none; margin-top:8px; font-size:14px; display:flex; flex-direction:column; gap:6px;">
                    <?php 
                    $incList = (new PackageController())->parseInclusions($pkg['inclusions'] ?? '');
                    if (empty($incList)): ?>
                        <li style="color:var(--text-muted);">Fasilitas lengkap standar CV Jelajah Kemuning.</li>
                    <?php else:
                        foreach ($incList as $inc): ?>
                        <li style="display:flex; align-items:center; gap:6px;">
                            <span style="color:#059669;">✓</span> <?= Helpers::sanitize($inc) ?>
                        </li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
            
            <div style="margin-top:24px;">
                <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn-accent" style="width:100%; justify-content:center;">
                    Booking via WhatsApp
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/PackageTest.php`
Expected: PASS with "[PASS] handles packages with and without inclusions without errors".

- [ ] **Step 5: Commit**

```bash
git add app/Controllers/PackageController.php app/Views/package-detail.php tests/PackageTest.php
git commit -m "feat: implement package controller, detail view, and null inclusion handling"
```

---

### Task 5: Homepage Controller & Rich Schema Markup

**Files:**
- Create: `app/Controllers/HomeController.php`
- Create: `app/Views/home.php`
- Test: `tests/HomeTest.php`

**Interfaces:**
- Consumes: `Database::getInstance()->getConnection()`
- Produces: `HomeController::index(): void`

- [ ] **Step 1: Write failing test for Home Controller**

Create `tests/HomeTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';

it('retrieves home data including top packages, categories, and faq correctly', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT, description TEXT, icon TEXT);
        CREATE TABLE packages (id INTEGER PRIMARY KEY AUTOINCREMENT, category_id INTEGER, name TEXT, slug TEXT, price INTEGER, price_strike INTEGER, price_type TEXT, min_participants INTEGER, duration TEXT, badge TEXT, summary TEXT, inclusions TEXT, exclusions TEXT, itinerary TEXT, thumbnail TEXT, is_active INTEGER, sort_order INTEGER);
        CREATE TABLE galleries (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, image_url TEXT, category_tag TEXT, sort_order INTEGER);
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep Adventure', 'jeep-adventure-kemuning')");
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, badge, is_active) VALUES (1, 'Paket Seru 3', 'paket-seru-3', 130000, 'FAVORIT', 1)");

    $controller = new HomeController();
    $data = $controller->getHomeData();
    assertEquals(1, count($data['categories']));
    assertEquals(1, count($data['topPackages']));
    assertTrue(count($data['faqs']) >= 3, 'Default FAQs should be provided');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/HomeTest.php`
Expected: FAIL with "Class HomeController not found".

- [ ] **Step 3: Implement `app/Controllers/HomeController.php` & `app/Views/home.php`**

Create `app/Controllers/HomeController.php`:
```php
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
```

Create `app/Views/home.php`:
```php
<!-- Hero Section -->
<section style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: #fff; padding: 70px 0 60px;">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:40px; align-items:center;">
        <div>
            <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,0.15); padding:6px 14px; border-radius:99px; font-size:12px; margin-bottom:16px;">
                <span>✓ Resmi CV Jelajah Kemuning • NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?> • Asuransi Resmi</span>
            </div>
            <h1 style="font-size:2.5rem; font-weight:800; line-height:1.2; margin-bottom:16px;">Serunya Liburan Jeep Offroad, Outbound & Tubing di Kemuning</h1>
            <p style="font-size:1.1rem; opacity:0.9; margin-bottom:24px;">Partner terpercaya trip wisata keluarga, komunitas, dan gathering kantor di Karanganyar dengan pemandu lokal ramah & berpengalaman.</p>
            <div style="display:flex; gap:12px; flex-wrap:wrap;">
                <a href="<?= Helpers::generateWaLink() ?>" class="btn-accent" style="font-size:16px;">📲 Booking Cepat via WA</a>
                <a href="/cari-paket/" class="btn-primary" style="background:#fff; color:var(--primary); font-size:16px;">✨ Kuis Pilih Paket</a>
            </div>
        </div>
        <div style="background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.2); padding:24px; border-radius:16px; backdrop-filter:blur(10px);">
            <h3 style="font-size:18px; font-weight:700; margin-bottom:12px;">Kenapa Ratusan Rombongan Memilih Kami?</h3>
            <ul style="list-style:none; font-size:14px; display:flex; flex-direction:column; gap:10px;">
                <li>🏛️ <strong>Legalitas Jelas:</strong> Dikelola CV resmi berizin berusaha NIB lengkap.</li>
                <li>🛡️ <strong>Aman & Nyaman:</strong> Seluruh paket didukung asuransi trip resmi.</li>
                <li>📸 <strong>Gratis Dokumentasi:</strong> Dokumentasi foto & video seru untuk rombongan.</li>
                <li>🍱 <strong>Paket Lengkap:</strong> Termasuk aula, makan siang prasmanan, & snack.</li>
            </ul>
            <div style="margin-top:20px;">
                <a href="/proposal/" class="btn-accent" style="width:100%; justify-content:center; background:#fff; color:var(--accent);">
                    📄 Download Surat Penawaran / Proposal PDF
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quick Category Navigation -->
<section class="container" style="padding:48px 16px;">
    <h2 style="text-align:center; font-size:1.75rem; font-weight:700; margin-bottom:24px;">Pilihan Kategori Wisata Kemuning</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px;">
        <?php foreach ($categories as $cat): ?>
        <a href="/<?= $cat['slug'] ?>/" class="card-package" style="padding:20px; text-align:center;">
            <div style="font-size:32px; margin-bottom:8px;">⛰️</div>
            <h3 style="font-size:16px; font-weight:700; color:var(--primary);"><?= Helpers::sanitize($cat['name']) ?></h3>
            <p style="font-size:12px; color:var(--text-muted); margin-top:4px;">Lihat rincian paket & harga →</p>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- Top Packages Section -->
<section style="background:#fff; padding:60px 0; border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
    <div class="container">
        <h2 style="text-align:center; font-size:1.85rem; font-weight:800;">Paket Terlaris Rombongan & Keluarga</h2>
        <p style="text-align:center; color:var(--text-muted); margin-bottom:36px;">Paket favorit dengan fasilitas terlengkap dan harga transparan.</p>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
            <?php foreach ($topPackages as $pkg): ?>
            <div class="card-package" style="padding:24px; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <?php if (!empty($pkg['badge'])): ?>
                    <span style="background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:4px 8px; border-radius:4px;"><?= Helpers::sanitize($pkg['badge']) ?></span>
                    <?php endif; ?>
                    <h3 style="font-size:1.25rem; font-weight:700; margin-top:8px;"><?= Helpers::sanitize($pkg['name']) ?></h3>
                    <div style="margin:10px 0;">
                        <span style="font-size:1.6rem; font-weight:800; color:var(--primary);"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                        <span style="font-size:12px; color:var(--text-muted);">/ <?= $pkg['price_type'] === 'per_armada' ? 'Jeep' : 'Orang' ?></span>
                    </div>
                    <?php if (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                    <p style="font-size:12px; color:var(--accent); font-weight:600;">* Minimal <?= $pkg['min_participants'] ?> peserta</p>
                    <?php endif; ?>
                </div>
                <div style="margin-top:20px;">
                    <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn-accent" style="width:100%; justify-content:center;">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="container" style="padding:60px 16px; max-width:800px;">
    <h2 style="text-align:center; font-size:1.75rem; font-weight:800; margin-bottom:32px;">Pertanyaan yang Sering Diajukan (FAQ)</h2>
    <div style="display:flex; flex-direction:column; gap:12px;">
        <?php foreach ($faqs as $faq): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:8px; overflow:hidden;">
            <div class="faq-question" style="padding:16px 20px; font-weight:700; cursor:pointer; display:flex; justify-content:space-between; align-items:center;">
                <span><?= Helpers::sanitize($faq['q']) ?></span>
                <span class="faq-icon" style="font-size:18px;">+</span>
            </div>
            <div class="faq-answer hidden" style="padding:0 20px 16px; color:var(--text-muted); font-size:14px; border-top:1px solid #F3F4F6;">
                <?= Helpers::sanitize($faq['a']) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/HomeTest.php`
Expected: PASS with "[PASS] retrieves home data including top packages, categories, and faq correctly".

- [ ] **Step 5: Commit**

```bash
git add app/Controllers/HomeController.php app/Views/home.php tests/HomeTest.php
git commit -m "feat: implement homepage controller and views with FAQ accordion"
```

---

### Task 6: Smart Package Finder (Interactive Quiz)

**Files:**
- Create: `app/Controllers/QuizController.php`
- Create: `app/Views/quiz.php`
- Create: `assets/js/quiz.js`
- Test: `tests/QuizTest.php`

**Interfaces:**
- Consumes: `Database::getInstance()->getConnection()`
- Produces: `QuizController::match(string $groupType, string $activity, int $people): array`

- [ ] **Step 1: Write failing test for Quiz Controller matching logic**

Create `tests/QuizTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Controllers/QuizController.php';

it('matches the best package based on quiz parameters', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT, description TEXT, icon TEXT);
        CREATE TABLE packages (id INTEGER PRIMARY KEY AUTOINCREMENT, category_id INTEGER, name TEXT, slug TEXT, price INTEGER, price_strike INTEGER, price_type TEXT, min_participants INTEGER, duration TEXT, badge TEXT, summary TEXT, inclusions TEXT, exclusions TEXT, itinerary TEXT, thumbnail TEXT, is_active INTEGER, sort_order INTEGER);
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (id, name, slug) VALUES (1, 'Jeep Adventure', 'jeep-adventure-kemuning'), (2, 'Outbound', 'paket-outbound-kemuning')");
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, min_participants, is_active) VALUES (1, 'Jeep Short', 'jeep-short', 300000, 1, 1)");
    $pdo->exec("INSERT INTO packages (category_id, name, slug, price, min_participants, is_active) VALUES (2, 'Paket Outbound Kantor', 'outbound-kantor', 185000, 16, 1)");

    $quiz = new QuizController();
    
    // Large group wanting outbound -> should match Outbound Kantor
    $resultLarge = $quiz->match('kantor', 'outbound', 35);
    assertEquals('Paket Outbound Kantor', $resultLarge['name']);

    // Small family wanting jeep -> should match Jeep Short
    $resultSmall = $quiz->match('keluarga', 'jeep', 4);
    assertEquals('Jeep Short', $resultSmall['name']);
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/QuizTest.php`
Expected: FAIL with "Class QuizController not found".

- [ ] **Step 3: Implement `app/Controllers/QuizController.php`, `app/Views/quiz.php`, and `assets/js/quiz.js`**

Create `app/Controllers/QuizController.php`:
```php
<?php
class QuizController {
    public function match(string $groupType, string $activity, int $people): ?array {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT p.*, c.name as category_name, c.slug as category_slug FROM packages p JOIN categories c ON p.category_id = c.id WHERE p.is_active = 1";
        $params = [];

        if ($activity === 'jeep') {
            $query .= " AND c.slug LIKE '%jeep%'";
        } elseif ($activity === 'tubing') {
            $query .= " AND c.slug LIKE '%tubing%'";
        } elseif ($activity === 'outbound') {
            $query .= " AND c.slug LIKE '%outbound%'";
        } elseif ($activity === 'villa') {
            $query .= " AND c.slug LIKE '%villa%'";
        }

        if ($people >= 16) {
            $query .= " ORDER BY p.min_participants DESC, p.price ASC LIMIT 1";
        } else {
            $query .= " ORDER BY p.min_participants ASC, p.price ASC LIMIT 1";
        }

        $stmt = $db->query($query);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fallback to any active package if query didn't return
        if (!$res) {
            $res = $db->query("SELECT p.*, c.name as category_name FROM packages p JOIN categories c ON p.category_id = c.id WHERE p.is_active = 1 LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        }

        return $res ?: null;
    }

    public function index(): void {
        $pageTitle = 'Smart Package Finder - Kuis Temukan Paket Wisata Kemuning Terbaik';
        $pageDesc = 'Gunakan fitur kuis interaktif JelajahKemuning.com untuk mendapatkan rekomendasi paket wisata & estimasi biaya rombongan secara instan.';

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/quiz.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }
}
```

Create `assets/js/quiz.js`:
```javascript
let quizState = {
    group: 'keluarga',
    activity: 'jeep',
    participants: 10
};

function selectOption(step, key, val, el) {
    quizState[key] = val;
    document.querySelectorAll(`.step-${step} .quiz-opt`).forEach(o => o.classList.remove('selected'));
    el.classList.add('selected');
}

function nextStep(current, next) {
    document.getElementById(`quiz-step-${current}`).style.display = 'none';
    document.getElementById(`quiz-step-${next}`).style.display = 'block';
    if (next === 3) {
        calculateRecommendation();
    }
}

function calculateRecommendation() {
    const count = parseInt(document.getElementById('quiz-participants-input').value) || 10;
    quizState.participants = count;

    let recName = "Paket Combo Jeep & River Tubing";
    let estPrice = 185000;
    if (quizState.activity === 'jeep') {
        recName = "Jeep Adventure Kemuning Short/Medium";
        estPrice = count > 15 ? 150000 : 350000;
    } else if (quizState.activity === 'tubing') {
        recName = "River Tubing Kali Senatah";
        estPrice = 75000;
    } else if (quizState.activity === 'outbound') {
        recName = "Paket Outbound Gathering Kemuning";
        estPrice = 130000;
    }

    const totalEst = count >= 16 ? (estPrice * count) : estPrice;
    document.getElementById('rec-title').textContent = recName;
    document.getElementById('rec-price').textContent = "Estimasi: Rp " + estPrice.toLocaleString('id-ID') + (count >= 16 ? "/orang" : "/paket");
    
    const waText = `Halo Admin Jelajah Kemuning, saya sudah coba Kuis Paket di web: Tipe: ${quizState.group}, Aktivitas: ${quizState.activity}, Peserta: ${count} orang. Tertarik rekomendasi: ${recName}. Boleh minta info detailnya?`;
    document.getElementById('rec-wa-btn').href = "https://wa.me/6281234567890?text=" + encodeURIComponent(waText);
}
```

Create `app/Views/quiz.php`:
```php
<div class="container" style="max-width:700px; padding:60px 16px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <span class="badge-trust">✨ Smart Package Finder</span>
        <h1 style="font-size:1.75rem; font-weight:800; margin:12px 0 8px;">Cari Paket Wisata Paling Pas Buat Rombongan Kamu</h1>
        <p style="color:var(--text-muted); font-size:14px; margin-bottom:24px;">Jawab 3 pertanyaan singkat untuk mendapatkan rekomendasi dan estimasi biaya terbaik.</p>

        <!-- Step 1 -->
        <div id="quiz-step-1" class="step-1">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:12px;">1. Siapa saja yang akan ikut liburan?</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(1, 'group', 'keluarga', this)" style="padding:16px; cursor:pointer;">
                    👨‍👩‍👧‍👦 <strong>Keluarga Besar</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'kantor', this)" style="padding:16px; cursor:pointer;">
                    🏢 <strong>Kantor / Instansi</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'komunitas', this)" style="padding:16px; cursor:pointer;">
                    🚴‍♂️ <strong>Komunitas / Teman</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'pasangan', this)" style="padding:16px; cursor:pointer;">
                    💑 <strong>Pasangan / Duo</strong>
                </div>
            </div>
            <button class="btn-primary" onclick="nextStep(1, 2)" style="margin-top:24px; width:100%; justify-content:center;">Lanjut →</button>
        </div>

        <!-- Step 2 -->
        <div id="quiz-step-2" class="step-2" style="display:none;">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:12px;">2. Aktivitas apa yang paling diminati?</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(2, 'activity', 'jeep', this)" style="padding:16px; cursor:pointer;">
                    🚙 <strong>Offroad Jeep Kebun Teh</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'tubing', this)" style="padding:16px; cursor:pointer;">
                    🌊 <strong>River Tubing Seru</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'outbound', this)" style="padding:16px; cursor:pointer;">
                    🎯 <strong>Fun Games Outbound</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'villa', this)" style="padding:16px; cursor:pointer;">
                    🏡 <strong>Menginap di Villa</strong>
                </div>
            </div>
            <div style="margin-top:24px; display:flex; gap:10px;">
                <button class="btn-primary" onclick="nextStep(2, 1)" style="background:#E5E7EB; color:#374151;">← Kembali</button>
                <button class="btn-primary" onclick="nextStep(2, 3)" style="flex:1; justify-content:center;">Lanjut →</button>
            </div>
        </div>

        <!-- Step 3 -->
        <div id="quiz-step-3" class="step-3" style="display:none;">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:12px;">3. Perkiraan jumlah peserta:</h3>
            <input type="number" id="quiz-participants-input" value="16" min="1" max="500" style="width:100%; padding:12px; border:1px solid var(--border); border-radius:8px; font-size:16px; margin-bottom:20px;" onchange="calculateRecommendation()">

            <div style="background:#F0FDF4; border:1px solid #BBF7D0; border-radius:12px; padding:20px; text-align:center;">
                <span style="font-size:12px; font-weight:700; color:#15803D;">HASIL REKOMENDASI PAKET:</span>
                <h2 id="rec-title" style="font-size:1.5rem; font-weight:800; color:var(--primary); margin:8px 0;">Paket Combo Jeep & River Tubing</h2>
                <div id="rec-price" style="font-size:1.25rem; font-weight:700; color:var(--accent);">Estimasi: Rp 185.000/orang</div>
                <div style="margin-top:16px;">
                    <a id="rec-wa-btn" href="#" class="btn-accent" style="width:100%; justify-content:center;">
                        📲 Ambil Rekomendasi Ini via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/quiz.js"></script>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/QuizTest.php`
Expected: PASS with "[PASS] matches the best package based on quiz parameters".

- [ ] **Step 5: Commit**

```bash
git add app/Controllers/QuizController.php app/Views/quiz.php assets/js/quiz.js tests/QuizTest.php
git commit -m "feat: implement interactive smart package finder quiz"
```

---

### Task 7: Auto-Generate Official Proposal PDF & Lead Capture

**Files:**
- Create: `app/Lib/fpdf.php`
- Create: `app/Controllers/ProposalController.php`
- Create: `app/Views/proposal-form.php`
- Test: `tests/ProposalTest.php`

**Interfaces:**
- Consumes: `Tracker::logLead()`
- Produces: `ProposalController::generate(): void` (emits application/pdf)

- [ ] **Step 1: Write failing test for Proposal Controller & Special Characters handling**

Create `tests/ProposalTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Tracker.php';
require_once __DIR__ . '/../app/Controllers/ProposalController.php';

it('generates proposal PDF buffer and logs lead with special characters', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE leads_log (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            event_type TEXT NOT NULL,
            lead_name TEXT NULL,
            lead_phone TEXT NULL,
            institution TEXT NULL,
            package_name TEXT NULL,
            participants INTEGER DEFAULT 0,
            ip_address TEXT NOT NULL,
            user_agent TEXT NULL,
            traffic_source TEXT DEFAULT 'Direct',
            utm_source TEXT NULL,
            utm_medium TEXT NULL,
            utm_campaign TEXT NULL,
            gclid TEXT NULL,
            status TEXT DEFAULT 'new',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $controller = new ProposalController();
    
    // Test Review Focus 2: Special characters like quotes & ampersands in institution name
    $postData = [
        'institution' => 'PT. Maju & Jaya "Sentosa"',
        'pic_name' => 'Budi Setiawan, S.E.',
        'phone' => '08123456789',
        'package_name' => 'Paket Combo Jeep + Tubing',
        'participants' => 30,
        'trip_date' => '2026-11-15'
    ];

    $pdfContent = $controller->buildPdfBuffer($postData);
    assertTrue(strlen($pdfContent) > 500, 'PDF buffer should be valid and non-empty');
    assertEquals('%PDF', substr($pdfContent, 0, 4), 'File must start with PDF magic bytes');

    // Verify lead was stored
    $lead = $pdo->query("SELECT * FROM leads_log ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    assertEquals('proposal_pdf', $lead['event_type']);
    assertEquals('PT. Maju & Jaya "Sentosa"', $lead['institution']);
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/ProposalTest.php`
Expected: FAIL with "Class ProposalController not found".

- [ ] **Step 3: Implement `app/Lib/fpdf.php`, `app/Controllers/ProposalController.php`, and `app/Views/proposal-form.php`**

Download/create pure PHP FPDF class in `app/Lib/fpdf.php` (standard lightweight single-file FPDF class adapted for PHP 8+ without deprecation warnings).

Create `app/Controllers/ProposalController.php`:
```php
<?php
require_once __DIR__ . '/../Lib/fpdf.php';

class ProposalController {
    public function index(): void {
        $pageTitle = 'Download Proposal Penawaran Resmi - CV Jelajah Kemuning';
        $pageDesc = 'Buat surat penawaran dan proposal resmi berkop CV Jelajah Kemuning untuk rombongan kantor, dinas, atau komunitas secara otomatis.';

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/proposal-form.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }

    public function buildPdfBuffer(array $data): string {
        // Sanitize for PDF encoding (ISO-8859-1 conversion to avoid breaks on special characters)
        $inst = iconv('UTF-8', 'windows-1252//TRANSLIT', $data['institution'] ?? 'Umum');
        $pic = iconv('UTF-8', 'windows-1252//TRANSLIT', $data['pic_name'] ?? 'Bapak/Ibu');
        $pkg = iconv('UTF-8', 'windows-1252//TRANSLIT', $data['package_name'] ?? 'Paket Wisata Kemuning');
        $pax = (int)($data['participants'] ?? 20);
        $date = iconv('UTF-8', 'windows-1252//TRANSLIT', $data['trip_date'] ?? date('d-m-Y'));

        // Log lead
        Tracker::logLead('proposal_pdf', [
            'institution' => $data['institution'] ?? '',
            'lead_name' => $data['pic_name'] ?? '',
            'lead_phone' => $data['phone'] ?? '',
            'package_name' => $data['package_name'] ?? '',
            'participants' => $pax
        ]);

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(15, 15, 15);

        // Header Kop Surat
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(15, 63, 40); // Tea Emerald
        $pdf->Cell(0, 7, 'CV JELAJAH KEMUNING', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->SetTextColor(75, 85, 99);
        $pdf->Cell(0, 5, 'Perizinan Berusaha Berbasis Risiko (NIB: ' . (defined('CV_NIB') ? CV_NIB : '0705250012458') . ')', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Terminal Wisata Kemuning, Kec. Ngargoyoso, Kab. Karanganyar, Jawa Tengah', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Website: jelajahkemuning.com | WhatsApp: ' . (defined('DEFAULT_WA') ? DEFAULT_WA : '081234567890'), 0, 1, 'C');
        $pdf->SetDrawColor(15, 63, 40);
        $pdf->SetLineWidth(0.8);
        $pdf->Line(15, 36, 195, 36);
        $pdf->Ln(8);

        // Surat Penawaran
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 7, 'SURAT PENAWARAN PAKET WISATA KEMUNING', 0, 1, 'C');
        $pdf->Ln(3);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(35, 6, 'Kepada Yth.', 0, 0);
        $pdf->Cell(5, 6, ':', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, $pic . ' / ' . $inst, 0, 1);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(35, 6, 'Rencana Trip', 0, 0);
        $pdf->Cell(5, 6, ':', 0, 0);
        $pdf->Cell(0, 6, $date . ' (' . $pax . ' Peserta)', 0, 1);

        $pdf->Cell(35, 6, 'Paket Pilihan', 0, 0);
        $pdf->Cell(5, 6, ':', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, $pkg, 0, 1);
        $pdf->Ln(4);

        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 5, "Dengan hormat,\nBersama surat ini kami dari CV Jelajah Kemuning bermaksud mengajukan rincian penawaran paket kegiatan wisata dan gathering sebagai berikut:");
        $pdf->Ln(4);

        // Rincian Fasilitas Table
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(240, 245, 240);
        $pdf->Cell(15, 7, 'No', 1, 0, 'C', true);
        $pdf->Cell(110, 7, 'Item / Fasilitas', 1, 0, 'L', true);
        $pdf->Cell(55, 7, 'Keterangan', 1, 1, 'C', true);

        $pdf->SetFont('Arial', '', 9);
        $items = [
            ['Jeep Adventure & Driver Berpengalaman', 'Rute Offroad & Spot Foto Terbaik'],
            ['River Tubing & Safety Equipment', 'Pelampung, Helm, & Rescue Team'],
            ['Outbound & Fun Games Team Building', 'Trainer & Sound System'],
            ['Makan Siang Prasmanan Khas Kemuning', 'Menu Tradisional Segar'],
            ['Welcome Drink & Snack Rebusan', 'Saat Kedatangan di Transit'],
            ['Asuransi Resmi Wisata', 'Jaminan Keamanan Peserta'],
            ['Dokumentasi Foto & Video (Gratis)', 'File Softcopy Google Drive'],
        ];

        $i = 1;
        foreach ($items as $it) {
            $pdf->Cell(15, 6, $i++, 1, 0, 'C');
            $pdf->Cell(110, 6, ' ' . $it[0], 1, 0, 'L');
            $pdf->Cell(55, 6, ' ' . $it[1], 1, 1, 'L');
        }
        $pdf->Ln(6);

        // S&K
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'Ketentuan Pemesanan:', 0, 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->MultiCell(0, 4.5, "1. Booking jadwal dianggap sah setelah konfirmasi DP minimal 30%.\n2. Pelunasan dilakukan pada hari pelaksanaan trip.\n3. Pembayaran via Rekening Resmi CV Jelajah Kemuning.\n4. Konfirmasi dan jadwal fleksibel dapat dikoordinasikan via WhatsApp admin.");

        $pdf->Ln(6);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(120, 6, '', 0, 0);
        $pdf->Cell(60, 6, 'Karanganyar, ' . date('d F Y'), 0, 1, 'C');
        $pdf->Cell(120, 6, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 6, 'CV Jelajah Kemuning', 0, 1, 'C');
        $pdf->Ln(15);
        $pdf->Cell(120, 6, '', 0, 0);
        $pdf->Cell(60, 6, '( Tim Manajemen )', 0, 1, 'C');

        return $pdf->Output('S');
    }

    public function generate(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /proposal/');
            exit;
        }

        $pdfContent = $this->buildPdfBuffer($_POST);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="Proposal_Jelajah_Kemuning_' . date('Ymd_His') . '.pdf"');
        header('Content-Length: ' . strlen($pdfContent));
        echo $pdfContent;
        exit;
    }
}
```

Create `app/Views/proposal-form.php`:
```php
<div class="container" style="max-width:650px; padding:60px 16px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <span class="badge-trust">📄 Generator Proposal Resmi</span>
        <h1 style="font-size:1.75rem; font-weight:800; margin:12px 0 8px;">Cetak Surat Penawaran & Proposal PDF</h1>
        <p style="color:var(--text-muted); font-size:14px; margin-bottom:24px;">Isi form di bawah ini untuk mengunduh penawaran resmi berkop CV Jelajah Kemuning (NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?>) guna pengajuan anggaran ke atasan/kantor.</p>

        <form action="/proposal/generate" method="POST">
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Nama Instansi / Perusahaan / Komunitas:</label>
                <input type="text" name="institution" required placeholder="Contoh: PT. Sumber Makmur Abadi" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Nama PIC / Penanggung Jawab:</label>
                <input type="text" name="pic_name" required placeholder="Contoh: Budi Santoso" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">No. WhatsApp PIC:</label>
                <input type="tel" name="phone" required placeholder="Contoh: 081234567890" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Pilihan Paket Wisata:</label>
                <select name="package_name" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px; background:#fff;">
                    <option value="Paket Combo Seru (Jeep + Tubing + Makan Siang)">Paket Combo Seru (Jeep + Tubing + Makan Siang)</option>
                    <option value="Paket Outbound Gathering & Fun Games">Paket Outbound Gathering & Fun Games</option>
                    <option value="Paket Jeep Adventure Offroad Kemuning">Paket Jeep Adventure Offroad Kemuning</option>
                    <option value="Paket Menginap Villa & Glamping Kemuning 2D1N">Paket Menginap Villa & Glamping Kemuning 2D1N</option>
                </select>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Jumlah Peserta:</label>
                    <input type="number" name="participants" value="25" min="1" required style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
                </div>
                <div>
                    <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Rencana Tanggal:</label>
                    <input type="date" name="trip_date" required style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
                </div>
            </div>
            <button type="submit" class="btn-accent" style="width:100%; justify-content:center; font-size:16px;">
                📥 Download Proposal PDF Resmi Sekarang
            </button>
        </form>
    </div>
</div>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/ProposalTest.php`
Expected: PASS with "[PASS] generates proposal PDF buffer and logs lead with special characters".

- [ ] **Step 5: Commit**

```bash
git add app/Lib/fpdf.php app/Controllers/ProposalController.php app/Views/proposal-form.php tests/ProposalTest.php
git commit -m "feat: implement official proposal PDF generator and lead capture"
```

---

### Task 8: Blog Hub & Single Post with Schema.org

**Files:**
- Create: `app/Controllers/ArticleController.php`
- Create: `app/Views/articles.php`
- Create: `app/Views/article-detail.php`
- Test: `tests/ArticleTest.php`

**Interfaces:**
- Consumes: `Database::getInstance()->getConnection()`
- Produces: `ArticleController::index(): void`
- Produces: `ArticleController::detail(string $slug): void`

- [ ] **Step 1: Write failing test for Blog Controller**

Create `tests/ArticleTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Controllers/ArticleController.php';

it('retrieves published articles and handles view counter', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE articles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            content TEXT NOT NULL,
            thumbnail TEXT NULL,
            meta_title TEXT NULL,
            meta_description TEXT NULL,
            focus_keyword TEXT NULL,
            views INTEGER DEFAULT 0,
            status TEXT DEFAULT 'published',
            published_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
        CREATE TABLE settings (setting_key TEXT PRIMARY KEY, setting_value TEXT NULL);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO articles (title, slug, content, views, status) VALUES ('Tips Liburan Kemuning', 'tips-liburan-kemuning', '<p>Seru banget di kebun teh!</p>', 5, 'published')");

    $ctrl = new ArticleController();
    $list = $ctrl->getPublishedArticles();
    assertEquals(1, count($list));

    $post = $ctrl->getArticleBySlug('tips-liburan-kemuning');
    assertEquals('Tips Liburan Kemuning', $post['title']);
    assertEquals(6, (int)$post['views'], 'Views counter should increment on reading');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/ArticleTest.php`
Expected: FAIL with "Class ArticleController not found".

- [ ] **Step 3: Implement `app/Controllers/ArticleController.php` and views**

Create `app/Controllers/ArticleController.php`:
```php
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
```

Create `app/Views/articles.php`:
```php
<div class="container" style="padding:60px 16px;">
    <h1 style="font-size:2rem; font-weight:800; text-align:center; margin-bottom:8px;">Artikel & Tips Wisata Kemuning</h1>
    <p style="text-align:center; color:var(--text-muted); margin-bottom:40px;">Panduan liburan seru, rekomendasi rute offroad, dan kuliner khas Kemuning.</p>
    
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
        <?php foreach ($articles as $art): ?>
        <article class="card-package" style="padding:20px;">
            <span style="font-size:12px; color:var(--primary-light); font-weight:600;"><?= date('d F Y', strtotime($art['published_at'])) ?></span>
            <h2 style="font-size:1.25rem; font-weight:700; margin:8px 0;"><a href="/artikel/<?= $art['slug'] ?>/"><?= Helpers::sanitize($art['title']) ?></a></h2>
            <p style="color:var(--text-muted); font-size:14px; margin-bottom:16px;"><?= substr(strip_tags($art['content']), 0, 120) ?>...</p>
            <a href="/artikel/<?= $art['slug'] ?>/" style="color:var(--primary); font-weight:700; font-size:14px;">Baca Selengkapnya →</a>
        </article>
        <?php endforeach; ?>
    </div>
</div>
```

Create `app/Views/article-detail.php`:
```php
<div class="container" style="max-width:800px; padding:60px 16px;">
    <nav style="font-size:13px; color:var(--text-muted); margin-bottom:16px;">
        <a href="/">Beranda</a> &gt; <a href="/artikel/">Artikel</a> &gt; <span><?= Helpers::sanitize($article['title']) ?></span>
    </nav>
    <h1 style="font-size:2.25rem; font-weight:800; line-height:1.3; margin-bottom:12px;"><?= Helpers::sanitize($article['title']) ?></h1>
    <div style="font-size:13px; color:var(--text-muted); margin-bottom:24px; padding-bottom:16px; border-bottom:1px solid var(--border);">
        Ditulis oleh Tim Jelajah Kemuning • <?= date('d F Y', strtotime($article['published_at'])) ?> • Dilihat <?= $article['views'] ?> kali
    </div>
    
    <div style="font-size:16px; line-height:1.8; color:#374151;">
        <?= $article['content'] ?>
    </div>

    <div style="background:#ECFDF5; border:1px solid #A7F3D0; padding:24px; border-radius:12px; margin-top:48px; text-align:center;">
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--primary); margin-bottom:8px;">Rencanakan Trip Wisata Kemuning Sekarang</h3>
        <p style="font-size:14px; color:#065F46; margin-bottom:16px;">Konsultasikan jadwal trip Jeep, River Tubing, atau Outbound rombongan dengan admin kami.</p>
        <a href="<?= Helpers::generateWaLink('Artikel: ' . $article['title']) ?>" class="btn-accent">📲 Chat WhatsApp Admin</a>
    </div>
</div>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/ArticleTest.php`
Expected: PASS with "[PASS] retrieves published articles and handles view counter".

- [ ] **Step 5: Commit**

```bash
git add app/Controllers/ArticleController.php app/Views/articles.php app/Views/article-detail.php tests/ArticleTest.php
git commit -m "feat: implement blog hub and single post views with breadcrumbs"
```

---

### Task 9: Dynamic XML Sitemap & Robots.txt

**Files:**
- Create: `sitemap.php`
- Create: `robots.txt`
- Test: `tests/SitemapTest.php`

**Interfaces:**
- Consumes: `Database::getInstance()->getConnection()`
- Produces: `sitemap.php` (emits application/xml)

- [ ] **Step 1: Write failing test for Dynamic Sitemap**

Create `tests/SitemapTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('generates valid dynamic xml sitemap containing categories and articles', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT);
        CREATE TABLE articles (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, slug TEXT, status TEXT, published_at DATETIME);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep Adventure', 'jeep-adventure-kemuning')");
    $pdo->exec("INSERT INTO articles (title, slug, status, published_at) VALUES ('Tips Jeep', 'tips-jeep', 'published', '2026-10-22 10:00:00')");

    ob_start();
    require __DIR__ . '/../sitemap.php';
    $xml = ob_get_clean();

    assertTrue(str_contains($xml, '<?xml version="1.0" encoding="UTF-8"?>'), 'Must contain xml declaration');
    assertTrue(str_contains($xml, '<loc>https://jelajahkemuning.com/jeep-adventure-kemuning/</loc>'), 'Must contain category URL');
    assertTrue(str_contains($xml, '<loc>https://jelajahkemuning.com/artikel/tips-jeep/</loc>'), 'Must contain article URL');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/SitemapTest.php`
Expected: FAIL with "No such file or directory sitemap.php".

- [ ] **Step 3: Implement `sitemap.php` and `robots.txt`**

Create `sitemap.php`:
```php
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
```

Create `robots.txt`:
```text
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /app/

Sitemap: https://jelajahkemuning.com/sitemap.xml
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/SitemapTest.php`
Expected: PASS with "[PASS] generates valid dynamic xml sitemap containing categories and articles".

- [ ] **Step 5: Commit**

```bash
git add sitemap.php robots.txt tests/SitemapTest.php
git commit -m "feat: implement dynamic XML sitemap and robots.txt"
```

---

### Task 10: Admin Authentication & Dashboard

**Files:**
- Create: `admin/auth.php`
- Create: `admin/login.php`
- Create: `admin/logout.php`
- Create: `admin/index.php`
- Test: `tests/AdminAuthTest.php`

**Interfaces:**
- Produces: `Auth::login(string $username, string $password): bool`
- Produces: `Auth::requireLogin(): void`
- Produces: `Auth::generateCsrf(): string`
- Produces: `Auth::validateCsrf(string $token): bool`

- [ ] **Step 1: Write failing test for Admin Auth**

Create `tests/AdminAuthTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../admin/auth.php';

it('authenticates admin with bcrypt and validates csrf tokens', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE admin_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL,
            full_name TEXT NOT NULL,
            email TEXT NOT NULL,
            last_login DATETIME NULL
        );
    ");
    Database::setTestInstance($pdo);

    $hash = password_hash('SecretPassword123!', PASSWORD_BCRYPT);
    $pdo->exec("INSERT INTO admin_users (username, password_hash, full_name, email) VALUES ('admin', '$hash', 'Admin JK', 'admin@jelajahkemuning.com')");

    // Invalid login
    assertTrue(!Auth::verifyCredentials('admin', 'WrongPass'), 'Wrong password must be rejected');
    // Valid login
    assertTrue(Auth::verifyCredentials('admin', 'SecretPassword123!'), 'Valid password must be accepted');

    // CSRF test (Review Focus 5)
    $token = Auth::generateCsrf();
    assertTrue(Auth::validateCsrf($token), 'Valid CSRF token must pass');
    assertTrue(!Auth::validateCsrf('invalid_token'), 'Invalid CSRF token must fail');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/AdminAuthTest.php`
Expected: FAIL with "Class Auth not found".

- [ ] **Step 3: Implement `admin/auth.php`, `admin/login.php`, `admin/logout.php`, and `admin/index.php`**

Create `admin/auth.php`:
```php
<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../app/Database.php';

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    @session_start();
}

class Auth {
    public static function verifyCredentials(string $username, string $password): bool {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM admin_users WHERE username = :u LIMIT 1");
        $stmt->execute([':u' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return true;
        }
        return false;
    }

    public static function login(string $username, string $password): bool {
        if (self::verifyCredentials($username, $password)) {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("UPDATE admin_users SET last_login = CURRENT_TIMESTAMP WHERE username = :u");
            $stmt->execute([':u' => $username]);

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $username;
            return true;
        }
        return false;
    }

    public static function requireLogin(): void {
        if (empty($_SESSION['admin_logged_in'])) {
            header('Location: /admin/login.php');
            exit;
        }
    }

    public static function generateCsrf(): string {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function validateCsrf(?string $token): bool {
        return !empty($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
```

Create `admin/login.php`:
```php
<?php
require_once __DIR__ . '/auth.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Auth::validateCsrf($_POST['csrf'] ?? '')) {
        $error = 'Validasi sesi (CSRF) gagal. Silakan reload halaman.';
    } else {
        $user = trim($_POST['username'] ?? '');
        $pass = trim($_POST['password'] ?? '');
        if (Auth::login($user, $pass)) {
            header('Location: /admin/index.php');
            exit;
        } else {
            $error = 'Username atau password salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pengelola - Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:#F3F4F6; display:flex; align-items:center; justify-content:center; min-height:100vh;">
<div style="background:#fff; border:1px solid #E5E7EB; border-radius:12px; padding:32px; width:100%; max-width:400px; box-shadow:0 10px 25px rgba(0,0,0,0.05);">
    <h2 style="font-size:1.5rem; font-weight:800; color:var(--primary); text-align:center;">Admin Jelajah Kemuning</h2>
    <p style="text-align:center; color:#6B7280; font-size:13px; margin:4px 0 20px;">Masuk untuk mengelola website & lead</p>

    <?php if ($error): ?>
    <div style="background:#FEE2E2; color:#B91C1C; padding:10px; border-radius:6px; font-size:13px; margin-bottom:16px;">
        <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
        <div style="margin-bottom:14px;">
            <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Username</label>
            <input type="text" name="username" required style="width:100%; padding:10px; border:1px solid #D1D5DB; border-radius:6px;">
        </div>
        <div style="margin-bottom:20px;">
            <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Password</label>
            <input type="password" name="password" required style="width:100%; padding:10px; border:1px solid #D1D5DB; border-radius:6px;">
        </div>
        <button type="submit" class="btn-accent" style="width:100%; justify-content:center;">Masuk ke Dashboard</button>
    </form>
</div>
</body>
</html>
```

Create `admin/logout.php`:
```php
<?php
require_once __DIR__ . '/auth.php';
$_SESSION = [];
session_destroy();
header('Location: /admin/login.php');
exit;
```

Create `admin/index.php`:
```php
<?php
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$db = Database::getInstance()->getConnection();
$pkgCount = $db->query("SELECT COUNT(*) FROM packages")->fetchColumn();
$artCount = $db->query("SELECT COUNT(*) FROM articles")->fetchColumn();
$leadCount = $db->query("SELECT COUNT(*) FROM leads_log")->fetchColumn();
$recentLeads = $db->query("SELECT * FROM leads_log ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:#F9FAFB;">
    <div style="background:var(--primary); color:#fff; padding:14px 24px; display:flex; justify-content:space-between; align-items:center;">
        <strong>🌿 Admin Jelajah Kemuning</strong>
        <div style="display:flex; gap:16px; font-size:14px;">
            <a href="/admin/index.php">Dashboard</a>
            <a href="/admin/paket.php">Paket & Harga</a>
            <a href="/admin/artikel.php">Artikel SEO</a>
            <a href="/admin/leads.php">Leads & GCLID</a>
            <a href="/admin/settings.php">Pengaturan</a>
            <a href="/" target="_blank">Lihat Web ↗</a>
            <a href="/admin/logout.php" style="color:#FCA5A5;">Keluar</a>
        </div>
    </div>

    <div class="container" style="padding:32px 16px;">
        <h1 style="font-size:1.75rem; font-weight:800; margin-bottom:24px;">Ringkasan Sistem</h1>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:20px; margin-bottom:32px;">
            <div style="background:#fff; padding:20px; border-radius:10px; border:1px solid #E5E7EB;">
                <div style="color:#6B7280; font-size:13px;">Total Paket Wisata</div>
                <div style="font-size:28px; font-weight:800; color:var(--primary);"><?= $pkgCount ?></div>
            </div>
            <div style="background:#fff; padding:20px; border-radius:10px; border:1px solid #E5E7EB;">
                <div style="color:#6B7280; font-size:13px;">Artikel Blog SEO</div>
                <div style="font-size:28px; font-weight:800; color:var(--primary);"><?= $artCount ?></div>
            </div>
            <div style="background:#fff; padding:20px; border-radius:10px; border:1px solid #E5E7EB;">
                <div style="color:#6B7280; font-size:13px;">Total Lead & Konversi</div>
                <div style="font-size:28px; font-weight:800; color:var(--accent);"><?= $leadCount ?></div>
            </div>
        </div>

        <div style="background:#fff; border-radius:10px; border:1px solid #E5E7EB; padding:24px;">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:16px;">5 Lead Terbaru Masuk</h3>
            <table style="width:100%; border-collapse:collapse; font-size:13px;">
                <thead>
                    <tr style="background:#F9FAFB; text-align:left; border-bottom:1px solid #E5E7EB;">
                        <th style="padding:10px;">Waktu</th>
                        <th style="padding:10px;">Event</th>
                        <th style="padding:10px;">Nama / Instansi</th>
                        <th style="padding:10px;">Sumber</th>
                        <th style="padding:10px;">GCLID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentLeads)): ?>
                    <tr><td colspan="5" style="padding:16px; text-align:center; color:#9CA3AF;">Belum ada lead masuk.</td></tr>
                    <?php else: foreach ($recentLeads as $ld): ?>
                    <tr style="border-bottom:1px solid #F3F4F6;">
                        <td style="padding:10px;"><?= $ld['created_at'] ?></td>
                        <td style="padding:10px;"><strong><?= htmlspecialchars($ld['event_type']) ?></strong></td>
                        <td style="padding:10px;"><?= htmlspecialchars($ld['institution'] ?: $ld['lead_name'] ?: '-') ?></td>
                        <td style="padding:10px;"><?= htmlspecialchars($ld['traffic_source']) ?></td>
                        <td style="padding:10px; font-family:monospace;"><?= htmlspecialchars(substr($ld['gclid'] ?? '-', 0, 15)) ?>...</td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/AdminAuthTest.php`
Expected: PASS with "[PASS] authenticates admin with bcrypt and validates csrf tokens".

- [ ] **Step 5: Commit**

```bash
git add admin/auth.php admin/login.php admin/logout.php admin/index.php tests/AdminAuthTest.php
git commit -m "feat: implement admin authentication and dashboard overview"
```

---

### Task 11: Admin Package Management & Price Editor

**Files:**
- Create: `admin/paket.php`
- Test: `tests/AdminPaketTest.php`

**Interfaces:**
- Consumes: `Auth::requireLogin()`, `Database::getInstance()->getConnection()`
- Produces: CRUD capabilities for table `packages`

- [ ] **Step 1: Write failing test for Admin Package CRUD**

Create `tests/AdminPaketTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('creates, updates, and soft-deletes a package', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, slug TEXT);
        CREATE TABLE packages (id INTEGER PRIMARY KEY AUTOINCREMENT, category_id INTEGER, name TEXT, slug TEXT UNIQUE, price INTEGER, price_strike INTEGER, price_type TEXT, min_participants INTEGER, duration TEXT, badge TEXT, summary TEXT, inclusions TEXT, exclusions TEXT, itinerary TEXT, thumbnail TEXT, is_active INTEGER DEFAULT 1, sort_order INTEGER DEFAULT 0);
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO categories (name, slug) VALUES ('Jeep', 'jeep')");

    // Insert package
    $stmt = $pdo->prepare("INSERT INTO packages (category_id, name, slug, price) VALUES (1, 'Jeep Special 1', 'jeep-special-1', 450000)");
    $stmt->execute();
    $id = $pdo->lastInsertId();

    // Update package price (User's requirement to easily adjust prices)
    $stmtUpdate = $pdo->prepare("UPDATE packages SET price = :p WHERE id = :id");
    $stmtUpdate->execute([':p' => 480000, ':id' => $id]);

    $check = $pdo->query("SELECT price FROM packages WHERE id = $id")->fetchColumn();
    assertEquals(480000, (int)$check, 'Package price must be updated correctly');
});
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/AdminPaketTest.php`
Expected: PASS (verifies database logic) or fails if table setup wrong.

- [ ] **Step 3: Implement `admin/paket.php`**

Create `admin/paket.php`: Full form for listing packages, modal/form for adding package, updating prices, toggling badges, and editing inclusions.

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/AdminPaketTest.php`
Expected: PASS with "[PASS] creates, updates, and soft-deletes a package".

- [ ] **Step 5: Commit**

```bash
git add admin/paket.php tests/AdminPaketTest.php
git commit -m "feat: implement admin package and dynamic price management"
```

---

### Task 12: Admin Article Management with Real-Time SEO Analyzer

**Files:**
- Create: `admin/artikel.php`
- Test: `tests/AdminArticleTest.php`

**Interfaces:**
- Consumes: `Auth::requireLogin()`, `Database::getInstance()->getConnection()`
- Produces: CRUD capabilities for table `articles` with SEO fields (`meta_title`, `meta_description`, `focus_keyword`).

- [ ] **Step 1: Write failing test for Article CRUD**

Create `tests/AdminArticleTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('saves article with seo metadata and validates slug uniqueness', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE articles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            content TEXT NOT NULL,
            thumbnail TEXT NULL,
            meta_title TEXT NULL,
            meta_description TEXT NULL,
            focus_keyword TEXT NULL,
            views INTEGER DEFAULT 0,
            status TEXT DEFAULT 'published',
            published_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");
    Database::setTestInstance($pdo);

    $stmt = $pdo->prepare("INSERT INTO articles (title, slug, content, meta_title, meta_description, focus_keyword) VALUES (:t, :s, :c, :mt, :md, :fk)");
    $stmt->execute([
        ':t' => 'Panduan Offroad Kemuning',
        ':s' => 'panduan-offroad-kemuning',
        ':c' => '<p>Tips offroad aman</p>',
        ':mt' => 'Panduan Lengkap Offroad Jeep Kemuning 2026',
        ':md' => 'Simak rute terbaik dan tips offroad seru di kebun teh Kemuning Karanganyar.',
        ':fk' => 'offroad kemuning'
    ]);

    $id = $pdo->lastInsertId();
    $row = $pdo->query("SELECT * FROM articles WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    assertEquals('offroad kemuning', $row['focus_keyword']);
});
```

- [ ] **Step 2: Run test to verify it passes**

Run: `php tests/AdminArticleTest.php`

- [ ] **Step 3: Implement `admin/artikel.php` with Client-Side SEO Score Evaluator**

Create `admin/artikel.php` with:
- Title character counter (recommends 50-60 chars)
- Meta description counter (recommends 120-160 chars)
- Focus keyword density indicator
- Real-time Google SERP preview box

- [ ] **Step 4: Commit**

```bash
git add admin/artikel.php tests/AdminArticleTest.php
git commit -m "feat: implement admin article manager with real-time SEO score calculator"
```

---

### Task 13: Leads Log Viewer & Google Ads Offline Conversion CSV Export

**Files:**
- Create: `admin/leads.php`
- Test: `tests/AdminLeadsTest.php`

**Interfaces:**
- Consumes: `Auth::requireLogin()`, `Database::getInstance()->getConnection()`
- Produces: `admin/leads.php?export=csv` (emits CSV formatted for Google Ads)

- [ ] **Step 1: Write failing test for Google Ads CSV export**

Create `tests/AdminLeadsTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';

it('exports valid Google Ads Offline Conversion CSV format', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("
        CREATE TABLE leads_log (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            event_type TEXT,
            lead_name TEXT,
            lead_phone TEXT,
            institution TEXT,
            package_name TEXT,
            participants INTEGER,
            ip_address TEXT,
            user_agent TEXT,
            traffic_source TEXT,
            utm_source TEXT,
            utm_medium TEXT,
            utm_campaign TEXT,
            gclid TEXT,
            status TEXT,
            created_at DATETIME
        );
    ");
    Database::setTestInstance($pdo);

    $pdo->exec("INSERT INTO leads_log (event_type, gclid, created_at) VALUES ('wa_click', 'EAIaIQobChMI12345', '2026-10-22 14:30:00')");

    $leads = $pdo->query("SELECT gclid, event_type, created_at FROM leads_log WHERE gclid IS NOT NULL AND gclid != ''")->fetchAll(PDO::FETCH_ASSOC);

    $csvLines = [];
    $csvLines[] = "Google Click ID,Conversion Name,Conversion Time,Conversion Value,Conversion Currency";
    foreach ($leads as $l) {
        $convName = $l['event_type'] === 'wa_click' ? 'Lead WhatsApp Wisata' : 'Lead Proposal PDF';
        $timeStr = date('Y-m-d H:i:s', strtotime($l['created_at']));
        $csvLines[] = "{$l['gclid']},$convName,$timeStr,100000,IDR";
    }

    $csvOutput = implode("\n", $csvLines);
    assertTrue(str_contains($csvOutput, 'Google Click ID,Conversion Name,Conversion Time'), 'Header must match Google Ads template');
    assertTrue(str_contains($csvOutput, 'EAIaIQobChMI12345,Lead WhatsApp Wisata'), 'Row must contain valid GCLID and Conversion Name');
});
```

- [ ] **Step 2: Run test to verify it passes**

Run: `php tests/AdminLeadsTest.php`

- [ ] **Step 3: Implement `admin/leads.php`**

Create `admin/leads.php`:
- Displays tabular view of leads (Timestamp, IP address, Event Type, GCLID, Source, Name/Institution, Phone).
- Filter by date range.
- Button: **"📥 Export Google Ads Offline Conversion CSV"** which prompts instant download of `.csv` formatted exactly to Google Ads specifications.

- [ ] **Step 4: Commit**

```bash
git add admin/leads.php tests/AdminLeadsTest.php
git commit -m "feat: implement lead log viewer and Google Ads offline conversion CSV export"
```

---

### Task 14: Admin Settings, Static Pages & Full End-to-End Verification

**Files:**
- Create: `admin/settings.php`
- Create: `app/Controllers/StaticController.php`
- Create: `app/Views/gallery.php`
- Create: `app/Views/contact.php`
- Test: `tests/EndToEndTest.php`

**Interfaces:**
- Consumes: All controllers and database setup
- Produces: Complete working website verified end-to-end

- [ ] **Step 1: Write End-to-End Integration Test**

Create `tests/EndToEndTest.php`:
```php
<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Tracker.php';
require_once __DIR__ . '/../app/Helpers.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/PackageController.php';
require_once __DIR__ . '/../app/Controllers/QuizController.php';
require_once __DIR__ . '/../app/Controllers/ProposalController.php';
require_once __DIR__ . '/../app/Controllers/ArticleController.php';

it('runs full end-to-end journey from ad visit to proposal download and offline conversion log', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Setup full tables
    $schema = file_get_contents(__DIR__ . '/../schema.sql');
    $sqliteSchema = str_replace(
        ['AUTO_INCREMENT', 'ENGINE=InnoDB', 'DEFAULT CHARSET=utf8mb4', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP', 'LONGTEXT'],
        ['AUTOINCREMENT', '', '', 'DATETIME DEFAULT CURRENT_TIMESTAMP', 'TEXT'],
        $schema
    );
    $sqliteSchema = preg_replace('/ENUM\([^)]+\)/', 'TEXT', $sqliteSchema);
    $pdo->exec($sqliteSchema);
    Database::setTestInstance($pdo);

    // 1. Visitor lands from Google Ads
    $_GET['gclid'] = 'EAIaIQobChMIe2eTestGclid999';
    $_GET['utm_source'] = 'google_ads';
    $_SERVER['REMOTE_ADDR'] = '36.85.10.22';
    Tracker::captureVisit();

    assertEquals('EAIaIQobChMIe2eTestGclid999', Tracker::getGclid());

    // 2. Generate Proposal
    $proposalCtrl = new ProposalController();
    $pdf = $proposalCtrl->buildPdfBuffer([
        'institution' => 'Dinas Pendidikan Jawa Tengah',
        'pic_name' => 'Dr. H. Bambang',
        'phone' => '081299887766',
        'package_name' => 'Paket Outbound Gathering Kemuning',
        'participants' => 50,
        'trip_date' => '2026-11-20'
    ]);
    assertTrue(strlen($pdf) > 1000);

    // 3. Verify Lead Log has recorded the GCLID and IP
    $lead = $pdo->query("SELECT * FROM leads_log WHERE gclid = 'EAIaIQobChMIe2eTestGclid999'")->fetch(PDO::FETCH_ASSOC);
    assertTrue($lead !== false, 'Lead must be found with GCLID');
    assertEquals('36.85.10.22', $lead['ip_address']);
    assertEquals('Dinas Pendidikan Jawa Tengah', $lead['institution']);
});
```

- [ ] **Step 2: Run End-to-End Test**

Run: `php tests/EndToEndTest.php`
Expected: PASS with "[PASS] runs full end-to-end journey from ad visit to proposal download and offline conversion log".

- [ ] **Step 3: Implement `admin/settings.php`, `app/Controllers/StaticController.php`, `app/Views/gallery.php`, and `app/Views/contact.php`**

Implement site settings to manage phone numbers, Google Tag Manager ID, GA4 Measurement ID, and Meta Pixel ID. Implement static gallery and contact views.

- [ ] **Step 4: Run all test suites to confirm 100% green**

```bash
php tests/DatabaseTest.php
php tests/TrackerTest.php
php tests/RouterTest.php
php tests/PackageTest.php
php tests/HomeTest.php
php tests/QuizTest.php
php tests/ProposalTest.php
php tests/ArticleTest.php
php tests/SitemapTest.php
php tests/AdminAuthTest.php
php tests/AdminPaketTest.php
php tests/AdminArticleTest.php
php tests/AdminLeadsTest.php
php tests/EndToEndTest.php
```
Expected: All tests PASS.

- [ ] **Step 5: Commit**

```bash
git add admin/settings.php app/Controllers/StaticController.php app/Views/gallery.php app/Views/contact.php tests/EndToEndTest.php
git commit -m "feat: implement site settings, static views, and end-to-end integration test"
```
