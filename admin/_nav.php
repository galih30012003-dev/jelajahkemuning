<?php
/**
 * Shared Admin Navigation Bar
 * Expects $activePage to be set by the including page (e.g. 'index', 'paket', 'artikel', 'galeri', 'leads', 'settings')
 */
$activePage = $activePage ?? basename($_SERVER['PHP_SELF'], '.php');
?>
<header class="admin-topbar">
    <div class="admin-topbar-inner">
        <a href="/admin/index.php" class="admin-brand">
            <span class="admin-brand-dot"></span>
            <span>Jelajah Kemuning</span>
            <span class="admin-brand-badge">Admin</span>
        </a>
        <nav class="admin-nav" aria-label="Menu Pengelola">
            <a href="/admin/index.php" class="admin-nav-link <?= $activePage === 'index' ? 'is-active' : '' ?>">Dashboard</a>
            <a href="/admin/paket.php" class="admin-nav-link <?= $activePage === 'paket' ? 'is-active' : '' ?>">Paket &amp; Harga</a>
            <a href="/admin/artikel.php" class="admin-nav-link <?= $activePage === 'artikel' ? 'is-active' : '' ?>">Artikel SEO</a>
            <a href="/admin/galeri.php" class="admin-nav-link <?= $activePage === 'galeri' ? 'is-active' : '' ?>">Galeri</a>
            <a href="/admin/leads.php" class="admin-nav-link <?= $activePage === 'leads' ? 'is-active' : '' ?>">Leads &amp; GCLID</a>
            <a href="/admin/settings.php" class="admin-nav-link <?= $activePage === 'settings' ? 'is-active' : '' ?>">Pengaturan</a>
            <span class="admin-nav-sep" aria-hidden="true"></span>
            <a href="/" target="_blank" class="admin-nav-link admin-nav-ext">Lihat Web ↗</a>
            <a href="/admin/logout.php" class="admin-nav-link admin-nav-logout">Keluar</a>
        </nav>
    </div>
</header>
