const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/app_code.js', 'utf8');

// Find all functions in app_code.js
const funcRegex = /function\s+([A-Za-z0-9_$]+)\s*\(([^)]*)\)\s*\{/g;
let match;
const funcs = [];
while ((match = funcRegex.exec(code)) !== null) {
  funcs.push({ name: match[1], params: match[2], index: match.index });
}

funcs.forEach((fn, idx) => {
  const nextIdx = idx + 1 < funcs.length ? funcs[idx + 1].index : code.length;
  const body = code.substring(fn.index, nextIdx);
  console.log(`\n============================= FUNCTION: ${fn.name}(${fn.params}) =============================`);
  console.log(body.substring(0, 3000));
});
