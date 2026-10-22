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
}
