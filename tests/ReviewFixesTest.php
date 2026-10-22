<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/Helpers.php';
require_once __DIR__ . '/../app/Lib/fpdf.php';
require_once __DIR__ . '/../admin/auth.php';

it('generates standard PDF structure without object ID collisions', function () {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Test Document', 0, 1);
    $output = $pdf->Output('S');

    // Object 1 must be Catalog
    assertTrue(str_contains($output, "1 0 obj\n<< /Type /Catalog"), 'Object 1 must be Catalog');
    // Object 2 must be Pages
    assertTrue(str_contains($output, "2 0 obj\n<< /Type /Pages"), 'Object 2 must be Pages');
    // Object 3 must be Resources
    assertTrue(str_contains($output, "3 0 obj\n<< /ProcSet"), 'Object 3 must be Resources');
    // BaseFont must be PascalCase
    assertTrue(str_contains($output, '/BaseFont /Helvetica-Bold'), 'BaseFont must be Helvetica-Bold');
});

it('generates unique slugs when duplicates exist in database', function () {
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE TABLE articles (id INTEGER PRIMARY KEY AUTOINCREMENT, slug TEXT UNIQUE);");
    $pdo->exec("INSERT INTO articles (slug) VALUES ('tips-kemuning'), ('tips-kemuning-2');");

    $slug = Helpers::generateUniqueSlug($pdo, 'articles', 'Tips Kemuning!');
    assertEquals('tips-kemuning-3', $slug, 'Slug should increment to -3');
});

it('blocks login after multiple failed attempts (rate limiting)', function () {
    $_SESSION['login_attempts'] = 5;
    $_SESSION['last_attempt_time'] = time();

    assertTrue(Auth::isRateLimited(), 'Should be rate limited after 5 failed attempts');
});
