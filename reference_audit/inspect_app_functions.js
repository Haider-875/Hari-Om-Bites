const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/app_code.js', 'utf8');

// Find all function declarations / components
const functions = [...code.matchAll(/function\s+([A-Za-z0-9_$]+)\s*\(([^)]*)\)/g)];
console.log('Functions found:');
functions.forEach(f => {
  console.log(`- ${f[1]}(${f[2]})`);
});

// Find all string literals that look like section titles, labels, buttons, or headers
const strings = [...code.matchAll(/[`"']([^`"'\n]{3,80})[`"']/g)]
  .map(m => m[1].trim())
  .filter(s => !s.startsWith('http') && !s.includes('class') && !s.includes('svg') && !s.includes('path') && s.length > 3);

console.log('\nSample UI Strings:');
const uniqueStrings = [...new Set(strings)];
fs.writeFileSync('e:/Hari OM Bites/reference_audit/unique_strings.json', JSON.stringify(uniqueStrings, null, 2));
console.log(uniqueStrings.slice(0, 60));
