const fs = require('fs');
const doc = fs.readFileSync('reference_audit/menu_page_full_doc.html', 'utf8');
const appetizersIdx = doc.indexOf('id="appetizers"');
const start = doc.indexOf('<header');
console.log(doc.substring(start, appetizersIdx));
