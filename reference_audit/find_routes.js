const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/app_code.js', 'utf8');

// Find cO definition
const cOIndex = code.indexOf('function cO(');
if (cOIndex !== -1) {
  console.log('cO function:');
  console.log(code.substring(cOIndex, cOIndex + 2500));
}

// Find route paths in code
const routeMatches = [...code.matchAll(/path\s*:\s*[`"']([^`"']+)`|element\s*:\s*\(/g)];
console.log('Route hints:', routeMatches);

// Find <Route or Routes or createBrowserRouter
const routeDefs = [...code.matchAll(/path:\s*[`"']([^`"']+)`|to:\s*[`"']([^`"']+)`/g)];
console.log('Paths / Links in code:');
console.log([...new Set(routeDefs.map(m => m[1] || m[2]))]);
