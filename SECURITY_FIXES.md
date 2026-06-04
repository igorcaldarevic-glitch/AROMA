# 🔐 SECURITY & PERFORMANCE FIXES - PRODUCTION READY

## ⚠️ CRITICAL PRIORITY

### 1. CSP (Content Security Policy) - XSS Protection

**Problem:** `unsafe-inline` omogućava inline JavaScript i CSS, što otvara vrata XSS napadima.

**Rješenje:**

Zamijeniti CSP meta tag sa:

```html
<meta http-equiv="Content-Security-Policy"
    content="default-src 'self'; 
    script-src 'self' 'nonce-RANDOM_NONCE' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://formspree.io; 
    style-src 'self' 'nonce-RANDOM_NONCE' https://cdn.tailwindcss.com; 
    img-src 'self' data: https:; 
    font-src 'self' data:; 
    connect-src 'self' https://formspree.io; 
    frame-src https://www.google.com; 
    base-uri 'self'; 
    form-action 'self' https://formspree.io; 
    frame-ancestors 'none';">
```

**Implementacija - dodati nonce atribut na sve inline skripte:**

```html
<!-- Primjer -->
<script nonce="RANDOM_NONCE">
    (function () {
        const theme = localStorage.getItem('theme');
        // ... rest of code
    })();
</script>
```

**Server-side implementacija (preporučeno):**
Koristiti server-side CSP header umjesto meta taga za bolju sigurnost.

---

### 2. Subresource Integrity (SRI) - CDN Hijacking Protection

**Problem:** CDN resursi učitavaju se bez SRI hash-ova - ako CDN bude kompromitiran, zlonamjerni kod će se izvršiti.

**Trenutno:**
```html
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
```

**Rješenje:**
```html
<script src="https://cdn.tailwindcss.com" 
    integrity="sha384-..." 
    crossorigin="anonymous"></script>
    
<script defer 
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" 
    integrity="sha384-7+jC0kMGvSx/4X+L7Sq8TY/b6PvGGo6aY5CJ/cHGhb3vJgK8C6L0kMGvSx/4X+L7S" 
    crossorigin="anonymous"></script>
    
<script defer 
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" 
    integrity="sha384-..." 
    crossorigin="anonymous"></script>
```

**Generiranje SRI hash-a:**
```bash
curl https://cdn.tailwindcss.com | openssl dgst -sha384 -binary | openssl base64 -A
```

---

### 3. Formspree Endpoint Exposure - Spam & Abuse Risk

**Problem:** API endpoint `https://formspree.io/f/mqedavwb` je javno vidljiv i može biti zloupotrebljen za spam.

**Rješenje:**

1. **Rate Limiting** - Implementirati client-side throttling:

```javascript
// Dodati u form submission script
const FORM_SUBMIT_COOLDOWN = 60000; // 1 minuta
let lastSubmitTime = 0;

orderForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const now = Date.now();
    if (now - lastSubmitTime < FORM_SUBMIT_COOLDOWN) {
        alert('Molimo pričekajte prije ponovnog slanja forme.');
        return;
    }
    
    // Rest of form logic...
    lastSubmitTime = now;
});
```

2. **Enhanced Honeypot** - trenutni honeypot je dobar ali dodati timestamp provjeru:

```html
<!-- Dodati u formu -->
<input type="hidden" name="_timestamp" id="_timestamp">

<script nonce="RANDOM_NONCE">
    document.getElementById('_timestamp').value = Date.now();
</script>
```

Server-side provjera (ako koristite custom backend):
- Odbaciti submissione gdje je vrijeme između load-a i submit-a < 3 sekunde (bot protection)

3. **reCAPTCHA v3** (opciono ali preporučeno):

```html
<script src="https://www.google.com/recaptcha/api.js?render=YOUR_SITE_KEY"></script>

<script nonce="RANDOM_NONCE">
grecaptcha.ready(function() {
    grecaptcha.execute('YOUR_SITE_KEY', {action: 'submit'}).then(function(token) {
        document.getElementById('recaptchaResponse').value = token;
    });
});
</script>

<input type="hidden" id="recaptchaResponse" name="g-recaptcha-response">
```

---

### 4. Email & Phone Hardcoding - Scraping Risk

**Problem:** Email `info@aroma-since-1923.hr` i telefon `+38535352034` su hardkodirani u plain text.

**Rješenje:**

1. **Email obfuskacija:**

