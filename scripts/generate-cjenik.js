#!/usr/bin/env node
/**
 * Generates the machine-readable price list (cjenik.xml / cjenik.csv)
 * required by NN 101/2026 ("Odluka o objavi cjenika proizvoda i usluga
 * kao mjera izravne kontrole cijena"), in force from 1.10.2026.
 *
 * Source of truth is menuData embedded in menu.html (Croatian block).
 * Run: npm run build:cjenik
 *
 * Outputs:
 *   - cjenik.xml / cjenik.csv   (stable, always-current — this is what
 *     should be linked from the site / crawled by inspectors' tools)
 *   - cjenici-arhiva/cjenik_<timestamp>.xml/.csv (dated snapshot, kept
 *     for the 30-day retention requirement; older snapshots pruned
 *     automatically on each run)
 *
 * NOTE: exact XML/CSV schema is not yet finalized in official guidance
 * (HOK's own instructions say so). Field choices below follow the
 * "Obavezni podaci za usluge" list from NN 101/2026 + the NIRS/HOK
 * practical guides: naziv usluge, MPC, sidrena cijena, oznaka posebne
 * prodaje. Adjust here if official technical spec is published later.
 */
const fs = require('fs');
const path = require('path');
const { extractMenuData } = require('./extract-menu-data');

const ROOT = path.join(__dirname, '..');
const MENU_HTML = path.join(ROOT, 'menu.html');

const BUSINESS = {
  naziv: 'Slastičarna Aroma',
  vrstaProdajnogMjesta: 'Ugostiteljski objekt',
  adresa: 'Trg Ivane Brlić-Mažuranić 6, 35000 Slavonski Brod',
  oznakaObjekta: 'AROMA-01',
  brojSkladista: '01',
};

const ANCHOR_DATE = '2026-09-10';
const ARCHIVE_RETENTION_DAYS = 30;

function money(str) {
  // "1,90 €" -> "1.90"
  const m = String(str).match(/([\d.,]+)/);
  if (!m) return '';
  return m[1].replace(/\./g, '').replace(',', '.');
}

function xmlEscape(str) {
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&apos;');
}

function csvEscape(str) {
  const s = String(str ?? '');
  if (/[;"\n]/.test(s)) return '"' + s.replace(/"/g, '""') + '"';
  return s;
}

function collectServices(menuData) {
  const hr = menuData.hr;
  const categories = ['topli-napici', 'bezalkoholna-pica', 'smoothie', 'kolaci', 'palacinke', 'sladoled'];
  const catLabel = {
    'topli-napici': hr.category_hot_drinks,
    'bezalkoholna-pica': hr.category_soft_drinks,
    'smoothie': hr.category_smoothie,
    'kolaci': hr.category_pastries,
    'palacinke': hr.category_pancakes,
    'sladoled': hr.category_icecream,
  };
  const rows = [];
  for (const cat of categories) {
    const items = hr[cat];
    if (!Array.isArray(items)) continue;
    for (const item of items) {
      rows.push({
        kategorija: catLabel[cat] || cat,
        naziv: item.name,
        mpc: money(item.price),
        sidrenaCijena: money(item.anchorPrice),
        sidrenaDatum: ANCHOR_DATE,
        posebnaProdaja: '',
      });
    }
  }
  return rows;
}

function buildXml(rows, generatedAt) {
  const header =
    `<?xml version="1.0" encoding="UTF-8"?>\n` +
    `<cjenik datum_generiranja="${generatedAt}" ` +
    `poslovni_subjekt="${xmlEscape(BUSINESS.naziv)}" ` +
    `vrsta_prodajnog_mjesta="${xmlEscape(BUSINESS.vrstaProdajnogMjesta)}" ` +
    `adresa="${xmlEscape(BUSINESS.adresa)}" ` +
    `oznaka_objekta="${xmlEscape(BUSINESS.oznakaObjekta)}" ` +
    `broj_skladista="${xmlEscape(BUSINESS.brojSkladista)}">\n`;
  const body = rows
    .map(
      (r) =>
        `  <usluga>\n` +
        `    <kategorija>${xmlEscape(r.kategorija)}</kategorija>\n` +
        `    <naziv>${xmlEscape(r.naziv)}</naziv>\n` +
        `    <mpc valuta="EUR">${r.mpc}</mpc>\n` +
        `    <sidrena_cijena valuta="EUR" datum="${r.sidrenaDatum}">${r.sidrenaCijena}</sidrena_cijena>\n` +
        `    <posebna_prodaja>${xmlEscape(r.posebnaProdaja)}</posebna_prodaja>\n` +
        `  </usluga>\n`
    )
    .join('');
  return header + body + `</cjenik>\n`;
}

function buildCsv(rows) {
  const header = ['kategorija', 'naziv', 'mpc', 'valuta', 'sidrena_cijena', 'sidrena_cijena_datum', 'posebna_prodaja'].join(';');
  const lines = rows.map((r) =>
    [r.kategorija, r.naziv, r.mpc, 'EUR', r.sidrenaCijena, r.sidrenaDatum, r.posebnaProdaja].map(csvEscape).join(';')
  );
  return [header, ...lines].join('\n') + '\n';
}

function pruneArchive(archiveDir) {
  if (!fs.existsSync(archiveDir)) return;
  const cutoff = Date.now() - ARCHIVE_RETENTION_DAYS * 24 * 60 * 60 * 1000;
  for (const f of fs.readdirSync(archiveDir)) {
    const full = path.join(archiveDir, f);
    const stat = fs.statSync(full);
    if (stat.isFile() && stat.mtimeMs < cutoff) fs.unlinkSync(full);
  }
}

function main() {
  const menuData = extractMenuData(MENU_HTML);
  const rows = collectServices(menuData);

  const now = new Date();
  const generatedAt = now.toISOString();
  const stamp = generatedAt.replace(/[:.]/g, '-');

  const xml = buildXml(rows, generatedAt);
  const csv = buildCsv(rows);

  fs.writeFileSync(path.join(ROOT, 'cjenik.xml'), xml, 'utf-8');
  fs.writeFileSync(path.join(ROOT, 'cjenik.csv'), csv, 'utf-8');

  const archiveDir = path.join(ROOT, 'cjenici-arhiva');
  fs.mkdirSync(archiveDir, { recursive: true });
  fs.writeFileSync(path.join(archiveDir, `cjenik_${stamp}.xml`), xml, 'utf-8');
  fs.writeFileSync(path.join(archiveDir, `cjenik_${stamp}.csv`), csv, 'utf-8');
  pruneArchive(archiveDir);

  console.log(`OK: ${rows.length} stavki upisano u cjenik.xml / cjenik.csv (+ arhiva ${stamp}).`);
}

main();
