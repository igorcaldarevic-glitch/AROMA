// Extracts the `menuData` object literal straight out of menu.html without
// executing the rest of the page's JS (which needs a real DOM).
// Used by scripts/generate-cjenik.js. Keep this file in sync if the
// "const menuData = {" declaration in menu.html ever moves/renames.
const fs = require('fs');
const path = require('path');

function extractMenuData(menuHtmlPath) {
  const html = fs.readFileSync(menuHtmlPath, 'utf-8');
  const marker = 'const menuData = ';
  const start = html.indexOf(marker);
  if (start === -1) throw new Error('Could not find "const menuData = " in ' + menuHtmlPath);

  let i = start + marker.length;
  // find opening brace
  while (html[i] !== '{') i++;
  const objStart = i;

  let depth = 0;
  let inString = null; // ' or " or `
  let escaped = false;
  for (; i < html.length; i++) {
    const ch = html[i];
    if (inString) {
      if (escaped) { escaped = false; }
      else if (ch === '\\') { escaped = true; }
      else if (ch === inString) { inString = null; }
      continue;
    }
    if (ch === '"' || ch === "'" || ch === '`') { inString = ch; continue; }
    if (ch === '{') depth++;
    else if (ch === '}') {
      depth--;
      if (depth === 0) { i++; break; }
    }
  }
  const objLiteral = html.slice(objStart, i);
  // eslint-disable-next-line no-new-func
  const menuData = new Function('return (' + objLiteral + ')')();
  return menuData;
}

module.exports = { extractMenuData };

if (require.main === module) {
  const target = process.argv[2] || path.join(__dirname, '..', 'menu.html');
  const md = extractMenuData(target);
  console.log('languages:', Object.keys(md));
  let total = 0, missingAnchor = 0;
  for (const lang of Object.keys(md)) {
    for (const cat of Object.keys(md[lang])) {
      const val = md[lang][cat];
      if (!Array.isArray(val)) continue;
      for (const item of val) {
        total++;
        if (item.anchorPrice === undefined) missingAnchor++;
      }
    }
  }
  console.log('total items:', total, 'missing anchorPrice:', missingAnchor);
  console.log('sample:', JSON.stringify(md.hr['topli-napici'][0]));
}
