<div style="background:linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding:60px 0;">
    <div class="container" style="text-align:center;">
        <span class="badge-trust" style="background:rgba(255,255,255,0.15); color:#fff; border-color:rgba(255,255,255,0.3);">✓ Resmi CV Jelajah Kemuning • Asuransi Tersedia</span>
        <h1 style="font-size:2.25rem; font-weight:800; margin:16px 0 8px;"><?= Helpers::sanitize($category['name']) ?></h1>
        <p style="max-width:650px; margin:0 auto; opacity:0.9;"><?= Helpers::sanitize($category['description'] ?? 'Nikmati keseruan wisata di lereng Gunung Lawu bersama operator lokal berpengalaman.') ?></p>
        <div style="margin-top:20px; display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink($category['name']) ?>" class="btn-accent">📲 Konsultasi WhatsApp Cepat</a>
            <a href="/proposal/" class="btn-primary" style="background:#fff; color:var(--primary);">📄 Buat Proposal PDF Resmi</a>
        </div>
    </div>
</div>

<div class="container" style="padding:48px 16px;">
    <h2 style="text-align:center; font-size:1.75rem; font-weight:700; margin-bottom:32px;">Pilihan Paket <?= Helpers::sanitize($category['name']) ?></h2>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
        <?php foreach ($packages as $pkg): ?>
        <div class="card-package" style="padding:24px; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <?php if (!empty($pkg['badge'])): ?>
                <span style="background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:4px 8px; border-radius:4px;"><?= Helpers::sanitize($pkg['badge']) ?></span>
                <?php endif; ?>
                <h3 style="font-size:1.35rem; font-weight:700; margin-top:8px;"><?= Helpers::sanitize($pkg['name']) ?></h3>
                <div style="margin:12px 0;">
                    <span style="font-size:1.75rem; font-weight:800; color:var(--primary);"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                    <span style="font-size:13px; color:var(--text-muted);">/ <?= $pkg['price_type'] === 'per_armada' ? 'Jeep (Maks 4 Org)' : 'Orang' ?></span>
                </div>
                <?php if (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                <p style="font-size:12px; color:var(--accent); font-weight:600; margin-bottom:12px;">* Minimal <?= $pkg['min_participants'] ?> peserta</p>
                <?php endif; ?>

                <h4 style="font-size:14px; font-weight:600; margin-top:16px; border-bottom:1px solid var(--border); padding-bottom:6px;">Fasilitas Termasuk:</h4>
                <ul style="list-style:none; margin-top:8px; font-size:14px; display:flex; flex-direction:column; gap:6px;">
                    <?php
                    $incList = (new PackageController())->parseInclusions($pkg['inclusions'] ?? '');
                    if (empty($incList)): ?>
                        <li style="color:var(--text-muted);">Fasilitas lengkap standar CV Jelajah Kemuning.</li>
                    <?php else:
                        foreach ($incList as $inc): ?>
                        <li style="display:flex; align-items:center; gap:6px;">
                            <span style="color:#059669;">✓</span> <?= Helpers::sanitize($inc) ?>
                        </li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>

            <div style="margin-top:24px;">
                <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn-accent" style="width:100%; justify-content:center;">
                    Booking via WhatsApp
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