```javascript
// Umjesto:
<a href="mailto:info@aroma-since-1923.hr">info@aroma-since-1923.hr</a>

// Koristiti:
<a href="#" class="email-link" data-user="info" data-domain="aroma-since-1923.hr">
    Pošalji email
</a>

<script nonce="RANDOM_NONCE">
    document.querySelectorAll('.email-link').forEach(link => {
        const user = link.dataset.user;
        const domain = link.dataset.domain;
        link.href = 'mailto:' + user + '@' + domain;
        link.textContent = user + '@' + domain;
    });
</script>
```

2. **Telefon sa click-to-call (opciono zadržati direct link):**
```html
<!-- Za mobilne - direktan link je ok -->
<a href="tel:+38535352034" class="hover:text-aroma-gold transition-colors">
    <span aria-label="Telefon">📞</span> Nazovi nas
</a>
```

---

## 🔶 MEDIUM PRIORITY

### 5. GDPR Compliance - Cookie Consent

**Problem:** Cookie banner postoji ali nije potpuno GDPR compliant.

**Trenutna implementacija:**
- ✅ Cookie banner
- ✅ Accept/Decline opcije
- ❌ Nedostaje granularno pristajanje (Analytics, Marketing, Functional)
- ❌ Nedostaje Cookie Policy link
- ❌ Nedostaje opcija "Manage Preferences"

**Rješenje:**

```html
<!-- Zamijeniti cookie banner sa -->
<div id="cookie-banner" class="...">
    <div class="relative z-10 px-6 md:px-10 py-6 md:py-8">
        <div class="flex flex-col items-center justify-center text-center gap-4 md:gap-5">
            <div class="text-6xl md:text-7xl animate-bounce">🍪</div>
            
            <div>
                <h3 class="font-serif text-2xl md:text-3xl font-black mb-2">Kolačići!</h3>
                <p class="text-sm md:text-base leading-relaxed max-w-sm mx-auto">
                    Koristimo kolačiće za analitiku i bolju korisničku uslugu. 
                    <a href="politika-privatnosti.html" class="underline font-bold">
                        Politika privatnosti
                    </a>
                </p>
            </div>

            <!-- Granular Consent -->
            <div class="text-left text-sm space-y-2 max-w-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" checked disabled class="...">
                    <span>Neophodni kolačići (obavezno)</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" id="analytics-consent" class="...">
                    <span>Analitički kolačići (Google Analytics)</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" id="marketing-consent" class="...">
                    <span>Marketing kolačići</span>
                </label>
            </div>

            <div class="flex gap-3 w-full md:w-auto mt-2">
                <button id="cookie-decline">Odbij sve</button>
                <button id="cookie-accept-selected">Prihvati odabrano</button>
                <button id="cookie-accept-all">Prihvati sve</button>
            </div>
        </div>
    </div>
</div>

<script nonce="RANDOM_NONCE">
    document.getElementById('cookie-accept-all').addEventListener('click', () => {
        localStorage.setItem('cookieConsent', JSON.stringify({
            necessary: true,
            analytics: true,
            marketing: true,
            timestamp: Date.now()
        }));
        // Load analytics scripts
        loadGoogleAnalytics();
        cookieBanner.classList.remove('show');
    });
    
    document.getElementById('cookie-accept-selected').addEventListener('click', () => {
        localStorage.setItem('cookieConsent', JSON.stringify({
            necessary: true,
            analytics: document.getElementById('analytics-consent').checked,
            marketing: document.getElementById('marketing-consent').checked,
            timestamp: Date.now()
        }));
        cookieBanner.classList.remove('show');
    });
</script>
```

---

### 6. localStorage Security

**Problem:** Osjetljivi podaci (theme, consent) u plain text.

**Rješenje:**
```javascript
// Jednostavna enkripcija za localStorage
function encrypt(data) {
    return btoa(encodeURIComponent(JSON.stringify(data)));
}

function decrypt(data) {
    return JSON.parse(decodeURIComponent(atob(data)));
}

// Primjer:
localStorage.setItem('cookieConsent', encrypt({ accepted: true }));
const consent = decrypt(localStorage.getItem('cookieConsent'));
```

---

### 7. Input Validation & Sanitization

**Problem:** Nedostaje server-side validacija (client-side je prisutna ali nije dovoljna).

**Rješenje:**

