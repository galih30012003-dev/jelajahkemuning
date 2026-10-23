<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../Tracker.php';
require_once __DIR__ . '/../Helpers.php';
require_once __DIR__ . '/../Lib/fpdf.php';

class ProposalController {
    public function index(): void {
        $pageTitle = 'Download Proposal Penawaran Resmi - CV Jelajah Kemuning';
        $pageDesc = 'Buat surat penawaran dan proposal resmi berkop CV Jelajah Kemuning untuk rombongan kantor, dinas, atau komunitas secara otomatis.';
        $pageCanonical = Helpers::canonicalUrl('/proposal/');
        $pageSchemas = [
            Helpers::buildBreadcrumbSchema([
                'Beranda' => '/',
                'Proposal Wisata' => '/proposal/'
            ])
        ];

        try {
            $db = Database::getInstance()->getConnection();
            $packages = $db->query("SELECT p.*, c.name as category_name FROM packages p JOIN categories c ON p.category_id = c.id WHERE p.is_active = 1 ORDER BY p.sort_order ASC, p.price ASC")->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            $packages = [];
        }

        require __DIR__ . '/../Views/layouts/header.php';
        require __DIR__ . '/../Views/proposal-form.php';
        require __DIR__ . '/../Views/layouts/footer.php';
    }

    private function toPdf(string $str): string {
        return mb_convert_encoding($str, 'ISO-8859-1', 'UTF-8');
    }

    private function formatIndoDate(string $dateStr): string {
        $timestamp = strtotime($dateStr);
        if (!$timestamp) $timestamp = time();
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        return date('d', $timestamp) . ' ' . ($bulan[(int)date('n', $timestamp)] ?? date('F', $timestamp)) . ' ' . date('Y', $timestamp);
    }

    public function buildPdfBuffer(array $data): string {
        $rawInst = trim($data['institution'] ?? 'Umum');
        $rawPic = trim($data['pic_name'] ?? 'Bapak/Ibu');
        $rawPkg = trim($data['package_name'] ?? 'Paket Wisata Kemuning');
        $pax = max(1, (int)($data['participants'] ?? 20));
        $rawDate = trim($data['trip_date'] ?? date('Y-m-d'));

        // Log lead
        try {
            Tracker::logLead('proposal_pdf', [
                'institution' => $rawInst,
                'lead_name' => $rawPic,
                'lead_phone' => $data['phone'] ?? '',
                'package_name' => $rawPkg,
                'participants' => $pax
            ]);
        } catch (\Throwable $e) {
            // Non-fatal if tracker fails
        }

        // Fetch package details from database
        $packageRecord = null;
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT * FROM packages WHERE is_active = 1 AND (name = :pkg OR :pkg LIKE '%' || name || '%') LIMIT 1");
            $stmt->execute([':pkg' => $rawPkg]);
            $packageRecord = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            $packageRecord = null;
        }

        // Determine price, type, and inclusions
        if ($packageRecord) {
            $unitPrice = (int)$packageRecord['price'];
            $priceType = $packageRecord['price_type'];
            $inclusionsRaw = $packageRecord['inclusions'] ?? '';
            $displayName = $packageRecord['name'];
        } else {
            // Fallback estimation
            if (preg_match('/(\d{2,3})[\.,](\d{3})/', $rawPkg, $m)) {
                $unitPrice = (int)($m[1] . $m[2]);
            } else {
                $unitPrice = 185000;
            }
            $priceType = (stripos($rawPkg, 'armada') !== false || stripos($rawPkg, 'jeep special') !== false) ? 'per_armada' : 'per_orang';
            $inclusionsRaw = '';
            $displayName = $rawPkg;
        }

        // Financial Calculation
        if ($priceType === 'per_armada') {
            $armadaCount = (int)ceil($pax / 4);
            $qty = $armadaCount;
            $qtyLabel = $armadaCount . ' Armada (Jeep)';
            $unitLabel = 'Rp ' . number_format($unitPrice, 0, ',', '.') . ' / armada';
            $totalPrice = $unitPrice * $armadaCount;
        } else {
            $qty = $pax;
            $qtyLabel = $pax . ' Orang';
            $unitLabel = 'Rp ' . number_format($unitPrice, 0, ',', '.') . ' / org';
            $totalPrice = $unitPrice * $pax;
        }

        // Parse facilities
        $inclusionsList = [];
        if (!empty($inclusionsRaw)) {
            $formatted = str_replace(['\r\n', '\r', '\n'], "\n", $inclusionsRaw);
            $lines = explode("\n", str_replace(["\r\n", "\r"], "\n", $formatted));
            foreach ($lines as $ln) {
                $clean = trim($ln, "-*• \t");
                if ($clean !== '') $inclusionsList[] = $clean;
            }
        }
        if (empty($inclusionsList)) {
            $inclusionsList = [
                'Armada Jeep 4x4 / Safety Equipment sesuai paket',
                'Makan Siang Prasmanan Khas Tradisional Kemuning',
                'Welcome Drink & Snack Rebusan saat kedatangan',
                'Asuransi Jiwa & Medis Wisata Resmi untuk seluruh peserta',
                'Fasilitas Ruang Transit, Pendopo / Aula & Toilet Bersih',
                'Dokumentasi Foto & Video Softcopy (Google Drive)',
                'Tiket Retribusi Masuk Semua Destinasi & Parkir Bus'
            ];
        }

