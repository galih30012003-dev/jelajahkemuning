<div class="container" style="max-width:700px; padding:60px 16px;">
    <div style="background:#fff; border:1px solid var(--border); border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <span class="badge-trust">✨ Smart Package Finder</span>
        <h1 style="font-size:1.75rem; font-weight:800; margin:12px 0 8px;">Cari Paket Wisata Paling Pas Buat Rombongan Kamu</h1>
        <p style="color:var(--text-muted); font-size:14px; margin-bottom:24px;">Jawab 3 pertanyaan singkat untuk mendapatkan rekomendasi dan estimasi biaya terbaik.</p>

        <!-- Step 1 -->
        <div id="quiz-step-1" class="step-1">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:12px;">1. Siapa saja yang akan ikut liburan?</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(1, 'group', 'keluarga', this)" style="padding:16px; cursor:pointer;">
                    👨‍👩‍👧‍👦 <strong>Keluarga Besar</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'kantor', this)" style="padding:16px; cursor:pointer;">
                    🏢 <strong>Kantor / Instansi</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'komunitas', this)" style="padding:16px; cursor:pointer;">
                    🚴‍♂️ <strong>Komunitas / Teman</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(1, 'group', 'pasangan', this)" style="padding:16px; cursor:pointer;">
                    💑 <strong>Pasangan / Duo</strong>
                </div>
            </div>
            <button class="btn-primary" onclick="nextStep(1, 2)" style="margin-top:24px; width:100%; justify-content:center;">Lanjut →</button>
        </div>

        <!-- Step 2 -->
        <div id="quiz-step-2" class="step-2" style="display:none;">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:12px;">2. Aktivitas apa yang paling diminati?</h3>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <div class="quiz-opt card-package selected" onclick="selectOption(2, 'activity', 'jeep', this)" style="padding:16px; cursor:pointer;">
                    🚙 <strong>Offroad Jeep Kebun Teh</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'tubing', this)" style="padding:16px; cursor:pointer;">
                    🌊 <strong>River Tubing Seru</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'outbound', this)" style="padding:16px; cursor:pointer;">
                    🎯 <strong>Fun Games Outbound</strong>
                </div>
                <div class="quiz-opt card-package" onclick="selectOption(2, 'activity', 'villa', this)" style="padding:16px; cursor:pointer;">
                    🏡 <strong>Menginap di Villa</strong>
                </div>
            </div>
            <div style="margin-top:24px; display:flex; gap:10px;">
                <button class="btn-primary" onclick="nextStep(2, 1)" style="background:#E5E7EB; color:#374151;">← Kembali</button>
                <button class="btn-primary" onclick="nextStep(2, 3)" style="flex:1; justify-content:center;">Lanjut →</button>
            </div>
        </div>

        <!-- Step 3 -->
        <div id="quiz-step-3" class="step-3" style="display:none;">
            <h3 style="font-size:16px; font-weight:700; margin-bottom:12px;">3. Perkiraan jumlah peserta:</h3>
            <input type="number" id="quiz-participants-input" value="16" min="1" max="500" style="width:100%; padding:12px; border:1px solid var(--border); border-radius:8px; font-size:16px; margin-bottom:20px;" onchange="calculateRecommendation()">

            <div style="background:#F0FDF4; border:1px solid #BBF7D0; border-radius:12px; padding:20px; text-align:center;">
                <span style="font-size:12px; font-weight:700; color:#15803D;">HASIL REKOMENDASI PAKET:</span>
                <h2 id="rec-title" style="font-size:1.5rem; font-weight:800; color:var(--primary); margin:8px 0;">Paket Combo Jeep & River Tubing</h2>
                <div id="rec-price" style="font-size:1.25rem; font-weight:700; color:var(--accent);">Estimasi: Rp 185.000/orang</div>
                <div style="margin-top:16px;">
                    <a id="rec-wa-btn" href="#" class="btn-accent" style="width:100%; justify-content:center;">
                        📲 Ambil Rekomendasi Ini via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/quiz.js"></script>
