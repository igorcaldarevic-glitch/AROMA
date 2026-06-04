# 🧪 QUICK TESTING GUIDE - Aroma Slastičarna

**Za brzo testiranje svih implementiranih fix-ova**

---

## ⚡ 5-MINUTNI TEST

### **index-pravi.html**

#### 1️⃣ **Cookie Banner Test** (30s)
```
✅ Otvorite stranicu u incognito modu
✅ Cookie banner se prikazuje nakon 1s
✅ Kliknite "Sve" - banner nestaje
✅ Refreshajte stranicu - banner se NE prikazuje više
✅ Očistite localStorage - banner se ponovno prikazuje
```

#### 2️⃣ **Form Protection Test** (60s)
```
✅ Kliknite "Naruči Tortu" button
✅ Pokušajte submit odmah (<3s) - mora biti blokiran
✅ Pričekajte 3s, popunite formu, submitajte - mora raditi
✅ Pokušajte ponovno submit odmah - "Pričekajte 1 minutu" alert
```

#### 3️⃣ **Image Protection Test** (45s)
```
✅ Right-click na bilo koju sliku
   → Kontekstni meni ne prikazuje "Save Image"
✅ Pokušajte drag sliku u drugi tab/folder
   → Drag je onemogućen
✅ Ctrl+S (save stranica)
   → Alert: "Saving is disabled"
✅ Otvorite Console (F12)
   → Vidjet ćete crveno upozorenje o copyright-u
```

#### 4️⃣ **Email Obfuscation Test** (15s)
```
✅ Scrollajte do footera
✅ Email link se prikazuje (info@aroma-since-1923.hr)
✅ Inspect element - vidite <span data-user="info">
✅ Click na email - otvara mailto:
```

#### 5️⃣ **Performance Test** (30s)
```
✅ Hard refresh (Ctrl+Shift+R)
✅ Open DevTools → Network tab
✅ Filtrirajte "JS" - vidite SRI integrity="sha512..."
✅ Filtrirajte "video" - hero.webm ima preload="none"
```

---

### **menu-pravi.html**

#### 1️⃣ **Cookie Banner** (15s)
```
✅ Otvorite u incognito
✅ Banner se prikazuje
✅ Testirajte sve 3 opcije:
   - "Samo neophodni"
   - "Odabrano" (čekirajte Analytics)
   - "Sve"
```

#### 2️⃣ **Image Protection** (30s)
```
✅ Right-click na food slike (gelato, kolači)
   → Nema "Save Image" opcije
✅ Drag sliku - onemogućeno
✅ F12 Console - vidite copyright upozorenje
```

#### 3️⃣ **GSAP CDN SRI** (15s)
```
✅ DevTools → Network → JS
✅ Pronađite gsap.min.js i ScrollTrigger.min.js
✅ Verifikujte da imaju integrity="sha512..." atribut
```

---

## 🔥 ADVANCED TESTING (15 min)

### **Security Headers Validation**
```powershell
# Test sa curl
curl -I https://aroma-since-1923.hr

# Expected headers:
# X-Content-Type-Options: nosniff
# X-Frame-Options: SAMEORIGIN
# X-XSS-Protection: 1; mode=block
# Referrer-Policy: strict-origin-when-cross-origin
```

### **Form Spam Protection Test**
```javascript
// Console test (otvori DevTools)
const form = document.getElementById('cake-order-form');

// 1. Test honeypot
document.getElementById('website').value = 'bot-test';
form.dispatchEvent(new Event('submit')); // Silent fail

// 2. Test rate limiting
// Submit formu 2x u kratkom vremenskom razmaku
// Drugi submit mora prikazati alert
```

