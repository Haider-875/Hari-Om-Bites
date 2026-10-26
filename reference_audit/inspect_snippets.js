const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.js', 'utf8');

// Let's find the restaurant info object and menu data array
// Search around "Cuisine Of India"
const idx = code.indexOf('Cuisine Of India');
console.log('Snippet around Cuisine Of India:');
console.log(code.substring(idx - 300, idx + 1200));

// Find pD=[{id:`appetizers` or similar
const menuIdx = code.indexOf('id:`appetizers`');
console.log('\nSnippet around appetizers:');
console.log(code.substring(menuIdx - 100, menuIdx + 1500));
