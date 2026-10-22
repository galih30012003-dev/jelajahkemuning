<div class="container" style="padding:60px 16px;">
    <h1 style="font-size:2rem; font-weight:800; text-align:center; margin-bottom:8px;">Artikel & Tips Wisata Kemuning</h1>
    <p style="text-align:center; color:var(--text-muted); margin-bottom:40px;">Panduan liburan seru, rekomendasi rute offroad, dan kuliner khas Kemuning.</p>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
        <?php foreach ($articles as $art): ?>
        <article class="card-package" style="padding:20px;">
            <span style="font-size:12px; color:var(--primary-light); font-weight:600;"><?= date('d F Y', strtotime($art['published_at'])) ?></span>
            <h2 style="font-size:1.25rem; font-weight:700; margin:8px 0;"><a href="/artikel/<?= $art['slug'] ?>/"><?= Helpers::sanitize($art['title']) ?></a></h2>
            <p style="color:var(--text-muted); font-size:14px; margin-bottom:16px;"><?= substr(strip_tags($art['content']), 0, 120) ?>...</p>
            <a href="/artikel/<?= $art['slug'] ?>/" style="color:var(--primary); font-weight:700; font-size:14px;">Baca Selengkapnya →</a>
        </article>
        <?php endforeach; ?>
    </div>
</div>
