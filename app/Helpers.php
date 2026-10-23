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

    public static function generateUniqueSlug(PDO $db, string $table, string $titleOrSlug, ?int $ignoreId = null): string {
        $clean = strtolower($titleOrSlug);
        $slug = trim(preg_replace('/[^a-z0-9-]+/', '-', $clean), '-');
        if (empty($slug)) $slug = 'item';

        $baseSlug = $slug;
        $counter = 1;

        while (true) {
            $testSlug = ($counter === 1) ? $baseSlug : $baseSlug . '-' . $counter;
            $sql = "SELECT id FROM $table WHERE slug = :s";
            if ($ignoreId !== null) {
                $sql .= " AND id != " . (int)$ignoreId;
            }
            $sql .= " LIMIT 1";

            $stmt = $db->prepare($sql);
            $stmt->execute([':s' => $testSlug]);
            if (!$stmt->fetch()) {
                return $testSlug;
            }
            $counter++;
        }
    }

    public static function baseUrl(): string {
        return rtrim(defined('BASE_URL') ? BASE_URL : 'https://jelajahkemuning.com', '/');
    }

    public static function canonicalUrl(string $path = ''): string {
        $base = self::baseUrl();
        if ($path === '') {
            $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        }
        $cleanPath = '/' . trim($path, '/');
        if ($cleanPath !== '/') {
            $cleanPath .= '/';
        }
        return $base . $cleanPath;
    }

    public static function buildTravelAgencySchema(): array {
        $base = self::baseUrl();
        $nib = self::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458');
        $phone = self::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6285171001566');
        $email = self::getSetting('email', 'info@jelajahkemuning.com');

        return [
            '@context' => 'https://schema.org',
            '@type' => 'TravelAgency',
            '@id' => $base . '/#travelagency',
            'name' => defined('CV_NAME') ? CV_NAME : 'CV Jelajah Kemuning',
            'alternateName' => ['Jelajah Kemuning', 'Jelajah Kemuning Tour & Outbound', 'Kemuning Adventure'],
            'url' => $base . '/',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => $base . '/assets/uploads/cropped-logo-jelajah-kemuningg.png',
                'width' => 512,
                'height' => 512
            ],
            'image' => $base . '/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp',
            'description' => 'Operator resmi wisata Kemuning Karanganyar: Jeep Adventure 4x4, Outbound Gathering Kantor, River Tubing, dan Sewa Villa berizin NIB dan berasuransi.',
            'telephone' => '+' . preg_replace('/[^0-9]/', '', $phone),
            'email' => $email,
            'priceRange' => 'Rp 45.000 - Rp 750.000',
            'currenciesAccepted' => 'IDR',
            'paymentAccepted' => 'Cash, Bank Transfer',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Terminal Wisata Kemuning, Kec. Ngargoyoso',
                'addressLocality' => 'Karanganyar',
                'addressRegion' => 'Jawa Tengah',
                'postalCode' => '57793',
                'addressCountry' => 'ID'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => -7.5873,
                'longitude' => 111.1492
            ],
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'opens' => '05:00',
                'closes' => '18:00'
            ],
            'identifier' => [
                '@type' => 'PropertyValue',
                'name' => 'NIB',
                'value' => $nib
            ],
            'sameAs' => [
                'https://instagram.com/jelajahkemuning',
                'https://tiktok.com/@jelajahkemuning'
            ]
        ];
    }

    public static function buildFaqSchema(array $faqs): array {
        $entities = [];
        foreach ($faqs as $faq) {
            if (empty($faq['q']) || empty($faq['a'])) continue;
            $entities[] = [
                '@type' => 'Question',
                'name' => strip_tags($faq['q']),
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($faq['a'])
                ]
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities
        ];
    }

    public static function buildBreadcrumbSchema(array $crumbs): array {
        $base = self::baseUrl();
        $itemList = [];
        $pos = 1;
        foreach ($crumbs as $name => $path) {
            $url = str_starts_with($path, 'http') ? $path : $base . '/' . ltrim($path, '/');
            $itemList[] = [
                '@type' => 'ListItem',
                'position' => $pos++,
                'name' => $name,
                'item' => $url
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemList
        ];
    }

    public static function buildArticleSchema(array $article, string $canonicalUrl): array {
        $base = self::baseUrl();
        $publishedAt = date('c', strtotime($article['published_at'] ?? 'now'));
        $thumb = !empty($article['thumbnail']) ? (str_starts_with($article['thumbnail'], 'http') ? $article['thumbnail'] : $base . '/' . ltrim($article['thumbnail'], '/')) : $base . '/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp';

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $canonicalUrl
            ],
            'headline' => $article['title'] ?? '',
            'description' => $article['meta_description'] ?? substr(strip_tags($article['content'] ?? ''), 0, 160),
            'image' => $thumb,
            'datePublished' => $publishedAt,
            'dateModified' => $publishedAt,
            'author' => [
                '@type' => 'Organization',
                'name' => 'Tim Jelajah Kemuning',
                'url' => $base . '/'
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'CV Jelajah Kemuning',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $base . '/assets/uploads/cropped-logo-jelajah-kemuningg.png'
                ]
            ]
        ];
    }

    public static function buildPackageListSchema(array $packages, string $categoryName, string $canonicalUrl): array {
        $base = self::baseUrl();
        $items = [];
        $pos = 1;

        foreach ($packages as $pkg) {
            $thumb = !empty($pkg['thumbnail']) ? (str_starts_with($pkg['thumbnail'], 'http') ? $pkg['thumbnail'] : $base . '/' . ltrim($pkg['thumbnail'], '/')) : $base . '/assets/uploads/Foto-paket-jeep-adventure-kemuning.webp';
            $items[] = [
                '@type' => 'ListItem',
                'position' => $pos++,
                'item' => [
                    '@type' => 'TouristTrip',
                    'name' => $pkg['name'],
                    'description' => !empty($pkg['summary']) ? $pkg['summary'] : ('Paket ' . $pkg['name'] . ' di Kemuning Karanganyar.'),
                    'image' => $thumb,
                    'touristType' => ['Family', 'Group', 'Corporate'],
                    'provider' => [
                        '@type' => 'TravelAgency',
                        'name' => 'CV Jelajah Kemuning',
                        'url' => $base . '/'
                    ],
                    'offers' => [
                        '@type' => 'Offer',
                        'price' => (int)$pkg['price'],
                        'priceCurrency' => 'IDR',
                        'availability' => 'https://schema.org/InStock',
                        'validFrom' => '2026-01-01',
                        'url' => $canonicalUrl
                    ]
                ]
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Daftar Paket ' . $categoryName,
            'url' => $canonicalUrl,
            'numberOfItems' => count($items),
            'itemListElement' => $items
        ];
    }
}
