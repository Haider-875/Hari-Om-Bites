const fs = require('fs');
const doc = fs.readFileSync('reference_audit/home_page.html', 'utf8');

const expIdx = doc.indexOf('id="experience"');
const visitIdx = doc.indexOf('id="visit"');
const footerIdx = doc.indexOf('<footer');

console.log('=== EXPERIENCE ===');
console.log(doc.substring(expIdx - 30, visitIdx - 20));

console.log('=== VISIT ===');
console.log(doc.substring(visitIdx - 30, footerIdx - 20));

console.log('=== FOOTER ===');
console.log(doc.substring(footerIdx));
