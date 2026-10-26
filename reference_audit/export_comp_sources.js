import fs from 'fs';

const comps = JSON.parse(fs.readFileSync('e:/Hari OM Bites/reference_audit/components.json', 'utf8'));

const compMap = {};
comps.forEach(c => compMap[c.name] = c);

['RD', 'zD', 'VD', 'UD', 'qD', 'JD', 'XD', 'QD', '$D', 'rO', 'iO', 'aO', 'sO'].forEach(name => {
  if (compMap[name]) {
    fs.writeFileSync(`e:/Hari OM Bites/reference_audit/comp_${name}.txt`, compMap[name].code);
    console.log(`Saved comp_${name}.txt (${compMap[name].length} bytes)`);
  }
});
