<section class="hero-section" style="padding:48px 0 56px;">
    <div class="container" style="text-align:center; max-width:740px;">
        <div class="hero-eyebrow">
            <span>Dokumen Resmi CV Jelajah Kemuning • NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?></span>
        </div>
        <h1 class="hero-h1" style="margin-bottom:12px;">
            Surat Penawaran & Proposal Wisata Kemuning
        </h1>
        <p class="hero-lead" style="margin:0 auto;">
            Isi formulir singkat di bawah ini untuk mengunduh surat penawaran resmi berkop CV Jelajah Kemuning guna pengajuan anggaran ke kantor, dinas, atau sekolah.
        </p>
    </div>
</section>

<div class="container" style="max-width:660px; padding:56px 20px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:32px; box-shadow:var(--shadow-md);">
        <form action="/proposal/generate" method="POST">
            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px; color:var(--text-main);">Nama Instansi / Perusahaan / Komunitas</label>
                <input type="text" name="institution" required placeholder="Contoh: PT Sumber Makmur Abadi" class="qf-input">
            </div>
            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px; color:var(--text-main);">Nama Penanggung Jawab (PIC)</label>
                <input type="text" name="pic_name" required placeholder="Contoh: Budi Santoso" class="qf-input">
            </div>
            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px; color:var(--text-main);">No. WhatsApp PIC</label>
                <input type="tel" name="phone" required placeholder="Contoh: 081234567890" class="qf-input">
            </div>
            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px; color:var(--text-main);">Pilihan Paket Wisata</label>
                <select name="package_name" class="qf-input">
                    <option value="Paket Combo Terlaris (Jeep + Outbound + Tubing)">Paket Combo Terlaris (Jeep + Outbound + Tubing - Rp 185.000/org)</option>
                    <option value="Paket Seru 3 (Outbound + River Tubing)">Paket Seru 3 (Outbound + River Tubing - Rp 130.000/org)</option>
                    <option value="Super Combo (Jeep Medium + Outbound + Tubing)">Super Combo (Jeep Medium + Outbound + Tubing - Rp 210.000/org)</option>
                    <option value="Paket Outbound Basic Fun Games">Paket Outbound Basic Fun Games (Rp 80.000/org)</option>
                    <option value="Jeep Special 1 Offroad Kali & Kebun Teh">Jeep Special 1 Offroad Kali & Kebun Teh (Rp 450.000/armada)</option>
                    <option value="Paket Hemat Jeep Short (Include Makan)">Paket Hemat Jeep Short Inc. Makan (Rp 150.000/org)</option>
                    <option value="Paket Menginap Villa Kebun Teh 2D1N">Paket Menginap Villa Kebun Teh 2D1N (Rp 350.000/org)</option>
                </select>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:26px;">
                <div>
                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px; color:var(--text-main);">Jumlah Peserta</label>
                    <input type="number" name="participants" value="25" min="1" required class="qf-input">
                </div>
                <div>
                    <label style="display:block; font-size:13px; font-weight:700; margin-bottom:6px; color:var(--text-main);">Rencana Tanggal</label>
                    <input type="date" name="trip_date" value="<?= date('Y-m-d', strtotime('+14 days')) ?>" required class="qf-input">
                </div>
            </div>
            <button type="submit" class="btn btn-accent" style="width:100%; padding:14px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                <span>Unduh Proposal PDF Resmi Sekarang</span>
            </button>
        </form>
    </div>
</div>
