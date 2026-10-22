<?php
require_once __DIR__ . '/auth.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Auth::validateCsrf($_POST['csrf'] ?? '')) {
        $error = 'Validasi sesi (CSRF) gagal. Silakan reload halaman.';
    } else {
        $user = trim($_POST['username'] ?? '');
        $pass = trim($_POST['password'] ?? '');
        if (Auth::login($user, $pass)) {
            header('Location: /admin/index.php');
            exit;
        } else {
            $error = 'Username atau password salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pengelola - Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:#F3F4F6; display:flex; align-items:center; justify-content:center; min-height:100vh;">
<div style="background:#fff; border:1px solid #E5E7EB; border-radius:12px; padding:32px; width:100%; max-width:400px; box-shadow:0 10px 25px rgba(0,0,0,0.05);">
    <h2 style="font-size:1.5rem; font-weight:800; color:var(--primary); text-align:center;">Admin Jelajah Kemuning</h2>
    <p style="text-align:center; color:#6B7280; font-size:13px; margin:4px 0 20px;">Masuk untuk mengelola website & lead</p>

    <?php if ($error): ?>
    <div style="background:#FEE2E2; color:#B91C1C; padding:10px; border-radius:6px; font-size:13px; margin-bottom:16px;">
        <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
        <div style="margin-bottom:14px;">
            <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Username</label>
            <input type="text" name="username" required style="width:100%; padding:10px; border:1px solid #D1D5DB; border-radius:6px;">
        </div>
        <div style="margin-bottom:20px;">
            <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Password</label>
            <input type="password" name="password" required style="width:100%; padding:10px; border:1px solid #D1D5DB; border-radius:6px;">
        </div>
        <button type="submit" class="btn-accent" style="width:100%; justify-content:center;">Masuk ke Dashboard</button>
    </form>
</div>
</body>
</html>
