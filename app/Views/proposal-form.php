<div class="container" style="max-width:650px; padding:60px 16px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <span class="badge-trust">📄 Generator Proposal Resmi</span>
        <h1 style="font-size:1.75rem; font-weight:800; margin:12px 0 8px;">Cetak Surat Penawaran & Proposal PDF</h1>
        <p style="color:var(--text-muted); font-size:14px; margin-bottom:24px;">Isi form di bawah ini untuk mengunduh penawaran resmi berkop CV Jelajah Kemuning (NIB: <?= Helpers::getSetting('nib', defined('CV_NIB') ? CV_NIB : '0705250012458') ?>) guna pengajuan anggaran ke atasan/kantor.</p>

        <form action="/proposal/generate" method="POST">
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Nama Instansi / Perusahaan / Komunitas:</label>
                <input type="text" name="institution" required placeholder="Contoh: PT. Sumber Makmur Abadi" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Nama PIC / Penanggung Jawab:</label>
                <input type="text" name="pic_name" required placeholder="Contoh: Budi Santoso" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">No. WhatsApp PIC:</label>
                <input type="tel" name="phone" required placeholder="Contoh: 081234567890" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Pilihan Paket Wisata:</label>
                <select name="package_name" style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px; background:#fff;">
                    <option value="Paket Combo Seru (Jeep + Tubing + Makan Siang)">Paket Combo Seru (Jeep + Tubing + Makan Siang)</option>
                    <option value="Paket Outbound Gathering & Fun Games">Paket Outbound Gathering & Fun Games</option>
                    <option value="Paket Jeep Adventure Offroad Kemuning">Paket Jeep Adventure Offroad Kemuning</option>
                    <option value="Paket Menginap Villa & Glamping Kemuning 2D1N">Paket Menginap Villa & Glamping Kemuning 2D1N</option>
                </select>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Jumlah Peserta:</label>
                    <input type="number" name="participants" value="25" min="1" required style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
                </div>
                <div>
                    <label style="display:block; font-size:14px; font-weight:600; margin-bottom:6px;">Rencana Tanggal:</label>
                    <input type="date" name="trip_date" required style="width:100%; padding:10px; border:1px solid var(--border); border-radius:8px;">
                </div>
            </div>
            <button type="submit" class="btn-accent" style="width:100%; justify-content:center; font-size:16px;">
                📥 Download Proposal PDF Resmi Sekarang
            </button>
        </form>
    </div>
</div>
