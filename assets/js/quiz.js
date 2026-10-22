let quizState = {
    group: 'keluarga',
    activity: 'jeep',
    participants: 10
};

function selectOption(step, key, val, el) {
    quizState[key] = val;
    document.querySelectorAll(`.step-${step} .quiz-opt`).forEach(o => o.classList.remove('selected'));
    el.classList.add('selected');
}

function nextStep(current, next) {
    document.getElementById(`quiz-step-${current}`).style.display = 'none';
    document.getElementById(`quiz-step-${next}`).style.display = 'block';
    if (next === 3) {
        calculateRecommendation();
    }
}

function calculateRecommendation() {
    const count = parseInt(document.getElementById('quiz-participants-input').value) || 10;
    quizState.participants = count;

    let recName = "Paket Combo (Jeep + Outbound + Tubing)";
    let estPrice = 185000;
    if (quizState.activity === 'jeep') {
        recName = count > 15 ? "Paket Hemat Jeep Adventure (Inc. Makan)" : "Jeep Special 1 Offroad Kali & Kebun Teh";
        estPrice = count > 15 ? 150000 : 450000;
    } else if (quizState.activity === 'tubing') {
        recName = "River Tubing Kali Senatah (Track Panjang)";
        estPrice = 80000;
    } else if (quizState.activity === 'outbound') {
        recName = "Paket Seru 3 (Outbound & River Tubing)";
        estPrice = 130000;
    } else if (quizState.activity === 'villa') {
        recName = "Paket Menginap Villa & Glamping Kemuning 2D1N";
        estPrice = 350000;
    }

    document.getElementById('rec-title').textContent = recName;
    document.getElementById('rec-price').textContent = "Estimasi: Rp " + estPrice.toLocaleString('id-ID') + (count >= 16 ? "/orang" : (quizState.activity === 'jeep' && count <= 15 ? "/armada (maks 4 org)" : "/orang"));

    const waPhone = window.JK_WA_PHONE || '6285171001566';
    const waText = `Halo Admin Jelajah Kemuning, saya sudah coba Kuis Paket di web: Tipe Rombongan: ${quizState.group}, Aktivitas Favorit: ${quizState.activity}, Peserta: ${count} orang. Tertarik rekomendasi: *${recName}*. Mohon info ketersediaan tanggal dan rincian lengkapnya ya. Terima kasih!`;
    document.getElementById('rec-wa-btn').href = "https://wa.me/" + waPhone + "?text=" + encodeURIComponent(waText);
}