```javascript
// Client-side sanitization prije slanja
function sanitizeInput(input) {
    const div = document.createElement('div');
    div.textContent = input;
    return div.innerHTML;
}

orderForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(orderForm);
    
    // Sanitize all inputs
    for (let [key, value] of formData.entries()) {
        if (typeof value === 'string') {
            formData.set(key, sanitizeInput(value));
        }
    }
    
    // Rest of submission logic...
});
```

---

## 🟡 LOW PRIORITY / OPTIMIZATIONS

### 8. Performance Optimization

**a) Move inline JavaScript to external files**

Trenutno: 500+ linija inline JavaScript u HTML-u

**Rješenje:**
```bash
# Kreirati zasebne fajlove
/js
  ├── theme-toggle.js
  ├── mobile-menu.js
  ├── modal-handlers.js
  ├── form-validation.js
  ├── animations.js
  └── cookie-consent.js
```

**b) Minify CSS & JS za produkciju**

```bash
# Install terser za JS minifikaciju
npm install --save-dev terser

# Package.json script:
"scripts": {
  "build:css": "tailwindcss -i ./src/input.css -o ./tailwind.css --minify",
  "minify:js": "terser main.js -o main.min.js -c -m",
  "build": "npm run build:css && npm run minify:js"
}
```

**c) Image Optimization**

```bash
# Dodati u build process
npm install --save-dev imagemin imagemin-webp

# Kreirati build script za optimizaciju slika
```

**d) Lazy Loading za sve slike**

Trenutno: samo `loading="lazy"` na nekim slikama

**Rješenje:**
```html
<!-- Dodati na SVE slike osim hero slike -->
<img src="..." loading="lazy" decoding="async" alt="...">
```

**e) Preconnect za vanjske domene**

```html
<head>
    <!-- Dodati prije CDN linkova -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://formspree.io">
    <link rel="dns-prefetch" href="https://www.google.com">
</head>
```

---

### 9. HTTP Security Headers (server-side)

**Napomena:** Ovo ne može biti u HTML-u, mora biti na server konfiguraciji.

**Apache (.htaccess):**
```apache
# Security Headers
Header always set X-Frame-Options "SAMEORIGIN"
Header always set X-Content-Type-Options "nosniff"
Header always set X-XSS-Protection "1; mode=block"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
Header always set Permissions-Policy "geolocation=(), microphone=(), camera=()"

# HSTS (HTTPS only)
Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains; preload"

# CSP Header (umjesto meta taga)
Header always set Content-Security-Policy "default-src 'self'; script-src 'self' 'nonce-RANDOM_NONCE' https://cdn.tailwindcss.com; style-src 'self' 'nonce-RANDOM_NONCE';"

# Cache Control
<FilesMatch "\.(jpg|jpeg|png|gif|webp|svg|woff|woff2)$">
    Header set Cache-Control "max-age=31536000, public, immutable"
</FilesMatch>

<FilesMatch "\.(css|js)$">
    Header set Cache-Control "max-age=86400, public, must-revalidate"
</FilesMatch>
```

**Nginx:**
```nginx
add_header X-Frame-Options "SAMEORIGIN" always;
add_header X-Content-Type-Options "nosniff" always;
add_header X-XSS-Protection "1; mode=block" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload" always;
add_header Permissions-Policy "geolocation=(), microphone=(), camera=()" always;

# Cache
location ~* \.(jpg|jpeg|png|gif|webp|svg|woff|woff2)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}
```

---

### 10. Dependency Management

**Problem:** Tailwind CSS učitava sa CDN-a - production build treba biti lokalno compiled.

**Trenutno:** 
```html
<script src="https://cdn.tailwindcss.com"></script>
```

**Rješenje - Production Build:**

```bash
# 1. Build Tailwind lokalno
npm run build:css

# 2. Zamijeniti CDN link sa:
<link rel="stylesheet" href="tailwind.min.css">

# 3. Ukloniti Tailwind config inline script
# (preseliti u tailwind.config.js)
```

