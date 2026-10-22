document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Toggle
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    if (menuBtn && mobileNav) {
        menuBtn.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
        });
    }

    // 2. Navbar Scroll Shadow Effect
    const headerNav = document.querySelector('.header-nav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 30) {
            headerNav?.classList.add('header-scrolled');
        } else {
            headerNav?.classList.remove('header-scrolled');
        }
    }, { passive: true });

    // 3. FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            const icon = item.querySelector('.faq-icon');
            if (answer) {
                answer.classList.toggle('hidden');
                if (icon) icon.textContent = answer.classList.contains('hidden') ? '+' : '−';
            }
        });
    });

    // 4. Scroll Reveal via IntersectionObserver
    const revealItems = document.querySelectorAll('.reveal-on-scroll');
    if ('IntersectionObserver' in window && revealItems.length > 0) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
        revealItems.forEach(el => observer.observe(el));
    } else {
        revealItems.forEach(el => el.classList.add('is-revealed'));
    }

    // 5. Category Filter Tabs on Homepage
    const tabButtons = document.querySelectorAll('.tab-btn');
    const packageCards = document.querySelectorAll('.card-package[data-category]');
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            tabButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const selectedCat = btn.getAttribute('data-target');

            packageCards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (selectedCat === 'all' || cardCat === selectedCat) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // 6. Gallery Lightbox Modal
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
        lightboxClose.addEventListener('click', () => {
            lightboxModal.classList.remove('active');
        });
        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) {
                lightboxModal.classList.remove('active');
            }
        });
    }

    // 7. Visual Effects: Canvas 2D Highland Mist & Sun-motes Particle System
    const canvas = document.getElementById('hero-particles');
    if (canvas && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const ctx = canvas.getContext('2d');
        let width = canvas.width = canvas.parentElement.offsetWidth;
        let height = canvas.height = canvas.parentElement.offsetHeight;
        let particles = [];
        const count = width < 768 ? 20 : 45;

        class Particle {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.size = Math.random() * 2.8 + 1.2;
                this.baseAlpha = Math.random() * 0.45 + 0.15;
                this.alpha = this.baseAlpha;
                this.vx = (Math.random() - 0.5) * 0.4;
                this.vy = -(Math.random() * 0.5 + 0.2); // Gentle upward drift
                this.isGold = Math.random() > 0.4;
                this.oscillationSpeed = Math.random() * 0.02 + 0.01;
                this.angle = Math.random() * Math.PI * 2;
            }
            update() {
                this.angle += this.oscillationSpeed;
                this.x += this.vx + Math.sin(this.angle) * 0.3;
                this.y += this.vy;

                // Wrap around edges
                if (this.y < -10) this.y = height + 10;
                if (this.x < -10) this.x = width + 10;
                if (this.x > width + 10) this.x = -10;
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                if (this.isGold) {
                    ctx.fillStyle = `rgba(251, 191, 36, ${this.alpha})`; // Sun-mote gold
                } else {
                    ctx.fillStyle = `rgba(167, 243, 208, ${this.alpha})`; // Fresh highland green mist
                }
                ctx.fill();
            }
        }

        for (let i = 0; i < count; i++) {
            particles.push(new Particle());
        }

        let animationFrameId;
        function animate() {
            ctx.clearRect(0, 0, width, height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            animationFrameId = requestAnimationFrame(animate);
        }
        animate();

        // Responsive resize
        const resizeObserver = new ResizeObserver(() => {
            if (!canvas.parentElement) return;
            width = canvas.width = canvas.parentElement.offsetWidth;
            height = canvas.height = canvas.parentElement.offsetHeight;
        });
        resizeObserver.observe(canvas.parentElement);
    }
});
