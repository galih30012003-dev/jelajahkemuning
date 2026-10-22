<div style="background:linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding:60px 0;">
    <div class="container" style="text-align:center;">
        <span class="badge-trust" style="background:rgba(255,255,255,0.15); color:#fff; border-color:rgba(255,255,255,0.3);">✓ Resmi CV Jelajah Kemuning • Asuransi Tersedia • Driver Lokal</span>
        <h1 style="font-size:2.4rem; font-weight:900; margin:16px 0 8px;"><?= Helpers::sanitize($category['name']) ?></h1>
        <p style="max-width:700px; margin:0 auto; opacity:0.92; font-size:15px; line-height:1.6;">
            <?= Helpers::sanitize($category['description'] ?? 'Penyedia paket wisata resmi Karanganyar dengan rute terbaik dan fasilitas terlengkap.') ?>
        </p>
        <div style="margin-top:24px; display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= Helpers::generateWaLink($category['name']) ?>" class="btn-accent" style="font-size:15px; padding:12px 24px;">
                📲 Konsultasi WhatsApp Cepat
            </a>
            <a href="/proposal/" class="btn-primary" style="background:#fff; color:var(--primary); font-size:15px; padding:12px 22px;">
                📄 Unduh Proposal PDF Resmi
            </a>
        </div>
    </div>
</div>

<div class="container" style="padding:54px 16px;">
    <div style="text-align:center; max-width:700px; margin:0 auto 36px;">
        <h2 style="font-size:1.85rem; font-weight:900; color:var(--primary); margin-bottom:6px;">
            Pilihan Lengkap Paket <?= Helpers::sanitize($category['name']) ?>
        </h2>
        <p style="color:var(--text-muted); font-size:14px;">Pilih rute, durasi, dan fasilitas yang sesuai dengan rombongan kamu.</p>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:28px;">
        <?php foreach ($packages as $pkg): ?>
        <div class="card-package" style="padding:28px; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                    <?php if (!empty($pkg['badge'])): ?>
                    <span style="background:var(--accent); color:#fff; font-size:11px; font-weight:800; padding:4px 10px; border-radius:4px;">
                        <?= Helpers::sanitize($pkg['badge']) ?>
                    </span>
                    <?php else: ?>
                    <span style="background:#ECFDF5; color:#047857; font-size:11px; font-weight:700; padding:4px 8px; border-radius:4px;">
                        TERSEDIA
                    </span>
                    <?php endif; ?>

                    <?php if (!empty($pkg['duration'])): ?>
                    <span style="font-size:12px; font-weight:600; color:var(--text-muted);">⏱️ <?= Helpers::sanitize($pkg['duration']) ?></span>
                    <?php endif; ?>
                </div>

                <h3 style="font-size:1.35rem; font-weight:800; color:var(--primary); margin:8px 0;"><?= Helpers::sanitize($pkg['name']) ?></h3>

                <div style="margin:12px 0 16px;">
                    <span style="font-size:1.85rem; font-weight:900; color:var(--accent);"><?= Helpers::formatRupiah($pkg['price']) ?></span>
                    <span style="font-size:13px; color:var(--text-muted);">/ <?= $pkg['price_type'] === 'per_armada' ? 'Armada (Maks 4 Org)' : 'Orang' ?></span>
                </div>

                <?php if (!empty($pkg['min_participants']) && $pkg['min_participants'] > 1): ?>
                <div style="font-size:12px; color:var(--accent); font-weight:700; margin-bottom:12px;">
                    NB : MINIMAL <?= $pkg['min_participants'] ?> PESERTA
                </div>
                <?php endif; ?>

                <?php if (!empty($pkg['itinerary'])): ?>
                <div style="background:#F9FAFB; border:1px solid #E5E7EB; border-radius:8px; padding:14px; margin-bottom:16px;">
                    <div style="font-size:12px; font-weight:700; color:var(--primary); margin-bottom:4px;">📍 Rute Perjalanan:</div>
                    <div style="font-size:12.5px; color:#4B5563; line-height:1.6;"><?= nl2br(Helpers::sanitize($pkg['itinerary'])) ?></div>
                </div>
                <?php endif; ?>

                <h4 style="font-size:13px; font-weight:700; color:#374151; margin-top:14px; border-bottom:1px solid var(--border); padding-bottom:6px;">Fasilitas Termasuk:</h4>
                <ul style="list-style:none; margin-top:10px; font-size:13px; display:flex; flex-direction:column; gap:6px; color:#4B5563;">
                    <?php
                    $incList = (new PackageController())->parseInclusions($pkg['inclusions'] ?? '');
                    if (empty($incList)): ?>
                        <li style="color:var(--text-muted);">Fasilitas lengkap standar CV Jelajah Kemuning.</li>
                    <?php else:
                        foreach ($incList as $inc): ?>
                        <li style="display:flex; align-items:flex-start; gap:6px;">
                            <span style="color:#059669; font-weight:bold;">✓</span> <span><?= Helpers::sanitize($inc) ?></span>
                        </li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>

            <div style="margin-top:24px;">
                <a href="<?= Helpers::generateWaLink($pkg['name'], Helpers::formatRupiah($pkg['price'])) ?>" class="btn-accent" style="width:100%; justify-content:center; font-size:15px;">
                    📲 Booking Paket via WhatsApp
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- FAQ & Info Section -->
<div style="background:#F8FAF8; border-top:1px solid var(--border); padding:54px 0;">
    <div class="container" style="max-width:800px;">
        <h3 style="text-align:center; font-size:1.5rem; font-weight:800; color:var(--primary); margin-bottom:24px;">
            Pertanyaan Seputar <?= Helpers::sanitize($category['name']) ?>
        </h3>
        <div style="display:flex; flex-direction:column; gap:12px;">
            <div style="background:#fff; border:1px solid var(--border); border-radius:8px; padding:16px 20px;">
                <div style="font-weight:700; color:var(--primary); margin-bottom:4px;">Bisa custom rute dan jam keberangkatan?</div>
                <div style="font-size:13.5px; color:var(--text-muted);">Bisa banget! Jam dan rute trip sangat fleksibel, silakan koordinasikan dengan admin via WhatsApp.</div>
            </div>
            <div style="background:#fff; border:1px solid var(--border); border-radius:8px; padding:16px 20px;">
                <div style="font-weight:700; color:var(--primary); margin-bottom:4px;">Apakah sudah termasuk asuransi dan dokumentasi?</div>
                <div style="font-size:13.5px; color:var(--text-muted);">Seluruh paket resmi kami sudah include asuransi wisata dan bonus gratis dokumentasi foto/video untuk rombongan.</div>
            </div>
            <div style="background:#fff; border:1px solid var(--border); border-radius:8px; padding:16px 20px;">
                <div style="font-weight:700; color:var(--primary); margin-bottom:4px;">Di mana titik kumpulnya?</div>
                <div style="font-size:13.5px; color:var(--text-muted);">Meeting point utama di Terminal Wisata Kemuning, Karanganyar dengan fasilitas parkir bus luas dan aula transit gratis.</div>
            </div>
        </div>
    </div>
</div>
