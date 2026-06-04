// main.js — Aroma Slasticarna
// Extracted from inline scripts in index.html

/* ===== 1. Theme Toggle + Back-to-Top + Logo Scroll ===== */
const themeToggleBtn = document.getElementById('theme-toggle');
const mobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');
const htmlElement = document.documentElement;

(localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches))
    ? htmlElement.classList.add('dark') : htmlElement.classList.remove('dark');

function toggleTheme() {
    htmlElement.classList.toggle('dark');
    localStorage.theme = htmlElement.classList.contains('dark') ? 'dark' : 'light';
}

if (themeToggleBtn) themeToggleBtn.addEventListener('click', toggleTheme);
if (mobileThemeToggleBtn) mobileThemeToggleBtn.addEventListener('click', toggleTheme);

const backToTopBtn = document.getElementById('back-to-top');
if (backToTopBtn) {
    window.addEventListener('scroll', () => {
        const show = window.scrollY > 500;
        backToTopBtn.classList.toggle('opacity-0', !show);
        backToTopBtn.classList.toggle('invisible', !show);
        backToTopBtn.classList.toggle('translate-y-10', !show);
    });
    backToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

// Logo nestaje pri scrollu
(function () {
    const navLogo = document.getElementById('nav-logo');
    if (!navLogo) return;
    function updateNavLogo() {
        if (window.scrollY > 80) {
            navLogo.style.opacity = '0';
            navLogo.style.transform = 'translateY(-6px)';
            navLogo.style.pointerEvents = 'none';
        } else {
            navLogo.style.opacity = '1';
            navLogo.style.transform = '';
            navLogo.style.pointerEvents = '';
        }
    }
    window.addEventListener('scroll', updateNavLogo, { passive: true });
    updateNavLogo();
})();

/* ===== 2. Cookie Consent (GDPR) ===== */
document.addEventListener('DOMContentLoaded', function () {
    const cookieBanner = document.getElementById('cookie-banner');
    const cookieAcceptAllBtn = document.getElementById('cookie-accept-all');
    const cookieAcceptSelectedBtn = document.getElementById('cookie-accept-selected');
    const cookieDeclineBtn = document.getElementById('cookie-decline');

    if (!cookieBanner) return;

    const cookieConsent = {
        save: (choices) => {
            try {
                localStorage.setItem('cookieConsent', JSON.stringify({
                    ...choices,
                    timestamp: Date.now(),
                    version: '1.0'
                }));
            } catch (e) {
                console.error('Failed to save consent:', e);
            }
        },
        load: () => {
            try {
                return JSON.parse(localStorage.getItem('cookieConsent') || '{}');
            } catch {
                return {};
            }
        }
    };

    const existingConsent = cookieConsent.load();
    if (!existingConsent.timestamp) {
        setTimeout(() => {
            cookieBanner.classList.remove('opacity-0', 'pointer-events-none');
            cookieBanner.classList.add('show');
        }, 1000);
    }

    if (cookieAcceptAllBtn) {
        cookieAcceptAllBtn.addEventListener('click', () => {
            cookieConsent.save({ necessary: true, analytics: true, marketing: true });
            if (typeof loadAnalytics === 'function') loadAnalytics();
            if (typeof loadMarketing === 'function') loadMarketing();
            cookieBanner.classList.add('opacity-0', 'pointer-events-none');
            cookieBanner.classList.remove('show');
        });
    }

    if (cookieAcceptSelectedBtn) {
        cookieAcceptSelectedBtn.addEventListener('click', () => {
            const analytics = document.getElementById('analytics-consent')?.checked || false;
            const marketing = document.getElementById('marketing-consent')?.checked || false;
            cookieConsent.save({ necessary: true, analytics, marketing });
            if (analytics && typeof loadAnalytics === 'function') loadAnalytics();
            if (marketing && typeof loadMarketing === 'function') loadMarketing();
            cookieBanner.classList.add('opacity-0', 'pointer-events-none');
            cookieBanner.classList.remove('show');
        });
    }

    if (cookieDeclineBtn) {
        cookieDeclineBtn.addEventListener('click', () => {
            cookieConsent.save({ necessary: true, analytics: false, marketing: false });
            cookieBanner.classList.add('opacity-0', 'pointer-events-none');
            cookieBanner.classList.remove('show');
        });
    }
});

function loadAnalytics() {
    const consent = JSON.parse(localStorage.getItem('cookieConsent') || '{}');
    if (!consent.analytics) return;
    /*
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtag/js?id='+i;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','G-XXXXXXXXXX');
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXXXXX', { anonymize_ip: true, cookie_flags: 'SameSite=None;Secure' });
    */
}
window.addEventListener('load', loadAnalytics);

/* ===== 3. Order Modal + Form Submission ===== */
const orderModal = document.getElementById('cake-order-modal');
const orderBackdrop = document.getElementById('order-backdrop');
const orderContent = document.getElementById('order-modal-content');
const orderClose = document.getElementById('order-close');
const orderBtn = document.getElementById('order-cake-btn');
const orderForm = document.getElementById('cake-order-form');
const thankYouModal = document.getElementById('thank-you-modal');
const thankYouContent = document.getElementById('thank-you-content');
const thankYouClose = document.getElementById('thank-you-close');

const SUBMIT_COOLDOWN = 60000;
const MIN_FILL_TIME = 3000;
let lastSubmitTime = 0;
let formLoadTime = Date.now();

function openOrderModal() {
    orderModal.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
    orderContent.classList.remove('scale-95');
    orderContent.classList.add('scale-100');
    document.body.style.overflow = 'hidden';
    formLoadTime = Date.now();
}

function closeOrderModal() {
    orderModal.classList.add('opacity-0', 'invisible', 'pointer-events-none');
    orderContent.classList.remove('scale-100');
    orderContent.classList.add('scale-95');
    document.body.style.overflow = '';
}

function showThankYou() {
    closeOrderModal();
    setTimeout(() => {
        thankYouModal.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
        thankYouContent.classList.remove('scale-95');
        thankYouContent.classList.add('scale-100');
    }, 300);
}

function closeThankYou() {
    thankYouModal.classList.add('opacity-0', 'invisible', 'pointer-events-none');
    thankYouContent.classList.remove('scale-100');
    thankYouContent.classList.add('scale-95');
    document.body.style.overflow = '';
}

if (orderBtn) orderBtn.addEventListener('click', openOrderModal);
if (orderClose) orderClose.addEventListener('click', closeOrderModal);
if (orderBackdrop) orderBackdrop.addEventListener('click', closeOrderModal);
if (thankYouClose) thankYouClose.addEventListener('click', closeThankYou);

if (orderForm) {
    orderForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const now = Date.now();

        if (now - lastSubmitTime < SUBMIT_COOLDOWN) {
            alert('⏱️ Molimo pričekajte 1 minutu prije ponovnog slanja.');
            return;
        }

        if (now - formLoadTime < MIN_FILL_TIME) {
            console.warn('Submission too fast - possible bot');
            return;
        }

        const honeypot1 = document.getElementById('website')?.value || '';
        const honeypot2 = document.getElementById('website_extra')?.value || '';
        const honeypot3 = orderForm.querySelector('[name="phone_backup"]')?.value || '';

        if (honeypot1 !== '' || honeypot2 !== '' || honeypot3 !== '') {
            console.warn('Bot detected via honeypot');
            return;
        }

        orderForm.classList.add('was-validated');
        if (!orderForm.checkValidity()) {
            orderForm.reportValidity();
            return;
        }

        const submitBtn = orderForm.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Šaljem...';
        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
        const formData = new FormData(orderForm);

        try {
            const response = await fetch(orderForm.action, {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json' }
            });

            if (response.ok) {
                showThankYou();
                orderForm.reset();
                lastSubmitTime = now;
            } else {
                const data = await response.json();
                alert('⚠️ Došlo je do greške. Molimo pokušajte ponovo.');
                console.error('Form error:', data);
            }
        } catch (error) {
            alert('⚠️ Greška pri slanju. Provjerite internet konekciju.');
            console.error('Network error:', error);
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = originalBtnText;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    });

    const phoneInput = orderForm.querySelector('input[name="phone"]');
    if (phoneInput) {
        phoneInput.addEventListener('blur', function () {
            const phone = this.value.trim();
            this.setCustomValidity(phone && !/^(\+385|0)[0-9]{8,9}$/.test(phone.replace(/\s/g, ''))
                ? 'Unesite ispravan hrvatski broj telefona (npr. 0912345678 ili +385912345678)' : '');
            if (this.validationMessage) this.reportValidity();
        });
    }
    const emailInput = orderForm.querySelector('input[name="email"]');
    if (emailInput) {
        emailInput.addEventListener('blur', function () {
            const email = this.value.trim();
            this.setCustomValidity(email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
                ? 'Unesite ispravnu email adresu' : '');
            if (this.validationMessage) this.reportValidity();
        });
    }
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') { closeOrderModal(); closeThankYou(); closeModal(); }
});

