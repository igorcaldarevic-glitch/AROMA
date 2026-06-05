// optimize-papira.js
// Crops minimal seamless tile from papira.png (2679x2679)
// and exports as WebP + AVIF for use in image-set()

const sharp = require('sharp');
const path = require('path');
const fs = require('fs');

const SRC = path.join(__dirname, '../images/papira.png');
const OUT_DIR = path.join(__dirname, '../images/webp');

async function main() {
    const meta = await sharp(SRC).metadata();
    console.log(`Source: ${meta.width}x${meta.height} px`);

    // ── Option A: crop minimal 1/4 tile (669x669) ──
    const TILE = Math.floor(meta.width / 4); // 669px
    const cropped = sharp(SRC).extract({ left: 0, top: 0, width: TILE, height: TILE });

    const webpTile = path.join(OUT_DIR, 'papira-tile.webp');
    await cropped.clone().webp({ quality: 65, effort: 6 }).toFile(webpTile);
    console.log(`[tile q65] WebP ${TILE}x${TILE}: ${(fs.statSync(webpTile).size/1024).toFixed(1)} KiB`);

    const avifTile = path.join(OUT_DIR, 'papira-tile.avif');
    await cropped.clone().avif({ quality: 50, effort: 7 }).toFile(avifTile);
    console.log(`[tile q50] AVIF ${TILE}x${TILE}: ${(fs.statSync(avifTile).size/1024).toFixed(1)} KiB`);

    // ── Option B: resize full image to 500x500 (guaranteed seamless, same CSS) ──
    const resized = sharp(SRC).resize(500, 500);

    const webpFull = path.join(OUT_DIR, 'papira-500.webp');
    await resized.clone().webp({ quality: 65, effort: 6 }).toFile(webpFull);
    console.log(`[full q65] WebP 500x500: ${(fs.statSync(webpFull).size/1024).toFixed(1)} KiB`);

    const avifFull = path.join(OUT_DIR, 'papira-500.avif');
    await resized.clone().avif({ quality: 50, effort: 7 }).toFile(avifFull);
    console.log(`[full q50] AVIF 500x500: ${(fs.statSync(avifFull).size/1024).toFixed(1)} KiB`);

    const cssSize = Math.round(500 * TILE / meta.width);
    console.log(`\nCSS for tile variant: background-size: ${cssSize}px`);
    console.log(`CSS for full 500px variant: background-size: 500px (unchanged)`);
}

main().catch(err => { console.error(err); process.exit(1); });
