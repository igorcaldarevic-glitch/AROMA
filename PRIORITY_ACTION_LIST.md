# 🚨 PRIORITIZIRANA AKCIJSKA LISTA - PRODUKCIJA

## ⚠️ KRITIČNO - Prije Go-Live (2-4 sata)

### 1. CSP Policy Hardening ⏱️ 1h
**Status:** ❌ Kritičan sigurnosni rizik  
**Akcija:** Zamijeniti `'unsafe-inline'` sa nonce atributima

**Koraci:**
1. Generirati random nonce za svaki page load
2. Dodati nonce na sve `<script>` i `<style>` tagove
3. Ažurirati CSP meta tag

**Kod za implementaciju:**
```html
<!-- U <head> - generirati server-side -->
<?php $nonce = base64_encode(random_bytes(16)); ?>

<!-- CSP meta tag -->
<meta http-equiv="Content-Security-Policy"
    content="default-src 'self'; 
    script-src 'self' 'nonce-<?php echo $nonce; ?>' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com; 
    style-src 'self' 'nonce-<?php echo $nonce; ?>' https://cdn.tailwindcss.com;">

<!-- Na svaki inline script -->
<script nonce="<?php echo $nonce; ?>">
    (function () {
        const theme = localStorage.getItem('theme');
        // ...
    })();
</script>
```

---

### 2. Subresource Integrity (SRI) ⏱️ 30min
**Status:** ❌ CDN hijacking rizik  
**Akcija:** Dodati SRI hash-ove

**Koraci:**
```bash
# 1. Generirati hash za Tailwind
curl https://cdn.tailwindcss.com | openssl dgst -sha384 -binary | openssl base64 -A

# 2. Generirati hash za GSAP
curl https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js | openssl dgst -sha384 -binary | openssl base64 -A

# 3. Generirati hash za ScrollTrigger
curl https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js | openssl dgst -sha384 -binary | openssl base64 -A
```

**Implementacija:**
```html
<script src="https://cdn.tailwindcss.com" 
    integrity="sha384-GENERATED_HASH_HERE" 
    crossorigin="anonymous"></script>

<script defer 
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
    integrity="sha384-GENERATED_HASH_HERE"
    crossorigin="anonymous"></script>
```

---

### 3. Form Spam Protection ⏱️ 1.5h
**Status:** ⚠️ Trenutno slaba zaštita  
**Akcija:** Enhanced honeypot + rate limiting

**Kod:**
```javascript
// 1. Rate Limiting
const SUBMIT_COOLDOWN = 60000; // 1 min
let lastSubmit = 0;

orderForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Check cooldown
    const now = Date.now();
    if (now - lastSubmit < SUBMIT_COOLDOWN) {
        alert('Molimo pričekajte 1 minutu prije ponovnog slanja.');
        return;
    }
    
    // Honeypot check
    if (document.getElementById('website').value !== '') {
        return; // Silent fail for bots
    }
    
    // Timestamp check (anti-bot)
    const formLoadTime = parseInt(document.getElementById('_form_load_time').value);
    if (now - formLoadTime < 3000) {
        return; // Too fast, likely a bot
    }
    
    // Rest of form logic...
    lastSubmit = now;
});

// 2. Hidden timestamp field
document.addEventListener('DOMContentLoaded', () => {
    const timestamp = document.createElement('input');
    timestamp.type = 'hidden';
    timestamp.name = '_form_load_time';
    timestamp.id = '_form_load_time';
    timestamp.value = Date.now();
    orderForm.appendChild(timestamp);
});
```

**HTML dodati u formu:**
```html
<!-- Enhanced honeypot -->
<div style="position:absolute;left:-5000px;" aria-hidden="true">
    <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
    <input type="text" name="phone_extra" tabindex="-1" autocomplete="off">
</div>
```

---

### 4. Email/Phone Obfuscation ⏱️ 30min
**Status:** ⚠️ Scraping rizik  
**Akcija:** JavaScript obfuskacija