/* ===== 4. Hero Video ===== */
const heroVideo = document.getElementById('hero-video');
let isVideoActive = false;
function activateVideo() {
    if (!isVideoActive && heroVideo) { heroVideo.play().catch(() => {}); isVideoActive = true; }
}
document.addEventListener('mousemove', activateVideo, { once: true });
window.addEventListener('scroll', activateVideo, { once: true });
document.addEventListener('touchstart', activateVideo, { once: true });

/* ===== 5. Cake Gallery Modal + Scroll ===== */
function openModal(title, desc, imgSrc) {
    const modal = document.getElementById('cake-modal');
    const modalContent = document.getElementById('modal-content');
    const modalImg = document.getElementById('modal-img');
    const modalTitle = document.getElementById('modal-title');
    const modalDesc = document.getElementById('modal-desc');
    modalTitle.textContent = title;
    modalDesc.textContent = desc;
    modalImg.src = imgSrc;
    modal.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
    modalContent.classList.remove('scale-95');
    modalContent.classList.add('scale-100');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('cake-modal');
    const modalContent = document.getElementById('modal-content');
    modal.classList.add('opacity-0', 'invisible', 'pointer-events-none');
    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-95');
    document.body.style.overflow = '';
}

document.addEventListener('DOMContentLoaded', () => {
    const modalBackdrop2 = document.getElementById('modal-backdrop');
    const modalClose2 = document.getElementById('modal-close');
    const triggers = document.querySelectorAll('.cake-hover-trigger');

    triggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const title = trigger.getAttribute('data-title');
            const desc = trigger.getAttribute('data-desc');
            const img = trigger.querySelector('img').src;
            openModal(title, desc, img);
        });
    });

    if (modalClose2) modalClose2.addEventListener('click', closeModal);
    if (modalBackdrop2) modalBackdrop2.addEventListener('click', closeModal);
});

