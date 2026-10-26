const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.js', 'utf8');

console.log('Total length of JS:', code.length);

// Find routes
const routeMatches = [...code.matchAll(/path\s*:\s*["']([^"']+)["']/g)];
console.log('Routes found:', [...new Set(routeMatches.map(m => m[1]))]);

// Find image URLs
const imgMatches = [...code.matchAll(/https?:\/\/[^"'\s)]+\.(?:png|jpg|jpeg|webp|svg)/gi)];
console.log('Unique Image URLs count:', new Set(imgMatches.map(m => m[0])).size);
console.log('Sample Image URLs:', [...new Set(imgMatches.map(m => m[0]))].slice(0, 15));

// Find phone numbers, emails, addresses
const phones = [...code.matchAll(/\+?1?[-.\s]?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}/g)];
console.log('Phone numbers:', [...new Set(phones.map(m => m[0]))]);

// Find strings matching titles / sections
const headings = [...code.matchAll(/(?:Authentic|Flavors|Cuisine|Tandoor|Biryani|Curry|Appetizer|Dessert|Beverage|Bread|Vegetarian|Chicken|Lamb|Seafood|Fairbanks|Cushman)[^"'\n<>]{3,50}/gi)];
console.log('Sample matching texts:', [...new Set(headings.map(m => m[0]))].slice(0, 20));