**Kod:**
```html
<!-- Zamijeniti -->
<a href="mailto:info@aroma-since-1923.hr">info@aroma-since-1923.hr</a>

<!-- Sa -->
<span class="email-link" 
      data-u="info" 
      data-d="aroma-since-1923.hr">
    [Klikni za email]
</span>

<script>
document.querySelectorAll('.email-link').forEach(el => {
    const email = el.dataset.u + '@' + el.dataset.d;
    const link = document.createElement('a');
    link.href = 'mailto:' + email;
    link.textContent = email;
    link.className = 'hover:text-aroma-gold transition-colors';
    el.replaceWith(link);
});
</script>
```

---

## 🔶 VISOKI PRIORITET - Prije Marketing Push (4-6 sati)

### 5. GDPR Cookie Consent Upgrade ⏱️ 2h
**Status:** ⚠️ Trenutno ne-compliant  
**Akcija:** Granularno pristajanje

**Implementacija:** Vidi SECURITY_FIXES.md §5

---

### 6. Production Build - Tailwind ⏱️ 1h
**Status:** ⚠️ CDN dependency  
**Akcija:** Build lokalno

**Koraci:**
```bash
# 1. Build Tailwind
npm run build:css

# 2. U HTML zamijeniti:
<!-- Staro -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Novo -->
<link rel="stylesheet" href="tailwind.min.css">

# 3. Ukloniti inline Tailwind config
```

---

### 7. Server Security Headers ⏱️ 30min
**Status:** ❌ Nedostaje  
**Akcija:** Konfigurisati .htaccess

**Fajl:** Kreirano `.htaccess-production` sa svim headerima

**Testiranje:**
```bash
# Nakon deploy-a testirati:
curl -I https://www.aroma-since-1923.hr

# Ili online:
# https://securityheaders.com/?q=aroma-since-1923.hr
```

---

### 8. Image Optimization ⏱️ 2h
**Status:** ⚠️ Neke slike nisu optimizirane  
**Akcija:** Kompresija + lazy loading

**Koraci:**
```bash
# 1. Instalirati optimizacijske alate
npm install --save-dev imagemin imagemin-webp imagemin-mozjpeg

# 2. Kreirati build script
node scripts/optimize-images.js

# 3. Provjeriti sve slike imaju loading="lazy"
grep -r 'img src' index-pravi.html | grep -v 'loading="lazy"'
```

**Script (optimize-images.js):**
```javascript
const imagemin = require('imagemin');
const imageminWebp = require('imagemin-webp');
const imageminMozjpeg = require('imagemin-mozjpeg');

(async () => {
    await imagemin(['images/**/*.{jpg,jpeg,png}'], {
        destination: 'images/optimized',
        plugins: [
            imageminMozjpeg({ quality: 85 }),
            imageminWebp({ quality: 85 })
        ]
    });
    console.log('✅ Images optimized!');
})();
```

---

## 🟡 SREDNJI PRIORITET - Post-Launch Optimizacija (6-8 sati)

### 9. JavaScript Refactoring ⏱️ 4h
**Status:** 🔄 Maintainability issue  
**Akcija:** Izdvojiti inline JS u externe fajlove

**Struktura:**
```
/js
  ├── main.js (initialize all modules)
  ├── theme.js (dark mode toggle)
  ├── menu.js (mobile menu)
  ├── modals.js (cake modal, order modal)
  ├── forms.js (validation, submission)
  ├── animations.js (GSAP)
  └── cookies.js (consent banner)
```

---

### 10. Analytics Setup (GDPR-compliant) ⏱️ 2h
**Status:** ❌ Nedostaje tracking  
**Akcija:** Google Analytics 4 + consent mode

**Kod:**
```html
<script>
// Load samo ako korisnik pristane
function loadAnalytics() {
    const consent = JSON.parse(localStorage.getItem('cookieConsent') || '{}');
    
    if (consent.analytics) {
        // GA4
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-XXXXXX');
        
        gtag('consent', 'update', {
            'analytics_storage': 'granted'
        });
    }
}

// Init nakon consent-a
if (localStorage.getItem('cookieConsent')) {
    loadAnalytics();
}
</script>
```

---

### 11. Error Monitoring ⏱️ 1h
**Status:** ❌ Nema tracking grešaka  
**Akcija:** Sentry ili LogRocket

**Setup:**
```html
<script src="https://browser.sentry-cdn.com/7.x.x/bundle.min.js"></script>
<script>
    Sentry.init({
        dsn: 'YOUR_DSN',
        environment: 'production',
        beforeSend(event, hint) {
            // Ne slati PII podatke
            if (event.request) {
                delete event.request.cookies;
            }
            return event;
        }
    });
</script>
```