// Escape za gallery modal — handler je spojen s Order/ThankYou Escape handlerom gore (Sekcija 3)

document.querySelectorAll('#cakes-scroll-container .cake-hover-trigger[data-title]').forEach(item => {
    const title = item.getAttribute('data-title');
    if (title) {
        const caption = document.createElement('div');
        caption.textContent = title;
        caption.className = 'text-center text-sm font-semibold text-gray-800 dark:text-white py-2 px-3 bg-white/90 dark:bg-black/80';
        item.appendChild(caption);
    }
});

const scrollContainer = document.getElementById('cakes-scroll-container');
const scrollLeftBtn = document.getElementById('scroll-left');
const scrollRightBtn = document.getElementById('scroll-right');

if (scrollContainer && scrollLeftBtn && scrollRightBtn) {
    scrollLeftBtn.addEventListener('click', () => scrollContainer.scrollBy({ left: -400, behavior: 'smooth' }));
    scrollRightBtn.addEventListener('click', () => scrollContainer.scrollBy({ left: 400, behavior: 'smooth' }));
}

/* ===== 6. GSAP Animations ===== */
gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
    const kineticWords = document.querySelectorAll('.kinetic-word');
    if (kineticWords.length > 0) {
        gsap.set(kineticWords, { opacity: 0, y: 60, rotationX: -90, scale: 0.5, transformPerspective: 1000 });
        kineticWords.forEach((word, i) => {
            gsap.to(word, { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 1.2, delay: 0.5 + (i * 0.15), ease: 'back.out(1.7)', clearProps: 'transform' });
        });
    }
    window.addEventListener('languageChanged', () => {
        setTimeout(() => {
            const newWords = document.querySelectorAll('.kinetic-word');
            gsap.set(newWords, { opacity: 0, y: 60, rotationX: -90, scale: 0.5, transformPerspective: 1000 });
            newWords.forEach((word, i) => {
                gsap.to(word, { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 1.2, delay: i * 0.15, ease: 'back.out(1.7)', clearProps: 'transform' });
            });
        }, 50);
    });
});

