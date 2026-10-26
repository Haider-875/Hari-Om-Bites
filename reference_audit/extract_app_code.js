const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.js', 'utf8');

const appCodeStart = code.indexOf('var fD=');
const appCode = code.substring(appCodeStart);

console.log('App code start index:', appCodeStart);
console.log('App code total length:', appCode.length);

fs.writeFileSync('e:/Hari OM Bites/reference_audit/app_code.js', appCode);

// Also let's run prettier or js-beautify or format it so we can read it easily!
