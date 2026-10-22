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