---

### 12. Backup Strategy ⏱️ 1h
**Status:** ❌ Nedostaje  
**Akcija:** Automatski backup

**Opcije:**
1. **cPanel Backup** (automatski)
2. **Git deployment** sa staging/production branch
3. **rsync script:**

```bash
#!/bin/bash
# backup.sh

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups"
SOURCE="/var/www/aroma-since-1923.hr"

# Full backup
tar -czf "$BACKUP_DIR/aroma_backup_$DATE.tar.gz" "$SOURCE"

# Keep only last 7 days
find "$BACKUP_DIR" -name "aroma_backup_*.tar.gz" -mtime +7 -delete

echo "✅ Backup completed: aroma_backup_$DATE.tar.gz"
```

**Cron job:**
```bash
# Svaki dan u 2 AM
0 2 * * * /path/to/backup.sh
```

---

## 🟢 NISKI PRIORITET - Continuous Improvement

### 13. PWA (Progressive Web App) ⏱️ 4h
**Status:** ❌ Nije implementirano  
**Benefit:** Offline pristup, install prompt

---

### 14. Internationalization (i18n) Refactoring ⏱️ 6h
**Status:** 🔄 Trenutno ručno  
**Benefit:** Lakše održavanje

---

### 15. A/B Testing Setup ⏱️ 3h
**Status:** ❌ Nedostaje  
**Benefit:** Optimizacija konverzija

---

## 📊 TRACKING & TESTIRANJE

### Pre-Deployment Tests
```bash
# 1. Security Scan
https://securityheaders.com/?q=aroma-since-1923.hr
https://observatory.mozilla.org/analyze/aroma-since-1923.hr

# 2. Performance
https://pagespeed.web.dev/
https://gtmetrix.com

# 3. GDPR Compliance
https://www.cookieyes.com/free-cookie-checker/

# 4. SSL Certificate
https://www.ssllabs.com/ssltest/analyze.html?d=aroma-since-1923.hr

# 5. Accessibility
https://wave.webaim.org/
```

### Post-Deployment Monitoring
```bash
# Weekly checks
- [ ] Error logs review
- [ ] Form submissions check
- [ ] Analytics review
- [ ] Performance metrics
- [ ] Security headers (monthly)
- [ ] SSL certificate expiry (auto-renew check)
```

---

## 📋 QUICK CHECKLIST

```
### PRIJE GO-LIVE (OBAVEZNO):
- [ ] CSP nonce implementiran
- [ ] SRI hash-ovi dodani
- [ ] Form rate limiting
- [ ] Email/phone obfuskacija
- [ ] .htaccess security headers
- [ ] HTTPS force redirect
- [ ] 404 error page
- [ ] robots.txt check
- [ ] Sitemap.xml aktivan
- [ ] Backup strategy

### PREPORUČENO:
- [ ] GDPR cookie consent upgrade
- [ ] Tailwind production build
- [ ] Image optimization
- [ ] JavaScript minifikacija
- [ ] Analytics setup
- [ ] Error monitoring (Sentry)

### NICE TO HAVE:
- [ ] PWA manifest
- [ ] Service Worker
- [ ] Code splitting
- [ ] CDN setup (Cloudflare)
```

---

## ⏱️ TIMELINE PROCJENA

| Faza | Trajanje | Kompletan do |
|------|----------|--------------|
| **Kritični fixes** | 2-4h | End of Day 1 |
| **Visoki prioritet** | 4-6h | End of Day 2 |
| **Srednji prioritet** | 6-8h | End of Week 1 |
| **Niski prioritet** | Rolling | Continuous |

---

## 🆘 SUPPORT & RESOURCES

**Dokumentacija:**
- CSP: https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP
- SRI: https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
- GDPR: https://gdpr.eu/cookies/

**Tools:**
- SRI Generator: https://www.srihash.org/
- CSP Evaluator: https://csp-evaluator.withgoogle.com/
- Security Headers: https://securityheaders.com/

**Contacts:**
- Hosting Support: [provider contact]
- SSL Certificate: Let's Encrypt (auto-renew)
- Emergency: [devops contact]

---

**KRAJ PRIORITY LIST**