const revealText = document.querySelector('.reveal-text');
const revealImage = document.querySelector('.reveal-image');
if (revealText || revealImage) {
    const tl = gsap.timeline();
    if (revealText) tl.from('.reveal-text', { x: -50, opacity: 0, duration: 1.5, ease: 'power3.out' });
    if (revealImage) tl.from('.reveal-image', { x: 50, opacity: 0, duration: 1.5, ease: 'power3.out' }, '-=1.2');
}

const floatingElements = gsap.utils.toArray('.floating-element:not(.constrained-image)');
if (floatingElements.length > 0) {
    floatingElements.forEach((el, i) => {
        const speed = parseFloat(el.getAttribute('data-speed')) || 0.5;
        const rect = el.getBoundingClientRect();
        const xDir = rect.left < window.innerWidth / 2 ? -1 : 1;
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        gsap.to(el, {
            y: maxScroll * (0.8 + speed * 0.4), x: xDir * 50 * speed,
            rotation: i % 2 === 0 ? 180 : -180, ease: 'none',
            scrollTrigger: { trigger: 'body', start: 'top top', end: 'bottom bottom', scrub: 0.5 }
        });
    });
}

const aboutTextReveal = document.querySelector('.about-text-reveal');
if (aboutTextReveal) {
    gsap.from(aboutTextReveal, {
        x: 200, opacity: 0, duration: 3, ease: 'power1.out',
        scrollTrigger: { trigger: '#o-nama', start: 'top 85%', end: 'top 15%', scrub: 2, toggleActions: 'play none none reverse' }
    });
}

gsap.utils.toArray('.scroll-fade-up').forEach(el => {
    gsap.from(el, { y: 60, opacity: 0, duration: 1, ease: 'power2.out', scrollTrigger: { trigger: el, start: 'top 85%', end: 'top 60%', toggleActions: 'play none none reverse' } });
});

gsap.utils.toArray('.scroll-image-left').forEach(el => {
    gsap.from(el, { x: -100, opacity: 0, duration: 1.2, ease: 'power3.out', scrollTrigger: { trigger: el, start: 'top 80%', toggleActions: 'play none none reverse' } });
});

gsap.utils.toArray('.scroll-image-right').forEach(el => {
    gsap.from(el, { x: 100, opacity: 0, duration: 1.2, ease: 'power3.out', scrollTrigger: { trigger: el, start: 'top 80%', toggleActions: 'play none none reverse' } });
});

