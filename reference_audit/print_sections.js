import fs from 'fs';

const comps = JSON.parse(fs.readFileSync('e:/Hari OM Bites/reference_audit/components.json', 'utf8'));
const qD = comps.find(c => c.name === 'qD');
const JD = comps.find(c => c.name === 'JD');
const XD = comps.find(c => c.name === 'XD');
const $D = comps.find(c => c.name === '$D');
const zD = comps.find(c => c.name === 'zD');

console.log('=== qD (STORY) ===');
console.log(qD ? qD.code : 'Not found');

console.log('\n=== JD (SELECTION) ===');
console.log(JD ? JD.code : 'Not found');

console.log('\n=== XD (MENU PREVIEW) ===');
console.log(XD ? XD.code : 'Not found');

console.log('\n=== $D (VISIT) ===');
console.log($D ? $D.code : 'Not found');

console.log('\n=== zD (FOOTER) ===');
console.log(zD ? zD.code : 'Not found');
