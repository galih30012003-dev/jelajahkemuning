<div class="container" style="max-width:800px; padding:60px 16px;">
    <nav style="font-size:13px; color:var(--text-muted); margin-bottom:16px;">
        <a href="/">Beranda</a> &gt; <a href="/artikel/">Artikel</a> &gt; <span><?= Helpers::sanitize($article['title']) ?></span>
    </nav>
    <h1 style="font-size:2.25rem; font-weight:800; line-height:1.3; margin-bottom:12px;"><?= Helpers::sanitize($article['title']) ?></h1>
    <div style="font-size:13px; color:var(--text-muted); margin-bottom:24px; padding-bottom:16px; border-bottom:1px solid var(--border);">
        Ditulis oleh Tim Jelajah Kemuning • <?= date('d F Y', strtotime($article['published_at'])) ?> • Dilihat <?= $article['views'] ?> kali
    </div>

    <div style="font-size:16px; line-height:1.8; color:#374151;">
        <?= $article['content'] ?>
    </div>

    <div style="background:#ECFDF5; border:1px solid #A7F3D0; padding:24px; border-radius:12px; margin-top:48px; text-align:center;">
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--primary); margin-bottom:8px;">Rencanakan Trip Wisata Kemuning Sekarang</h3>
        <p style="font-size:14px; color:#065F46; margin-bottom:16px;">Konsultasikan jadwal trip Jeep, River Tubing, atau Outbound rombongan dengan admin kami.</p>
        <a href="<?= Helpers::generateWaLink('Artikel: ' . $article['title']) ?>" class="btn-accent">📲 Chat WhatsApp Admin</a>
    </div>
</div>
