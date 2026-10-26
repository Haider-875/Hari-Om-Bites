const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/app_code.js', 'utf8');

const compNames = [
  'RD', 'zD', 'VD', 'UD', 'qD', 'JD', 'XD', 'QD', '$D', 'eO', 'tO', 'nO', 'rO', 'iO', 'aO', 'sO', 'lO'
];

compNames.forEach(name => {
  const funcStart = code.indexOf(`function ${name}(`);
  if (funcStart !== -1) {
    // find next function or end
    let nextStart = code.length;
    compNames.forEach(other => {
      if (other !== name) {
        const p = code.indexOf(`function ${other}(`, funcStart + 5);
        if (p !== -1 && p < nextStart) {
          nextStart = p;
        }
      }
    });
    console.log(`\n================== COMPONENT ${name} ==================`);
    console.log(code.substring(funcStart, Math.min(funcStart + 2500, nextStart)));
  }
});