        // Settings
        $bankInfo = Helpers::getSetting('bank_info', 'BCA 015-384-9901 a.n CV Jelajah Kemuning');
        $waPhone = Helpers::getSetting('no_wa_1', defined('DEFAULT_WA') ? DEFAULT_WA : '6285171001566');
        $nib = Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458');
        $email = Helpers::getSetting('email', 'info@jelajahkemuning.com');

        // Document Meta
        $seedNum = abs(crc32($rawInst . $rawPic . $pax)) % 900 + 100;
        $nomorSurat = 'JK/PFW/' . date('Ym') . '/' . str_pad((string)$seedNum, 4, '0', STR_PAD_LEFT);
        $tglSurat = $this->formatIndoDate(date('Y-m-d'));
        $tglTrip = $this->formatIndoDate($rawDate);

        // Build PDF
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(15, 11, 15);

        // 1. KOP SURAT
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->SetTextColor(14, 46, 32); // Deep Pine
        $pdf->Cell(180, 6.5, $this->toPdf('CV JELAJAH KEMUNING'), 0, 1, 'C');

        $pdf->SetFont('Arial', 'B', 7.5);
        $pdf->SetTextColor(194, 65, 12); // Terracotta Accent
        $pdf->Cell(180, 4, $this->toPdf('OPERATOR WISATA & OUTBOUND RESMI KEMUNING KARANGANYAR'), 0, 1, 'C');

        $pdf->SetFont('Arial', '', 7.5);
        $pdf->SetTextColor(75, 85, 99);
        $pdf->Cell(180, 3.8, $this->toPdf('Perizinan Berusaha Berbasis Risiko (NIB: ' . $nib . ') | KBLI Pariwisata'), 0, 1, 'C');
        $pdf->Cell(180, 3.8, $this->toPdf('Terminal Wisata Kemuning, Kec. Ngargoyoso, Kab. Karanganyar, Jawa Tengah 57793'), 0, 1, 'C');
        $pdf->Cell(180, 3.8, $this->toPdf('WhatsApp: ' . $waPhone . ' | Website: jelajahkemuning.com | Email: ' . $email), 0, 1, 'C');

        // Double Header Rule
        $pdf->SetDrawColor(14, 46, 32);
        $pdf->SetLineWidth(0.7);
        $pdf->Line(15, 36.5, 195, 36.5);
        $pdf->SetDrawColor(194, 65, 12);
        $pdf->SetLineWidth(0.3);
        $pdf->Line(15, 37.6, 195, 37.6);

        $pdf->Ln(6);

        // 2. METADATA SURAT (2 Kolom)
        $pdf->SetFont('Arial', '', 8.5);
        $pdf->SetTextColor(0, 0, 0);

        // Baris 1
        $pdf->Cell(18, 4.8, $this->toPdf('Nomor'), 0, 0, 'L');
        $pdf->Cell(4, 4.8, ':', 0, 0, 'C');
        $pdf->SetFont('Arial', 'B', 8.5);
        $pdf->Cell(78, 4.8, $this->toPdf($nomorSurat), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 8.5);
        $pdf->Cell(80, 4.8, $this->toPdf('Karanganyar, ' . $tglSurat), 0, 1, 'R');

        // Baris 2
        $pdf->Cell(18, 4.8, $this->toPdf('Lampiran'), 0, 0, 'L');
        $pdf->Cell(4, 4.8, ':', 0, 0, 'C');
        $pdf->Cell(78, 4.8, $this->toPdf('1 (Satu) Berkas Penawaran'), 0, 0, 'L');
        $pdf->Cell(80, 4.8, $this->toPdf('Kepada Yth.'), 0, 1, 'R');

        // Baris 3
        $pdf->Cell(18, 4.8, $this->toPdf('Perihal'), 0, 0, 'L');
        $pdf->Cell(4, 4.8, ':', 0, 0, 'C');
        $pdf->SetFont('Arial', 'B', 8.5);
        $pdf->Cell(78, 4.8, $this->toPdf('Penawaran Paket Wisata & Gathering'), 0, 0, 'L');
        $pdf->Cell(80, 4.8, $this->toPdf($rawPic), 0, 1, 'R');

        // Baris 4
        $pdf->Cell(100, 4.8, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8.5);
        $pdf->Cell(80, 4.8, $this->toPdf($rawInst), 0, 1, 'R');

        $pdf->Ln(3);

        // 3. SURAT PENGANTAR
        $pdf->SetFont('Arial', '', 8.5);
        $pdf->SetTextColor(30, 35, 32);
        $pdf->MultiCell(180, 4.2, $this->toPdf("Dengan hormat,\nBersama surat ini, kami dari CV Jelajah Kemuning bermaksud mengajukan penawaran resmi paket wisata untuk rencana kunjungan pada tanggal " . $tglTrip . " dengan rincian anggaran biaya dan fasilitas sebagai berikut:"));

