const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.js', 'utf8');

// Find all occurrences of JSX / component names or sections
// Let's search for navigation, header, hero, about, reviews, hours, etc.

const searchTerms = [
  'header',
  'navbar',
  'navigation',
  'hero',
  'about',
  'story',
  'welcome',
  'culture',
  'gallery',
  'review',
  'testimonial',
  'hours',
  'timing',
  'open',
  'location',
  'contact',
  'cart',
  'modal',
  'drawer',
  'order',
  'checkout',
  'filter',
  'search'
];

searchTerms.forEach(term => {
  const re = new RegExp(`["'\`][^"'\`]*${term}[^"'\`]*["'\`]`, 'gi');
  const matches = [...code.matchAll(re)].map(m => m[0]).slice(0, 5);
  console.log(`\n--- Matches for "${term}" (${matches.length}) ---`);
  matches.forEach(m => console.log(' ', m.substring(0, 100)));
});
