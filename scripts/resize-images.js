// resize-images.js
// Resizes oversized images to 2× display resolution, re-exports at q80 WebP
// Originals are kept as *.orig.webp backups

const sharp = require('sharp');
const path  = require('path');
const fs    = require('fs');

const DIR = path.join(__dirname, '../images/webp');

const TASKS = [
    // amblem: 2000×2000 → 384×384 (displays at w-32/w-48 = max 192px CSS, ×2 retina)
    { file: 'amblem.webp',   width: 384,  height: 384  },

    // 1, 2: 1414×2000 → 1260×1782 (lg:col-span-3 ≈ 630px CSS, ×2 retina; keep ratio)
    { file: '1.webp',        width: 1260, height: null  },
    { file: '2.webp',        width: 1260, height: null  },

    // 5: col-span-1 out of 6 ≈ 210–350px CSS depending on viewport → width 840 covers all breakpoints ×2
    { file: '5.webp',        width: 840,  height: null  },

    // aroma-in: already small (382×510). Re-export at q80 to reduce file size; keep dimensions
    { file: 'aroma-in.webp', width: 382,  height: null  },
];

async function run() {
    for (const t of TASKS) {
        const src  = path.join(DIR, t.file);
        const bak  = src.replace('.webp', '.orig.webp');

        // Backup original once
        if (!fs.existsSync(bak)) {
            fs.copyFileSync(src, bak);
            console.log(`Backed up → ${path.basename(bak)}`);
        }

        const meta = await sharp(src).metadata();
        console.log(`\n${t.file}: ${meta.width}×${meta.height} → target w=${t.width}`);

        const resized = sharp(bak)       // always process from backup
            .resize(t.width, t.height, { fit: 'inside', withoutEnlargement: true });

        await resized
            .webp({ quality: 80, effort: 6 })
            .toFile(src + '.tmp');

        // Atomic replace (Windows safe: copyFile then unlink)
        fs.copyFileSync(src + '.tmp', src);
        fs.unlinkSync(src + '.tmp');

        const newMeta = await sharp(src).metadata();
        const newSize = (fs.statSync(src).size / 1024).toFixed(1);
        const oldSize = (fs.statSync(bak).size / 1024).toFixed(1);
        console.log(`  ${meta.width}×${meta.height} ${oldSize} KiB  →  ${newMeta.width}×${newMeta.height} ${newSize} KiB  (−${(100*(1-newSize/oldSize)).toFixed(0)}%)`);
    }
    console.log('\nDone. Originals saved as *.orig.webp');
}

run().catch(err => { console.error(err); process.exit(1); });
