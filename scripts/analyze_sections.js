import fs from 'fs';

const homeHtml = fs.readFileSync('./reference_audit/home_page.html', 'utf8');
const menuHtml = fs.readFileSync('./reference_audit/menu_page.html', 'utf8');

console.log('--- HOME SECTIONS ---');
const homeMatches = [...homeHtml.matchAll(/<(section|header|nav|footer)[^>]*class="([^"]*)"[^>]*>/g)];
homeMatches.forEach(m => console.log(m[1], ':', m[2]));

console.log('\n--- MENU SECTIONS ---');
const menuMatches = [...menuHtml.matchAll(/<(section|header|nav|footer)[^>]*class="([^"]*)"[^>]*>/g)];
menuMatches.forEach(m => console.log(m[1], ':', m[2]));
