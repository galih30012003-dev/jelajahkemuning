<section class="hero-section" style="padding:48px 0 56px;">
    <div class="container" style="text-align:center; max-width:740px;">
        <div class="hero-eyebrow">
            <span>Dokumentasi Asli Lapangan</span>
        </div>
        <h1 class="hero-h1" style="margin-bottom:12px;">
            Galeri Dokumentasi Wisata Kemuning
        </h1>
        <p class="hero-lead" style="margin:0 auto;">
            Koleksi foto asli keseruan rombongan kantor, dinas, komunitas, dan keluarga yang telah berlibur bersama CV Jelajah Kemuning. Klik foto untuk memperbesar.
        </p>
    </div>
</section>

<div class="container" style="padding:56px 24px;">
    <div class="gallery-grid">
        <?php if (empty($galleries)): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:32px; text-align:center; grid-column:1/-1; color:var(--text-muted);">
            Foto dokumentasi terbaru sedang disinkronkan.
        </div>
        <?php else: foreach ($galleries as $gal): ?>
        <div class="gallery-item">
            <img src="<?= htmlspecialchars($gal['image_url']) ?>" alt="<?= htmlspecialchars($gal['title']) ?>" loading="lazy">
            <div class="gallery-caption"><?= htmlspecialchars($gal['title']) ?></div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</div>
