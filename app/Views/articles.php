<section class="hero-clean">
    <div class="container" style="text-align:center; max-width:700px;">
        <span class="badge-trust" style="margin-bottom:10px;">BLOG & INFORMASI</span>
        <h1 class="hero-h1" style="margin-bottom:10px;">
            Artikel & Panduan Wisata Kemuning
        </h1>
        <p class="hero-p" style="margin-bottom:0;">
            Tips perjalanan, rekomendasi rute offroad, kuliner, dan panduan wisata Kemuning Karanganyar.
        </p>
    </div>
</section>

<div class="container" style="padding:48px 16px;">
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:20px;">
        <?php if (empty($articles)): ?>
        <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:28px; text-align:center; grid-column:1/-1; color:var(--text-muted);">
            Belum ada artikel yang dipublikasikan.
        </div>
        <?php else: foreach ($articles as $art): ?>
        <article class="card-package" style="padding:22px;">
            <div style="font-size:12px; color:var(--text-muted); margin-bottom:6px;"><?= date('d F Y', strtotime($art['published_at'])) ?></div>
            <h2 style="font-size:1.15rem; font-weight:800; color:#111827; margin-bottom:8px; line-height:1.4;">
                <a href="/artikel/<?= $art['slug'] ?>/"><?= Helpers::sanitize($art['title']) ?></a>
            </h2>
            <p style="color:var(--text-muted); font-size:13.5px; margin-bottom:14px; line-height:1.6;"><?= substr(strip_tags($art['content']), 0, 130) ?>...</p>
            <a href="/artikel/<?= $art['slug'] ?>/" style="color:var(--primary); font-weight:700; font-size:13.5px;">Baca Selengkapnya →</a>
        </article>
        <?php endforeach; endif; ?>
    </div>
</div>
