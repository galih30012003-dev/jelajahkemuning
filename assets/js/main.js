document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile menu
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    if (menuBtn && mobileNav) {
        menuBtn.addEventListener('click', () => {
            const open = mobileNav.classList.toggle('hidden') === false;
            menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    // 2. FAQ accordion
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            const icon = item.querySelector('.faq-icon');
            if (!answer) return;
            const nowHidden = answer.classList.toggle('hidden');
            if (icon) icon.textContent = nowHidden ? '+' : '−';
        });
    });

    // 3. Category filters — works on .pkg-row[data-category]
    const tabButtons = document.querySelectorAll('.cat-btn');
    const packageRows = document.querySelectorAll('[data-category]');
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            tabButtons.forEach(b => {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });
            btn.classList.add('active');
            btn.setAttribute('aria-selected', 'true');
            const target = btn.getAttribute('data-target');

            packageRows.forEach(row => {
                const match = target === 'all' || row.getAttribute('data-category') === target;
                row.classList.toggle('is-hidden', !match);
                row.style.display = match ? '' : 'none';
            });
        });
    });

    // 4. Gallery lightbox
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.querySelector('.lightbox-close');

    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            if (img && lightboxModal && lightboxImg) {
                lightboxImg.src = img.src;
                lightboxModal.classList.add('active');
            }
        });
    });

    if (lightboxClose && lightboxModal) {
        lightboxClose.addEventListener('click', () => lightboxModal.classList.remove('active'));
        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) lightboxModal.classList.remove('active');
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') lightboxModal.classList.remove('active');
        });
    }

    // 5. Additive scroll reveal — content stays visible without this script
    if ('IntersectionObserver' in window &&
        !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const targets = document.querySelectorAll(
            '.section-header, .pkg-row, .lead-package, .lead-row, .gallery-item, .testi-card, .faq-box, .b2b-banner'
        );
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const index = Array.prototype.indexOf.call(el.parentElement.children, el);
                el.style.transitionDelay = `${Math.min(index, 5) * 60}ms`;
                el.classList.add('is-in');
                observer.unobserve(el);
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        targets.forEach(el => {
            el.classList.add('reveal');
            observer.observe(el);
        });
    }
});