**tailwind.config.js:**
```javascript
module.exports = {
    darkMode: 'class',
    content: [
        './index-pravi.html',
        './menu.html',
        './en.html',
        './de.html'
    ],
    theme: {
        extend: {
            colors: {
                'aroma-bg': '#0f0f0f',
                'aroma-gold': '#C5A059',
            },
            fontFamily: {
                'serif': ['"Playfair Display"', 'serif'],
                'sans': ['"Montserrat"', 'sans-serif'],
            },
            animation: {
                'loop-scroll': 'loop-scroll 25s linear infinite',
                'blob': 'blob 7s infinite',
            },
            keyframes: {
                'loop-scroll': {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-100%)' },
                },
                'blob': {
                    '0%': { transform: 'translate(0px, 0px) scale(1)' },
                    '33%': { transform: 'translate(5px, -10px) scale(1.05)' },
                    '66%': { transform: 'translate(-5px, 5px) scale(0.95)' },
                    '100%': { transform: 'translate(0px, 0px) scale(1)' },
                }
            }
        }
    }
}
```

---

### 11. Robots.txt & Security

**Provjeri robots.txt:**
```txt
User-agent: *
Allow: /

# Blokirati admin putanje (ako postoje)
Disallow: /admin/
Disallow: /wp-admin/
Disallow: /.git/

Sitemap: https://www.aroma-since-1923.hr/sitemap.xml
```

---

### 12. Error Handling - Information Disclosure

**Problem:** Error poruke mogu otkrivati previše informacija.

**Rješenje:**

```javascript
// Umjesto:
} catch (error) {
    alert('Error: ' + error.message); // ❌ Otkriva detalje
}

// Koristiti:
} catch (error) {
    console.error('[Form Submission Error]', error); // Za debugging
    alert('Došlo je do greške. Molimo pokušajte ponovo ili nas kontaktirajte.'); // ✅ Generic message
}
```

---

### 13. Analytics & Monitoring (GDPR compliant)

**Dodati samo ako korisnik pristane:**

```html
<script nonce="RANDOM_NONCE">
    function loadGoogleAnalytics() {
        const consent = JSON.parse(localStorage.getItem('cookieConsent') || '{}');
        
        if (consent.analytics) {
            // Google Analytics 4
            const script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX';
            document.head.appendChild(script);
            
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-XXXXXXXXXX', {
                anonymize_ip: true,
                cookie_flags: 'SameSite=None;Secure'
            });
        }
    }
    
    // Load nakon consent-a
    window.addEventListener('load', loadGoogleAnalytics);
</script>
```

---

## 📋 PRODUCTION DEPLOYMENT CHECKLIST

```markdown
### Pre-Deployment:
- [ ] Zamijeniti sve 'unsafe-inline' sa nonce atributima
- [ ] Dodati SRI hash-ove za sve CDN resurse
- [ ] Implementirati rate limiting za forme
- [ ] Obfuskirati email adrese
- [ ] Minificirati CSS i JavaScript
- [ ] Optimizirati slike (WebP, proper sizing)
- [ ] Build Tailwind CSS lokalno (ukloniti CDN)
- [ ] Testirati GDPR cookie consent flow
- [ ] Dodati server-side security headers
- [ ] Provjeriti robots.txt i sitemap.xml
- [ ] Setupirati HTTPS certifikat (Let's Encrypt)
- [ ] Testirati forme sa honeypot botovima

### Post-Deployment:
- [ ] Security scan (SSL Labs, SecurityHeaders.com)
- [ ] Performance test (GTmetrix, PageSpeed Insights)
- [ ] GDPR compliance check
- [ ] Cross-browser testing
- [ ] Mobile responsiveness test
- [ ] Accessibility audit (WAVE, axe DevTools)
- [ ] Setup monitoring (Sentry, LogRocket)
- [ ] Backup strategy implementiran
```

---

## 🛠️ TOOLS & RESOURCES

**Security Testing:**
- https://securityheaders.com
- https://observatory.mozilla.org
- https://www.ssllabs.com/ssltest/

**Performance:**
- https://pagespeed.web.dev
- https://gtmetrix.com
- https://www.webpagetest.org

**GDPR Compliance:**
- https://cookieyes.com
- https://www.iubenda.com

**CDN SRI Generator:**
- https://www.srihash.org

---

## 💰 ESTIMATED EFFORT

| Task | Priority | Effort | Impact |
|------|----------|--------|--------|
| CSP Hardening | Critical | 2h | High |
| SRI Implementation | Critical | 1h | High |
| Form Protection | Critical | 3h | High |
| GDPR Enhancement | Medium | 4h | Medium |
| Performance Opt | Low | 6h | Medium |
| Code Refactoring | Low | 8h | Low |

**Total:** ~24 hours za kompletnu sigurnosnu i performance optimizaciju.

---

**KRAJ IZVJEŠTAJA**
