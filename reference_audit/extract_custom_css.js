const fs = require('fs');

const css = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.css', 'utf8');

// Find all keyframes
const keyframes = [...css.matchAll(/@keyframes\s+([a-zA-Z0-9_-]+)\s*\{([^}]+)\}/g)];
console.log('Keyframes:');
keyframes.forEach(k => console.log(`@keyframes ${k[1]} { ${k[2].trim()} }`));

// Find rules mentioning dashed-row, label-caps, saffron, ember, terracotta, paper, ink
const matches = [...css.matchAll(/([^{}]+)\{([^{}]+label-caps[^{}]*|[^{}]+dashed-row[^{}]*|[^{}]+saffron[^{}]*|[^{}]+paper[^{}]*)\}/gi)];
matches.slice(0, 20).forEach(m => console.log(m[0]));
