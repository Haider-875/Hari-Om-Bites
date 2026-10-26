const fs = require('fs');
const doc = fs.readFileSync('reference_audit/menu_page_full_doc.html', 'utf8');
const beerIdx = doc.indexOf('id="beer"');
console.log(doc.substring(beerIdx, beerIdx + 2500));