        $pdf->Ln(3.5);

        // 4. TABEL ESTIMASI BIAYA & INVESTASI
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(14, 46, 32);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetDrawColor(210, 215, 210);
        $pdf->Cell(10, 6.2, 'NO', 1, 0, 'C', true);
        $pdf->Cell(82, 6.2, ' DESKRIPSI PAKET WISATA', 1, 0, 'L', true);
        $pdf->Cell(28, 6.2, 'KUANTITAS', 1, 0, 'C', true);
        $pdf->Cell(30, 6.2, 'BIAYA SATUAN ', 1, 0, 'R', true);
        $pdf->Cell(30, 6.2, 'TOTAL BIAYA ', 1, 1, 'R', true);

        $pdf->SetFont('Arial', '', 8);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(10, 6, '1', 1, 0, 'C');
        $pdf->Cell(82, 6, $this->toPdf(' ' . substr($displayName, 0, 48)), 1, 0, 'L');
        $pdf->Cell(28, 6, $this->toPdf($qtyLabel), 1, 0, 'C');
        $pdf->Cell(30, 6, $this->toPdf($unitLabel . ' '), 1, 0, 'R');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(30, 6, $this->toPdf('Rp ' . number_format($totalPrice, 0, ',', '.') . ' '), 1, 1, 'R');

        // Baris Total
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(240, 243, 240);
        $pdf->Cell(120, 6.2, $this->toPdf(' TOTAL ESTIMASI BIAYA INVESTASI (All-In Termasuk Asuransi)'), 1, 0, 'L', true);
        $pdf->SetTextColor(194, 65, 12);
        $pdf->Cell(60, 6.2, $this->toPdf('Rp ' . number_format($totalPrice, 0, ',', '.') . ' '), 1, 1, 'R', true);

        $pdf->Ln(3.5);

        // 5. FASILITAS TERMASUK (2 Kolom)
        $pdf->SetFont('Arial', 'B', 8.5);
        $pdf->SetTextColor(14, 46, 32);
        $pdf->Cell(180, 4.5, $this->toPdf('FASILITAS & LAYANAN TERMASUK (INCLUSIONS):'), 0, 1, 'L');

        $pdf->SetFont('Arial', '', 7.5);
        $pdf->SetTextColor(40, 45, 42);

        // Take up to 8 top inclusions for crisp 2-column display
        $displayInclusions = array_slice($inclusionsList, 0, 8);
        $half = (int)ceil(count($displayInclusions) / 2);
        for ($i = 0; $i < $half; $i++) {
            $col1 = $displayInclusions[$i] ?? '';
            $col2 = $displayInclusions[$i + $half] ?? '';
            $pdf->Cell(90, 4, $this->toPdf(' [x] ' . substr($col1, 0, 52)), 0, 0, 'L');
            if ($col2 !== '') {
                $pdf->Cell(90, 4, $this->toPdf(' [x] ' . substr($col2, 0, 52)), 0, 1, 'L');
            } else {
                $pdf->Ln(4);
            }
        }

        $pdf->Ln(3.5);

        // 6. SYARAT, KETENTUAN & REKENING RESMI
        $pdf->SetFont('Arial', 'B', 8.5);
        $pdf->SetTextColor(14, 46, 32);
        $pdf->Cell(180, 4.5, $this->toPdf('KETENTUAN RESERVASI & PEMBAYARAN RESMI:'), 0, 1, 'L');

        $pdf->SetFont('Arial', '', 7.5);
        $pdf->SetTextColor(50, 55, 52);
        $pdf->MultiCell(180, 3.6, $this->toPdf("1. Booking jadwal dianggap sah setelah konfirmasi Down Payment (DP) minimal 30% dari total estimasi biaya.\n2. Pelunasan biaya dapat diselesaikan pada hari pelaksanaan trip (cash di kantor transit atau transfer).\n3. Pembayaran resmi hanya ditransfer ke rekening resmi: " . $bankInfo . "\n4. Konfirmasi tanggal, penyesuaian menu makan, atau rute khusus dapat dikoordinasikan langsung via WhatsApp admin."));

        $pdf->Ln(3);

        // 7. PENGESAHAN & TANDA TANGAN
        $pdf->SetFont('Arial', '', 7.5);
        $pdf->SetTextColor(80, 85, 82);
        $pdf->Cell(110, 4, $this->toPdf('Catatan: Dokumen ini sah dan diterbitkan resmi oleh sistem Jelajah Kemuning'), 0, 0, 'L');
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(70, 4, $this->toPdf('Karanganyar, ' . $tglSurat), 0, 1, 'C');

        $pdf->Cell(110, 4, $this->toPdf('Layanan Cepat WhatsApp: ' . $waPhone), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8.5);
        $pdf->Cell(70, 4, $this->toPdf('CV JELAJAH KEMUNING'), 0, 1, 'C');

        $pdf->Ln(11);

        $pdf->Cell(110, 4, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(70, 4, $this->toPdf('( TIM MANAJEMEN OPERASIONAL )'), 0, 1, 'C');

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
