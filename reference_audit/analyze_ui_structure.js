const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.js', 'utf8');

// Let's find all JSX / HTML tags rendered and headings
const textMatches = [...code.matchAll(/>([^<>{}\n]+)</g)].map(m => m[1].trim()).filter(t => t.length > 2);
console.log('Unique UI text snippets count:', new Set(textMatches).size);

// Save unique texts
fs.writeFileSync('e:/Hari OM Bites/reference_audit/ui_texts.json', JSON.stringify([...new Set(textMatches)], null, 2));

// Let's inspect the main components in the app
// Search for component definitions or return (0,
console.log('Sample texts:');
console.log([...new Set(textMatches)].slice(0, 50));
