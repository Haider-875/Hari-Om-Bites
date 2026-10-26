const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/app_code.js', 'utf8');

const funcRegex = /function\s+([A-Za-z0-9_$]+)\s*\(([^)]*)\)\s*\{/g;
let match;
const funcs = [];
while ((match = funcRegex.exec(code)) !== null) {
  funcs.push({ name: match[1], params: match[2], index: match.index });
}

const results = [];
funcs.forEach((fn, idx) => {
  const nextIdx = idx + 1 < funcs.length ? funcs[idx + 1].index : code.length;
  const body = code.substring(fn.index, nextIdx);
  results.push({
    name: fn.name,
    params: fn.params,
    length: body.length,
    code: body
  });
});

fs.writeFileSync('e:/Hari OM Bites/reference_audit/components.json', JSON.stringify(results, null, 2), 'utf8');
console.log('Successfully saved', results.length, 'components to components.json');
