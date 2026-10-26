const fs = require('fs');

const css = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.css', 'utf8');

console.log('CSS length:', css.length);

// Find color variables and custom root properties
const rootVars = [...css.matchAll(/--[A-Za-z0-9_-]+:\s*[^;]+;/g)].map(m => m[0]);
console.log('Root variables:');
console.log([...new Set(rootVars)]);

// Find custom utility classes like dashed-row, label-caps, saffron, ember, terracotta, paper, ink
const customClasses = [...css.matchAll(/\.([a-zA-Z0-9_-]+)\s*\{([^}]+)\}/g)]
  .filter(m => m[1].includes('saffron') || m[1].includes('terracotta') || m[1].includes('ember') || m[1].includes('paper') || m[1].includes('ink') || m[1].includes('dashed') || m[1].includes('caps') || m[1].includes('display'));

console.log('\nCustom class definitions:');
customClasses.forEach(c => console.log(`.${c[1]} { ${c[2].trim()} }`));
