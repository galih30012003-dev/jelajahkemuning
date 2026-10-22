<section class="hero-clean">
    <div class="container" style="text-align:center; max-width:700px;">
        <span class="badge-trust" style="margin-bottom:10px;">PROPOSAL RESMI</span>
        <h1 class="hero-h1" style="margin-bottom:10px;">
            Surat Penawaran & Proposal Wisata Kemuning
        </h1>
        <p class="hero-p" style="margin-bottom:0;">
            Isi formulir di bawah ini untuk mengunduh surat penawaran resmi berkop CV Jelajah Kemuning (NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?>) untuk pengajuan anggaran rombongan kantor atau sekolah.
        </p>
    </div>
</section>

<div class="container" style="max-width:650px; padding:48px 16px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-sm); padding:28px;">
        <form action="/proposal/generate" method="POST">
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:13.5px; font-weight:700; margin-bottom:6px; color:#111827;">Nama Instansi / Perusahaan / Komunitas</label>
                <input type="text" name="institution" required placeholder="Contoh: PT Sumber Makmur Abadi" style="width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:var(--radius-sm); font-size:14px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:13.5px; font-weight:700; margin-bottom:6px; color:#111827;">Nama Penanggung Jawab (PIC)</label>
                <input type="text" name="pic_name" required placeholder="Contoh: Budi Santoso" style="width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:var(--radius-sm); font-size:14px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:13.5px; font-weight:700; margin-bottom:6px; color:#111827;">No. WhatsApp PIC</label>
                <input type="tel" name="phone" required placeholder="Contoh: 081234567890" style="width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:var(--radius-sm); font-size:14px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:13.5px; font-weight:700; margin-bottom:6px; color:#111827;">Pilihan Paket Wisata</label>
                <select name="package_name" style="width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:var(--radius-sm); background:#fff; font-size:14px;">
                    <option value="Paket Combo Terlaris (Jeep + Outbound + Tubing)">Paket Combo Terlaris (Jeep + Outbound + Tubing - Rp 185.000/org)</option>
                    <option value="Paket Seru 3 (Outbound + River Tubing)">Paket Seru 3 (Outbound + River Tubing - Rp 130.000/org)</option>
                    <option value="Super Combo (Jeep Medium + Outbound + Tubing)">Super Combo (Jeep Medium + Outbound + Tubing - Rp 210.000/org)</option>
                    <option value="Paket Outbound Basic Fun Games">Paket Outbound Basic Fun Games (Rp 80.000/org)</option>
                    <option value="Jeep Special 1 Offroad Kali & Kebun Teh">Jeep Special 1 Offroad Kali & Kebun Teh (Rp 450.000/armada)</option>
                    <option value="Paket Hemat Jeep Short (Include Makan)">Paket Hemat Jeep Short Inc. Makan (Rp 150.000/org)</option>
                    <option value="Paket Menginap Villa Kebun Teh 2D1N">Paket Menginap Villa Kebun Teh 2D1N (Rp 350.000/org)</option>
                </select>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-size:13.5px; font-weight:700; margin-bottom:6px; color:#111827;">Jumlah Peserta</label>
                    <input type="number" name="participants" value="25" min="1" required style="width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:var(--radius-sm); font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:13.5px; font-weight:700; margin-bottom:6px; color:#111827;">Rencana Tanggal</label>
                    <input type="date" name="trip_date" required style="width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:var(--radius-sm); font-size:14px;">
                </div>
            </div>
            <button type="submit" class="btn-primary" style="width:100%; justify-content:center; padding:12px; font-size:15px;">
                Unduh Proposal PDF Resmi
            </button>
        </form>
    </div>
</div>
