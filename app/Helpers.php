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
