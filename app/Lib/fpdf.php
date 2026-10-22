<?php
/*******************************************************************************
* FPDF - Free PDF generator in pure PHP                                        *
* Compatible with PHP 8.0+                                                    *
*******************************************************************************/
define('FPDF_VERSION', '1.86');

class FPDF {
    protected int $page = 0;
    protected int $n = 3;
    protected array $offsets = [];
    protected string $buffer = '';
    protected array $pages = [];
    protected int $state = 0;
    protected float $k;
    protected string $DefOrientation = 'P';
    protected string $CurOrientation = 'P';
    protected array $StdPageSizes = [];
    protected array $DefPageSize = [];
    protected array $CurPageSize = [];
    protected float $wPt, $hPt;
    protected float $w, $h;
    protected float $lMargin, $tMargin, $rMargin, $bMargin;
    protected float $x, $y;
    protected float $lasth = 0;
    protected float $LineWidth = 0.567;
    protected array $fonts = [];
    protected string $FontFamily = '';
    protected string $FontStyle = '';
    protected bool $underline = false;
    protected array $CurrentFont = [];
    protected float $FontSizePt = 12;
    protected float $FontSize = 12;
    protected string $DrawColor = '0 G';
    protected string $FillColor = '0 g';
    protected string $TextColor = '0 g';
    protected bool $ColorFlag = false;
    protected float $ws = 0;
    protected bool $AutoPageBreak = true;
    protected float $PageBreakTrigger;
    protected bool $InHeader = false;
    protected bool $InFooter = false;

    public function __construct(string $orientation = 'P', string $unit = 'mm', string $size = 'A4') {
        $this->k = ($unit === 'pt') ? 1 : (($unit === 'mm') ? 72/25.4 : (($unit === 'cm') ? 72/2.54 : 72));
        $this->StdPageSizes = ['a3' => [841.89, 1190.55], 'a4' => [595.28, 841.89], 'a5' => [420.94, 595.28], 'letter' => [612, 792], 'legal' => [612, 1008]];
        $size = strtolower($size);
        $this->DefPageSize = $this->StdPageSizes[$size] ?? $this->StdPageSizes['a4'];
        $this->CurPageSize = $this->DefPageSize;
        $this->DefOrientation = strtoupper($orientation);
        $this->CurOrientation = $this->DefOrientation;
        if ($this->DefOrientation === 'P') {
            $this->wPt = $this->DefPageSize[0];
            $this->hPt = $this->DefPageSize[1];
        } else {
            $this->wPt = $this->DefPageSize[1];
            $this->hPt = $this->DefPageSize[0];
        }
        $this->w = $this->wPt / $this->k;
        $this->h = $this->hPt / $this->k;
        $margin = 28.35 / $this->k;
        $this->SetMargins($margin, $margin);
        $this->SetAutoPageBreak(true, 2 * $margin);
        $this->SetFont('Arial');
    }

    public function SetMargins(float $left, float $top, ?float $right = null): void {
        $this->lMargin = $left;
        $this->tMargin = $top;
        $this->rMargin = ($right === null) ? $left : $right;
    }

    public function SetAutoPageBreak(bool $auto, float $margin = 0): void {
        $this->AutoPageBreak = $auto;
        $this->bMargin = $margin;
        $this->PageBreakTrigger = $this->h - $margin;
    }

    public function AddPage(string $orientation = '', string $size = ''): void {
        if ($this->state === 0) $this->Open();
        $family = $this->FontFamily;
        $style = $this->FontStyle . ($this->underline ? 'U' : '');
        $fontsize = $this->FontSizePt;
        $lw = $this->LineWidth;
        $dc = $this->DrawColor;
        $fc = $this->FillColor;
        $tc = $this->TextColor;
        $cf = $this->ColorFlag;

        if ($this->page > 0) {
            $this->pages[$this->page] = $this->buffer;
            $this->buffer = '';
        }

        $this->page++;
        $this->pages[$this->page] = '';
        $this->x = $this->lMargin;
        $this->y = $this->tMargin;

        if (!empty($family)) $this->SetFont($family, $style, $fontsize);
        if ($lw !== $this->LineWidth) $this->SetLineWidth($lw);
        if ($dc !== '0 G') $this->_out($dc);
        if ($fc !== '0 g') $this->_out($fc);
        if ($tc !== '0 g') $this->_out($tc);
        $this->ColorFlag = $cf;
    }

    public function Open(): void {
        $this->state = 1;
    }

    public function SetDrawColor(int $r, ?int $g = null, ?int $b = null): void {
        if (($r === 0 && $g === 0 && $b === 0) || $g === null) {
            $this->DrawColor = sprintf('%.3F G', $r / 255);
        } else {
            $this->DrawColor = sprintf('%.3F %.3F %.3F RG', $r / 255, $g / 255, $b / 255);
        }
        if ($this->page > 0) $this->_out($this->DrawColor);
    }

