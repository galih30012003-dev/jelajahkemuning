<?php
require_once __DIR__ . '/auth.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (Auth::isRateLimited()) {
        http_response_code(429);
        $error = 'Terlalu banyak percobaan login gagal. Silakan tunggu 15 menit.';
    } elseif (!Auth::validateCsrf($_POST['csrf'] ?? '')) {
        http_response_code(403);
        $error = 'Validasi sesi (CSRF) gagal. Silakan reload halaman.';
    } else {
        $user = trim($_POST['username'] ?? '');
        $pass = trim($_POST['password'] ?? '');
        if (Auth::login($user, $pass)) {
            header('Location: /admin/index.php');
            exit;
        } else {
            http_response_code(401);
            $error = 'Username atau password salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola - Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:var(--paper); display:flex; align-items:center; justify-content:center; min-height:100vh; padding:20px;">
<div style="background:#fff; border:1px solid var(--rule); border-top:3px solid var(--ink); border-radius:var(--radius-sm); padding:36px 32px; width:100%; max-width:400px;">
    <div style="text-align:center; margin-bottom:24px;">
        <div style="display:inline-flex; align-items:center; gap:8px; margin-bottom:8px;">
            <span style="width:8px; height:8px; background:var(--accent); display:inline-block;"></span>
            <span style="font-family:var(--font-mono); font-size:10px; letter-spacing:0.14em; text-transform:uppercase; color:var(--ink-faint);">Portal Pengelola</span>
        </div>
        <h1 style="font-family:var(--font-display); font-size:1.6rem; font-weight:800; color:var(--ink); line-height:1.15; letter-spacing:-0.03em; margin:0 0 6px;">Jelajah Kemuning</h1>
        <p style="color:var(--ink-muted); font-size:13px; margin:0;">Masuk untuk mengelola website &amp; leads</p>
    </div>

    <?php if ($error): ?>
    <div style="background:#FEF2F2; color:#B91C1C; border-left:2px solid #EF4444; padding:10px 12px; font-size:12.5px; margin-bottom:18px;">
        <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
        <div class="field" style="margin-bottom:18px;">
            <label for="adm-user" style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Username</label>
            <input type="text" id="adm-user" name="username" required autocomplete="username" class="qf-input on-paper" style="width:100%;">
        </div>
        <div class="field" style="margin-bottom:24px;">
            <label for="adm-pass" style="display:block; font-family:var(--font-mono); font-size:10px; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; color:var(--ink-faint); margin-bottom:6px;">Password</label>
            <input type="password" id="adm-pass" name="password" required autocomplete="current-password" class="qf-input on-paper" style="width:100%;">
        </div>
        <button type="submit" class="btn btn-accent" style="width:100%; justify-content:center; padding:12px;">Masuk ke Dashboard</button>
    </form>
</div>
</body>
</html>
