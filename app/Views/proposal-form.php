<section class="page-head">
    <div class="container">
        <div class="page-head-inner">
            <div class="section-eyebrow">Dokumen resmi CV Jelajah Kemuning</div>
            <h1>Surat penawaran &amp;<br>proposal wisata.</h1>
            <p class="lede">
                Isi formulir singkat di bawah ini untuk mengunduh surat penawaran resmi berkop CV Jelajah Kemuning — siap dipakai untuk pengajuan anggaran ke kantor, dinas, atau sekolah.
            </p>
            <div class="page-meta">
                <span>PDF berkop</span>
                <span>Rincian biaya transparan</span>
                <span>NIB <strong><?= Helpers::sanitize(Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458')) ?></strong></span>
            </div>
        </div>
    </div>
</section>

<div class="page-body">
    <div class="container">
        <div class="form-panel">
            <form action="/proposal/generate" method="POST">
                <div class="field">
                    <label for="pf-inst">Nama instansi / perusahaan / komunitas</label>
                    <input type="text" id="pf-inst" name="institution" required placeholder="Contoh: PT Sumber Makmur Abadi" class="qf-input on-paper">
                </div>

                <div class="field">
                    <label for="pf-pic">Nama penanggung jawab (PIC)</label>
                    <input type="text" id="pf-pic" name="pic_name" required placeholder="Contoh: Budi Santoso" class="qf-input on-paper">
                </div>

                <div class="field">
                    <label for="pf-phone">No. WhatsApp PIC</label>
                    <input type="tel" id="pf-phone" name="phone" required placeholder="Contoh: 081234567890" class="qf-input on-paper">
                </div>

                <div class="field">
                    <label for="pf-package">Pilihan paket wisata</label>
                    <select id="pf-package" name="package_name" class="qf-input on-paper">
                        <?php if (!empty($packages)): ?>
                            <?php foreach ($packages as $pkg): ?>
                            <option value="<?= htmlspecialchars($pkg['name']) ?>">
                                <?= htmlspecialchars($pkg['name']) ?> (<?= Helpers::formatRupiah($pkg['price']) ?> / <?= $pkg['price_type'] === 'per_armada' ? 'armada' : 'org' ?>)
                            </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="Paket Combo Terlaris (Jeep + Outbound + Tubing)">Paket Combo Terlaris (Jeep + Outbound + Tubing - Rp 185.000/org)</option>
                            <option value="Paket Seru 3 (Outbound + River Tubing)">Paket Seru 3 (Outbound + River Tubing - Rp 130.000/org)</option>
                            <option value="Super Combo (Jeep Medium + Outbound + Tubing)">Super Combo (Jeep Medium + Outbound + Tubing - Rp 210.000/org)</option>
                            <option value="Paket Outbound Basic Fun Games">Paket Outbound Basic Fun Games (Rp 80.000/org)</option>
                            <option value="Jeep Special 1 Offroad Kali & Kebun Teh">Jeep Special 1 Offroad Kali & Kebun Teh (Rp 450.000/armada)</option>
                            <option value="Paket Hemat Jeep Short (Include Makan)">Paket Hemat Jeep Short Inc. Makan (Rp 150.000/org)</option>
                            <option value="Paket Menginap Villa Kebun Teh 2D1N">Paket Menginap Villa Kebun Teh 2D1N (Rp 350.000/org)</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="pf-pax">Jumlah peserta</label>
                        <input type="number" id="pf-pax" name="participants" value="25" min="1" required class="qf-input on-paper">
                    </div>
                    <div class="field">
                        <label for="pf-date">Rencana tanggal</label>
                        <input type="date" id="pf-date" name="trip_date" value="<?= date('Y-m-d', strtotime('+14 days')) ?>" required class="qf-input on-paper">
                    </div>
                </div>

                <button type="submit" class="btn btn-accent" style="width:100%; padding:15px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    <span>Unduh proposal PDF resmi</span>
                </button>

                <p class="field-note">
                    Data hanya dipakai untuk menyusun dokumen penawaran dan tidak dibagikan ke pihak lain.
                </p>
            </form>
        </div>

        <div class="page-cta">
            <div>
                <div class="section-eyebrow" style="margin-bottom:12px;">Butuh diskusi dulu?</div>
                <h2 class="section-title" style="font-size:clamp(1.4rem,2.4vw,1.9rem); margin-bottom:0;">Admin siap bantu susun anggaran.</h2>
            </div>
            <div class="page-cta-actions">
                <a href="<?= Helpers::generateWaLink('Permintaan proposal wisata') ?>" class="btn btn-primary">Chat admin</a>
                <a href="/cari-paket/" class="btn btn-outline">Cari paket dulu</a>
            </div>
        </div>
    </div>
</div>
