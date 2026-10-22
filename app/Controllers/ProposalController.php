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
        // Sanitize for PDF encoding (windows-1252 to avoid breaks on special characters)
        $inst = mb_convert_encoding($data['institution'] ?? 'Umum', 'ISO-8859-1', 'UTF-8');
        $pic = mb_convert_encoding($data['pic_name'] ?? 'Bapak/Ibu', 'ISO-8859-1', 'UTF-8');
        $pkg = mb_convert_encoding($data['package_name'] ?? 'Paket Wisata Kemuning', 'ISO-8859-1', 'UTF-8');
        $pax = (int)($data['participants'] ?? 20);
        $date = mb_convert_encoding($data['trip_date'] ?? date('d-m-Y'), 'ISO-8859-1', 'UTF-8');

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