gsap.utils.toArray('.scroll-scale-up').forEach((el, i) => {
    gsap.from(el, { scale: 0.8, opacity: 0, duration: 0.8, delay: i * 0.1, ease: 'back.out(1.7)', scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none reverse' } });
});

document.querySelectorAll('#ponuda .grid').forEach(container => {
    const items = container.querySelectorAll('.scroll-stagger-item');
    if (items.length > 0) {
        gsap.from(items, { y: 80, opacity: 0, duration: 0.8, stagger: 0.15, ease: 'power2.out', scrollTrigger: { trigger: container, start: 'top 75%', toggleActions: 'play none none reverse' } });
    }
});

const pancakesText = document.querySelector('.pancakes-text-reveal');
if (pancakesText) {
    gsap.from(pancakesText, { x: -120, opacity: 0, duration: 1.5, ease: 'power2.out', scrollTrigger: { trigger: '#palacinke', start: 'top 70%', toggleActions: 'play none none reverse' } });
}

const pancakesImage = document.querySelector('.pancakes-image-reveal');
if (pancakesImage) {
    gsap.from(pancakesImage, { x: 120, opacity: 0, rotation: 10, duration: 1.5, ease: 'power2.out', scrollTrigger: { trigger: '#palacinke', start: 'top 70%', toggleActions: 'play none none reverse' } });
}

const pancakeItems = gsap.utils.toArray('.pancake-item');
if (pancakeItems.length > 0) {
    gsap.from(pancakeItems, { x: -50, opacity: 0, duration: 0.6, stagger: 0.2, ease: 'back.out(1.7)', scrollTrigger: { trigger: '.pancakes-list', start: 'top 80%', toggleActions: 'play none none reverse' } });
}

gsap.utils.toArray('.constrained-image').forEach((el, i) => {
    gsap.set(el, { autoAlpha: 0 });
    ScrollTrigger.create({
        trigger: '#ponuda', start: 'top bottom', endTrigger: '#dostava', end: 'center top',
        onToggle: self => { gsap.to(el, { autoAlpha: self.isActive ? 1 : 0, duration: 0.5, overwrite: true }); }
    });
    const speed = parseFloat(el.getAttribute('data-speed')) || 0.5;
    gsap.to(el, { y: 100 * speed, rotation: i % 2 === 0 ? 15 : -15, ease: 'none', scrollTrigger: { trigger: '#ponuda', start: 'top bottom', endTrigger: '#dostava', end: 'bottom top', scrub: 1 } });
});

gsap.utils.toArray('.reveal-up').forEach(elem => {
    gsap.from(elem, { scrollTrigger: { trigger: elem, start: 'top 85%' }, y: 60, opacity: 0, duration: 1, ease: 'power2.out' });
});

/* ===== 7. Mobile Menu ===== */
(function () {
    var mobileMenuBtn = document.getElementById('mobile-menu-btn');
    var mobileMenu = document.getElementById('mobile-menu');
    var mobileLinks = document.querySelectorAll('.mobile-link');
    var hamburgerIcon = document.getElementById('hamburger-icon');
    var closeIcon = document.getElementById('close-icon');

    if (!mobileMenuBtn || !mobileMenu) return;

    function toggleMobileMenu() {
        var isOpen = !mobileMenu.classList.contains('translate-x-full');
        mobileMenu.classList.toggle('translate-x-full');
        document.body.classList.toggle('overflow-hidden');
        mobileMenuBtn.setAttribute('aria-expanded', String(!isOpen));
        if (isOpen) {
            if (hamburgerIcon) hamburgerIcon.classList.remove('hidden');
            if (closeIcon) closeIcon.classList.add('hidden');
        } else {
            if (hamburgerIcon) hamburgerIcon.classList.add('hidden');
            if (closeIcon) closeIcon.classList.remove('hidden');
        }
    }

    window.aromaToggleMenu = toggleMobileMenu;
    mobileMenuBtn.addEventListener('click', toggleMobileMenu);
    mobileLinks.forEach(function (link) {
        link.addEventListener('click', toggleMobileMenu);
    });
})();

/* ===== 8. Email Deobfuscation ===== */
document.querySelectorAll('.email-link').forEach(el => {
    const email = el.dataset.user + '@' + el.dataset.domain + '.' + el.dataset.tld;
    const link = document.createElement('a');
    link.href = 'mailto:' + email;
    link.textContent = email;
    link.className = 'hover:text-aroma-gold transition-colors';
    const parent = el.parentElement;
    if (parent && parent.classList.contains('flex')) {
        parent.replaceChild(link, el);
    } else {
        el.replaceWith(link);
    }
});

/* ===== 9. Image Protection ===== */
(function () {
    'use strict';

    document.addEventListener('contextmenu', function (e) {
        if (e.target.tagName === 'IMG') { e.preventDefault(); return false; }
    }, false);

    document.addEventListener('dragstart', function (e) {
        if (e.target.tagName === 'IMG') { e.preventDefault(); return false; }
    }, false);

    document.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 's') { e.preventDefault(); return false; }
    }, false);

    const imgObserver = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            mutation.addedNodes.forEach(function (node) {
                if (node.tagName === 'IMG') {
                    node.addEventListener('contextmenu', function (e) { e.preventDefault(); });
                    node.addEventListener('dragstart', function (e) { e.preventDefault(); });
                }
            });
        });
    });
    imgObserver.observe(document.body, { childList: true, subtree: true });

    document.querySelectorAll('img').forEach(function (img) {
        img.addEventListener('selectstart', function (e) { e.preventDefault(); return false; });
        img.setAttribute('draggable', 'false');
        img.ondragstart = function () { return false; };
    });

    console.log('%c\u26A0\uFE0F UPOZORENJE / WARNING', 'color: #ff0000; font-size: 24px; font-weight: bold;');
    console.log(
        '%cSve slike na ovoj stranici su za\u0161ti\u0107ene autorskim pravima ICstudio.\nNeovla\u0161teno preuzimanje, kopiranje ili distribucija je zabranjena.\n\nAll images on this page are copyrighted by ICstudio.\nUnauthorized download, copying, or distribution is prohibited.',
        'color: #c5a059; font-size: 14px; line-height: 1.6;'
    );
})();

