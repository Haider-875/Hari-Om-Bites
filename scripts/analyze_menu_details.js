import fs from 'fs';

const menuHtml = fs.readFileSync('./reference_audit/menu_page.html', 'utf8');

// 1. Header & Hero of Menu page
const heroIdx = menuHtml.indexOf('<section');
const stickyIdx = menuHtml.indexOf('sticky', heroIdx);
const heroHtml = menuHtml.substring(heroIdx, stickyIdx);
fs.writeFileSync('./reference_audit/menu_hero.html', heroHtml);
console.log('Saved menu_hero.html, len:', heroHtml.length);

// 2. Sticky search and categories
const firstCatSecIdx = menuHtml.indexOf('<section id="');
const stickyHtml = menuHtml.substring(stickyIdx - 50, firstCatSecIdx);
fs.writeFileSync('./reference_audit/menu_sticky.html', stickyHtml);
console.log('Saved menu_sticky.html, len:', stickyHtml.length);

// 3. First Category Section (Appetizers)
const secondCatSecIdx = menuHtml.indexOf('<section id="soups"');
const firstCatHtml = menuHtml.substring(firstCatSecIdx, secondCatSecIdx);
fs.writeFileSync('./reference_audit/menu_appetizers.html', firstCatHtml);
console.log('Saved menu_appetizers.html, len:', firstCatHtml.length);

// 4. Wine section
const wineIdx = menuHtml.indexOf('<section id="wine"');
const beerIdx = menuHtml.indexOf('<section id="beer"');
const wineHtml = menuHtml.substring(wineIdx, beerIdx);
fs.writeFileSync('./reference_audit/menu_wine.html', wineHtml);
console.log('Saved menu_wine.html, len:', wineHtml.length);

// 5. Beer section
const footerIdx = menuHtml.indexOf('<footer');
const beerHtml = menuHtml.substring(beerIdx, footerIdx);
fs.writeFileSync('./reference_audit/menu_beer.html', beerHtml);
console.log('Saved menu_beer.html, len:', beerHtml.length);
