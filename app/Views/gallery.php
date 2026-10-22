<div class="hero-wrapper" style="padding:54px 0;">
    <div class="container" style="text-align:center;">
        <span class="badge-glass">DOKUMENTASI FOTO TRIP ASLI</span>
        <h1 style="font-size:clamp(2rem, 3.8vw, 3rem); font-weight:900; margin:12px 0 8px; letter-spacing:-0.02em;">
            Galeri Dokumentasi Wisata Kemuning
        </h1>
        <p style="max-width:680px; margin:0 auto; opacity:0.92; font-size:15px; line-height:1.6;">
            Koleksi foto asli keseruan rombongan kantor, dinas, komunitas, dan keluarga yang telah berlibur bersama CV Jelajah Kemuning. Klik foto untuk memperbesar.
        </p>
    </div>
</div>

<div class="container" style="padding:54px 20px;">
    <div class="gallery-grid">
        <?php if (empty($galleries)): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:32px; text-align:center; grid-column:1/-1; color:var(--text-muted);">
            Foto dokumentasi terbaru sedang disinkronkan.
        </div>
        <?php else: foreach ($galleries as $gal): ?>
        <div class="gallery-item">
            <img src="<?= htmlspecialchars($gal['image_url']) ?>" alt="<?= htmlspecialchars($gal['title']) ?>" loading="lazy">
            <div class="gallery-overlay">
                <span class="gallery-tag"><?= htmlspecialchars($gal['category_tag']) ?></span>
                <span class="gallery-title"><?= htmlspecialchars($gal['title']) ?></span>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</div>