    public function SetFillColor(int $r, ?int $g = null, ?int $b = null): void {
        if (($r === 0 && $g === 0 && $b === 0) || $g === null) {
            $this->FillColor = sprintf('%.3F g', $r / 255);
        } else {
            $this->FillColor = sprintf('%.3F %.3F %.3F rg', $r / 255, $g / 255, $b / 255);
        }
        $this->ColorFlag = ($this->FillColor !== '0 g');
        if ($this->page > 0) $this->_out($this->FillColor);
    }

    public function SetTextColor(int $r, ?int $g = null, ?int $b = null): void {
        if (($r === 0 && $g === 0 && $b === 0) || $g === null) {
            $this->TextColor = sprintf('%.3F g', $r / 255);
        } else {
            $this->TextColor = sprintf('%.3F %.3F %.3F rg', $r / 255, $g / 255, $b / 255);
        }
        $this->ColorFlag = ($this->FillColor !== '0 g');
    }

    public function SetLineWidth(float $width): void {
        $this->LineWidth = $width;
        if ($this->page > 0) $this->_out(sprintf('%.2F w', $width * $this->k));
    }

    public function Line(float $x1, float $y1, float $x2, float $y2): void {
        $this->_out(sprintf('%.2F %.2F m %.2F %.2F l S', $x1 * $this->k, ($this->h - $y1) * $this->k, $x2 * $this->k, ($this->h - $y2) * $this->k));
    }

    public function SetFont(string $family, string $style = '', float $size = 0): void {
        if ($family === '') $family = $this->FontFamily;
        else $family = strtolower($family);
        if ($family === 'arial') $family = 'helvetica';
        $style = strtoupper($style);
        if (str_contains($style, 'U')) {
            $this->underline = true;
            $style = str_replace('U', '', $style);
        } else {
            $this->underline = false;
        }
        if ($style === 'IB') $style = 'BI';
        if ($size === 0.0) $size = $this->FontSizePt;

        $this->FontFamily = $family;
        $this->FontStyle = $style;
        $this->FontSizePt = $size;
        $this->FontSize = $size / $this->k;

        // Map to standard Type1 PascalCase PostScript names
        $baseName = 'Helvetica';
        if ($family === 'times') {
            $baseName = 'Times-Roman';
            if ($style === 'B') $baseName = 'Times-Bold';
            elseif ($style === 'I') $baseName = 'Times-Italic';
            elseif ($style === 'BI') $baseName = 'Times-BoldItalic';
        } elseif ($family === 'courier') {
            $baseName = 'Courier';
            if ($style === 'B') $baseName = 'Courier-Bold';
            elseif ($style === 'I') $baseName = 'Courier-Oblique';
            elseif ($style === 'BI') $baseName = 'Courier-BoldOblique';
        } else {
            // Helvetica / Arial
            $baseName = 'Helvetica';
            if ($style === 'B') $baseName = 'Helvetica-Bold';
            elseif ($style === 'I') $baseName = 'Helvetica-Oblique';
            elseif ($style === 'BI') $baseName = 'Helvetica-BoldOblique';
        }

        $fontkey = $family . $style;
        if (!isset($this->fonts[$fontkey])) {
            $this->fonts[$fontkey] = ['i' => count($this->fonts) + 1, 'type' => 'core', 'name' => $baseName];
        }
        $this->CurrentFont = $this->fonts[$fontkey];
        if ($this->page > 0) {
            $this->_out(sprintf('BT /F%d %.2F Tf ET', $this->CurrentFont['i'], $this->FontSizePt));
        }
    }

    public function Cell(float $w, float $h = 0, string $txt = '', $border = 0, int $ln = 0, string $align = '', bool $fill = false): void {
        $k = $this->k;
        if ($this->y + $h > $this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AutoPageBreak) {
            $x = $this->x;
            $this->AddPage($this->CurOrientation);
            $this->x = $x;
        }
        if ($w === 0.0) $w = $this->w - $this->rMargin - $this->x;
        $s = '';
        if ($fill || $border == 1) {
            $op = ($fill) ? ($border == 1 ? 'B' : 'f') : 'S';
            $s .= sprintf('%.2F %.2F %.2F %.2F re %s ', $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
        }
        if ($txt !== '') {
            $width = strlen($txt) * ($this->FontSizePt * 0.55);
            if ($align === 'R') $dx = $w - ($width / $k) - 2;
            elseif ($align === 'C') $dx = ($w - ($width / $k)) / 2;
            else $dx = 2;
            if ($this->ColorFlag) $s .= 'q ' . $this->TextColor . ' ';
            $txt2 = str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $txt);
            $s .= sprintf('BT %.2F %.2F Td (%s) Tj ET', ($this->x + $dx) * $k, ($this->h - ($this->y + 0.5 * $h + 0.3 * $this->FontSize)) * $k, $txt2);
            if ($this->ColorFlag) $s .= ' Q';
        }
        if ($s) $this->_out($s);
        $this->lasth = $h;
        if ($ln > 0) {
            $this->y += $h;
            if ($ln === 1) $this->x = $this->lMargin;
        } else {
            $this->x += $w;
        }
    }