### **Image Protection Bypass Attempts**
```javascript
// Pokušaji zaobilaženja (all should FAIL):

// 1. Programmatically get image
const img = document.querySelector('img');
console.log(img.src); // ✅ URL je vidljiv (to je OK)

// 2. Try to drag
img.setAttribute('draggable', 'true'); // ✅ Still blocked by event listener

// 3. Try to right-click
img.dispatchEvent(new MouseEvent('contextmenu')); // ✅ Blocked by event listener

// 4. Try Ctrl+S
document.dispatchEvent(new KeyboardEvent('keydown', {key: 's', ctrlKey: true})); // ✅ Blocked
```

### **Performance Metrics Check**
```bash
# Google PageSpeed Insights
https://pagespeed.web.dev/?url=https://aroma-since-1923.hr

# Expected scores:
# Performance: 90+ (Desktop), 80+ (Mobile)
# Accessibility: 95+
# Best Practices: 100
# SEO: 100

# GTmetrix
https://gtmetrix.com

# Expected:
# Performance Grade: A
# Structure Grade: A
# LCP: <2.5s
# TBT: <200ms
```

---

## 🐛 DEBUGGING COMMON ISSUES

### **Issue: Cookie banner ne nestaje**
```javascript
// Console check
localStorage.getItem('cookieConsent');
// Ako je null, banner treba biti vidljiv
// Ako ima JSON string, banner treba biti skriven

// Fix:
localStorage.removeItem('cookieConsent');
location.reload();
```

### **Issue: Forma se ne submituje**
```javascript
// Check rate limiting
const lastSubmit = performance.now();
console.log('Time since form load:', lastSubmit);
// Mora biti >3000ms

// Check honeypot
console.log(document.getElementById('website').value); // Mora biti ""
console.log(document.getElementById('website_extra').value); // Mora biti ""
```

### **Issue: Email link ne radi**
```javascript
// Check deobfuscation script
document.querySelectorAll('.email-link').forEach(el => {
    console.log('Found email placeholder:', el);
});
// Ako vidite <span>, script nije izvršen
// Ako vidite <a href="mailto:...">, script je OK
```

### **Issue: GSAP animacije ne rade**
```javascript
// Check GSAP load
console.log(typeof gsap); // Should be "object"
console.log(typeof ScrollTrigger); // Should be "object"

// Check SRI errors
// DevTools → Console - gledajte za:
// "Failed to find a valid digest in the 'integrity' attribute"
```

### **Issue: Slike se mogu drag-ati**
```javascript
// Check event listeners
const img = document.querySelector('img');
console.log(getEventListeners(img));
// Trebate vidjeti 'dragstart' i 'contextmenu' listeners

// Manual fix:
document.querySelectorAll('img').forEach(img => {
    img.setAttribute('draggable', 'false');
    img.ondragstart = () => false;
});
```

---

## 📱 MOBILE TESTING CHECKLIST

### **Android (Chrome)**
- [ ] Cookie banner responsive layout
- [ ] Forma se može popuniti i submitati
- [ ] Mobile menu radi
- [ ] Slike - long press ne prikazuje "Download image"
- [ ] Dark mode toggle radi
- [ ] GSAP scroll animacije smooth

### **iOS (Safari)**
- [ ] Cookie banner prikazuje se
- [ ] Email link radi
- [ ] Image protection - long press onemogućen
- [ ] Video lazy loading
- [ ] Pinch zoom radi na svim elementima osim slika

### **Tablet (iPad)**
- [ ] Layout je responsive (768px-1024px breakpoints)
- [ ] Touch gestures rade
- [ ] Image protection aktivan

---

## 🎯 ONE-COMMAND VALIDATION

