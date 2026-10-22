<div class="container" style="padding:60px 16px;">
    <h1 style="font-size:2rem; font-weight:800; text-align:center; margin-bottom:8px;">Galeri Dokumentasi Trip Jelajah Kemuning</h1>
    <p style="text-align:center; color:var(--text-muted); margin-bottom:40px;">Dokumentasi asli perjalanan seru rombongan kantor, keluarga, dan komunitas bersama kami.</p>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
        <?php if (empty($galleries)): ?>
        <div class="card-package" style="padding:24px; text-align:center; grid-column:1/-1;">
            <p style="color:var(--text-muted);">Foto dokumentasi terbaru sedang disinkronkan.</p>
        </div>
        <?php else: foreach ($galleries as $gal): ?>
        <div class="card-package" style="overflow:hidden;">
            <img src="<?= htmlspecialchars($gal['image_url']) ?>" alt="<?= htmlspecialchars($gal['title']) ?>" style="width:100%; height:200px; object-fit:cover; display:block;">
            <div style="padding:16px;">
                <h3 style="font-size:15px; font-weight:700;"><?= htmlspecialchars($gal['title']) ?></h3>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</div>
