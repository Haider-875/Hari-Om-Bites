const data = require('./extracted_data.js');

console.log('=== RESTAURANT INFO ===');
console.log(data.restaurant);

console.log('\n=== MENU CATEGORIES ===');
data.menu.forEach((cat, idx) => {
  console.log(`${idx + 1}. [${cat.id}] ${cat.name} (${cat.items ? cat.items.length : 0} items) - Tagline: ${cat.tagline || ''}`);
});

console.log('\n=== IMAGES KEYS ===');
console.log(Object.keys(data.images));

// Check total items across categories
let total = 0;
data.menu.forEach(c => {
  if (c.items) total += c.items.length;
});
console.log('Total menu items:', total);