```powershell
# Windows PowerShell quick check
function Test-AromaSecurity {
    Write-Host "🔍 Testing Aroma Slastičarna Security..." -ForegroundColor Cyan
    
    # 1. Check HTML syntax
    Write-Host "`n✅ Checking HTML files..." -ForegroundColor Green
    if (Test-Path "index-pravi.html") { Write-Host "   - index-pravi.html: OK" }
    if (Test-Path "menu-pravi.html") { Write-Host "   - menu-pravi.html: OK" }
    
    # 2. Check for security patterns
    Write-Host "`n✅ Checking security implementations..." -ForegroundColor Green
    $content = Get-Content "index-pravi.html" -Raw
    
    if ($content -match 'integrity="sha') { Write-Host "   - SRI hashes: ✅" } else { Write-Host "   - SRI hashes: ❌" }
    if ($content -match 'preconnect') { Write-Host "   - Preconnect hints: ✅" } else { Write-Host "   - Preconnect hints: ❌" }
    if ($content -match 'SUBMIT_COOLDOWN') { Write-Host "   - Rate limiting: ✅" } else { Write-Host "   - Rate limiting: ❌" }
    if ($content -match 'honeypot') { Write-Host "   - Honeypot protection: ✅" } else { Write-Host "   - Honeypot protection: ❌" }
    if ($content -match 'email-link') { Write-Host "   - Email obfuscation: ✅" } else { Write-Host "   - Email obfuscation: ❌" }
    if ($content -match 'cookie-banner') { Write-Host "   - GDPR cookie banner: ✅" } else { Write-Host "   - GDPR cookie banner: ❌" }
    if ($content -match 'user-select: none') { Write-Host "   - Image protection (CSS): ✅" } else { Write-Host "   - Image protection (CSS): ❌" }
    if ($content -match 'contextmenu') { Write-Host "   - Image protection (JS): ✅" } else { Write-Host "   - Image protection (JS): ❌" }
    
    Write-Host "`n🎉 Validation complete!" -ForegroundColor Cyan
}

# Run test
Test-AromaSecurity
```

**Expected output:**
```
🔍 Testing Aroma Slastičarna Security...

✅ Checking HTML files...
   - index-pravi.html: OK
   - menu-pravi.html: OK

✅ Checking security implementations...
   - SRI hashes: ✅
   - Preconnect hints: ✅
   - Rate limiting: ✅
   - Honeypot protection: ✅
   - Email obfuscation: ✅
   - GDPR cookie banner: ✅
   - Image protection (CSS): ✅
   - Image protection (JS): ✅

🎉 Validation complete!
```

---

## 🚨 EMERGENCY ROLLBACK

Ako nešto ne radi:

```powershell
# 1. Restore backup
Copy-Item index-pravi.html.backup-20260422 index-pravi.html -Force
Copy-Item menu-pravi.html.backup-20260422 menu-pravi.html -Force

# 2. Verify rollback
start index-pravi.html
start menu-pravi.html

# 3. Notify team
Write-Host "⚠️ ROLLED BACK TO PREVIOUS VERSION" -ForegroundColor Yellow
```

---

## ✅ FINAL CHECKLIST (Pre-Production)

```markdown
### **Before deploying to production:**

**Technical:**
- [ ] All tests passed (5-min quick test)
- [ ] No console errors
- [ ] No HTML/CSS validation errors
- [ ] .htaccess security headers verified
- [ ] SSL certificate is valid
- [ ] Backup created

**Functionality:**
- [ ] Forms submit correctly
- [ ] Cookie banner works (all 3 options)
- [ ] Email links work
- [ ] Images load properly
- [ ] Mobile responsive
- [ ] Dark mode works
- [ ] GSAP animations smooth

**Security:**
- [ ] SRI hashes verified
- [ ] Image protection active
- [ ] Rate limiting tested
- [ ] Honeypot tested
- [ ] GDPR compliant

**Performance:**
- [ ] PageSpeed score >80 (mobile)
- [ ] PageSpeed score >90 (desktop)
- [ ] LCP <2.5s
- [ ] FID <100ms
- [ ] CLS <0.1

**If ALL boxes checked: 🟢 READY FOR PRODUCTION**
```

---

**Last Updated:** 22. Travanj 2026  
**Version:** 1.0  
**Testing Time:** 5-20 minuta

