<?php
class QuizController {
    public function match(string $groupType, string $activity, int $people): ?array {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT p.*, c.name as category_name, c.slug as category_slug FROM packages p JOIN categories c ON p.category_id = c.id WHERE p.is_active = 1";

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