    public function MultiCell(float $w, float $h, string $txt, $border = 0, string $align = 'J', bool $fill = false): void {
        $lines = explode("\n", str_replace("\r", '', $txt));
        foreach ($lines as $line) {
            $this->Cell($w, $h, $line, $border, 1, $align, $fill);
        }
    }

    public function Ln(?float $h = null): void {
        $this->x = $this->lMargin;
        $this->y += ($h === null) ? $this->lasth : $h;
    }

    protected function _out(string $s): void {
        if ($this->state === 2) {
            $this->pages[$this->page] .= $s . "\n";
        } elseif ($this->state === 1) {
            $this->_put($s);
        } elseif ($this->state === 0) {
            $this->Open();
            $this->_out($s);
        }
    }

    protected function _put(string $s): void {
        $this->buffer .= $s . "\n";
    }

    public function Output(string $dest = '', string $name = ''): string {
        if ($this->state < 3) {
            $this->Close();
        }
        return $this->buffer;
    }

    public function Close(): void {
        if ($this->state === 3) return;
        if ($this->page === 0) $this->AddPage();
        $this->pages[$this->page] = $this->buffer;
        $this->buffer = '';
        $this->state = 2;

        $this->_put('%PDF-1.4');
        $nb = $this->page;

        // Object 1: Catalog
        $this->offsets[1] = strlen($this->buffer);
        $this->_put('1 0 obj');
        $this->_put('<< /Type /Catalog /Pages 2 0 R >>');
        $this->_put('endobj');

        // Object 2: Pages root
        $this->offsets[2] = strlen($this->buffer);
        $this->_put('2 0 obj');
        $this->_put('<< /Type /Pages');
        $kids = '/Kids [';
        for ($i = 1; $i <= $nb; $i++) {
            $kids .= (3 + $i) . ' 0 R ';
        }
        $this->_put($kids . ']');
        $this->_put("/Count $nb");
        $this->_put(sprintf('/MediaBox [0 0 %.2F %.2F]', $this->DefPageSize[0], $this->DefPageSize[1]));
        $this->_put('>>');
        $this->_put('endobj');

        // Object 3: Resources
        $this->offsets[3] = strlen($this->buffer);
        $this->_put('3 0 obj');
        $this->_put('<< /ProcSet [/PDF /Text /ImageB /ImageC /ImageI]');
        $this->_put('/Font <<');
        foreach ($this->fonts as $k => $font) {
            $this->_put('/F' . $font['i'] . ' << /Type /Font /Subtype /Type1 /BaseFont /' . $font['name'] . ' >>');
        }
        $this->_put('>> >>');
        $this->_put('endobj');

        // Page descriptors: Object 4 to (3 + nb)
        for ($n = 1; $n <= $nb; $n++) {
            $pageObjId = 3 + $n;
            $contentObjId = 3 + $nb + $n;
            $this->offsets[$pageObjId] = strlen($this->buffer);
            $this->_put("$pageObjId 0 obj");
            $this->_put('<< /Type /Page /Parent 2 0 R');
            $this->_put('/Resources 3 0 R');
            $this->_put("/Contents $contentObjId 0 R >>");
            $this->_put('endobj');
        }

        // Page content streams: Object (3 + nb + 1) to (3 + 2*nb)
        for ($n = 1; $n <= $nb; $n++) {
            $contentObjId = 3 + $nb + $n;
            $p = $this->pages[$n];
            $this->offsets[$contentObjId] = strlen($this->buffer);
            $this->_put("$contentObjId 0 obj");
            $this->_put('<< /Length ' . strlen($p) . ' >>');
            $this->_put('stream');
            $this->_put($p);
            $this->_put('endstream');
            $this->_put('endobj');
        }

        $totalObjects = 3 + ($nb * 2);

        // Cross-ref
        $o = strlen($this->buffer);
        $this->_put('xref');
        $this->_put('0 ' . ($totalObjects + 1));
        $this->_put('0000000000 65535 f ');
        for ($i = 1; $i <= $totalObjects; $i++) {
            $this->_put(sprintf('%010d 00000 n ', $this->offsets[$i] ?? 0));
        }

        // Trailer
        $this->_put('trailer');
        $this->_put('<< /Size ' . ($totalObjects + 1) . ' /Root 1 0 R >>');
        $this->_put('startxref');
        $this->_put((string)$o);
        $this->_put('%%EOF');
        $this->state = 3;
    }
}
