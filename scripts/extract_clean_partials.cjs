const fs = require('fs');
const doc = fs.readFileSync('reference_audit/home_page.html', 'utf8');

const footerIdx = doc.indexOf('<footer');
const endFooter = doc.indexOf('</footer>') + 9;
fs.writeFileSync('reference_audit/ref_footer_clean.html', doc.substring(footerIdx, endFooter));

const visitIdx = doc.indexOf('id="visit"');
const visitSectionStart = doc.lastIndexOf('<section', visitIdx);
const visitSectionEnd = doc.indexOf('</section>', visitIdx) + 10;
fs.writeFileSync('reference_audit/ref_visit_clean.html', doc.substring(visitSectionStart, visitSectionEnd));

const expIdx = doc.indexOf('id="experience"');
const expSectionStart = doc.lastIndexOf('<section', expIdx);
const expSectionEnd = doc.indexOf('</section>', expIdx) + 10;
fs.writeFileSync('reference_audit/ref_experience_clean.html', doc.substring(expSectionStart, expSectionEnd));

console.log('Clean components extracted.');
