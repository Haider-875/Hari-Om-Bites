import fs from 'fs';

const homeHtml = fs.readFileSync('./reference_audit/home_page.html', 'utf8');

// Split by sections / header / footer
function extractBlock(tag, startKeyword, endKeyword) {
    const idx = homeHtml.indexOf(startKeyword);
    if (idx === -1) return '';
    const endIdx = endKeyword ? homeHtml.indexOf(endKeyword, idx) : homeHtml.indexOf(`</${tag}>`, idx) + tag.length + 3;
    return homeHtml.substring(idx, endIdx);
}

// 1. Header
console.log('=== HEADER ===');
const header = homeHtml.substring(homeHtml.indexOf('<header'), homeHtml.indexOf('</header>') + 9);
fs.writeFileSync('./reference_audit/ref_header.html', header);
console.log('Header written, length:', header.length);

// 2. Hero
console.log('=== HERO ===');
const heroStart = homeHtml.indexOf('<section class="relative isolate flex min-h-[100svh]');
const heroEnd = homeHtml.indexOf('</section>', heroStart) + 10;
const hero = homeHtml.substring(heroStart, heroEnd);
fs.writeFileSync('./reference_audit/ref_hero.html', hero);
console.log('Hero written, length:', hero.length);

// 3. Story
console.log('=== STORY ===');
const storyStart = homeHtml.indexOf('id="story"');
const storySectionStart = homeHtml.lastIndexOf('<section', storyStart);
const storySectionEnd = homeHtml.indexOf('</section>', storyStart) + 10;
const story = homeHtml.substring(storySectionStart, storySectionEnd);
fs.writeFileSync('./reference_audit/ref_story.html', story);
console.log('Story written, length:', story.length);

// 4. Chef's selection
console.log('=== CHEF SELECTION ===');
const chefStart = homeHtml.indexOf('id="selection"');
const chefSectionStart = homeHtml.lastIndexOf('<section', chefStart);
const chefSectionEnd = homeHtml.indexOf('</section>', chefStart) + 10;
const chef = homeHtml.substring(chefSectionStart, chefSectionEnd);
fs.writeFileSync('./reference_audit/ref_chef.html', chef);
console.log('Chef written, length:', chef.length);

// 5. Menu preview
console.log('=== MENU PREVIEW ===');
const menuPrevStart = homeHtml.indexOf('id="menu"');
const menuPrevSectionStart = homeHtml.lastIndexOf('<section', menuPrevStart);
const menuPrevSectionEnd = homeHtml.indexOf('</section>', menuPrevStart) + 10;
const menuPrev = homeHtml.substring(menuPrevSectionStart, menuPrevSectionEnd);
fs.writeFileSync('./reference_audit/ref_menu_preview.html', menuPrev);
console.log('Menu preview written, length:', menuPrev.length);

// 6. Experience
console.log('=== EXPERIENCE ===');
const expStart = homeHtml.indexOf('id="experience"');
const expSectionStart = homeHtml.lastIndexOf('<section', expStart);
const expSectionEnd = homeHtml.indexOf('</section>', expStart) + 10;
const exp = homeHtml.substring(expSectionStart, expSectionEnd);
fs.writeFileSync('./reference_audit/ref_experience.html', exp);
console.log('Experience written, length:', exp.length);

// 7. Visit
console.log('=== VISIT ===');
const visitStart = homeHtml.indexOf('id="visit"');
const visitSectionStart = homeHtml.lastIndexOf('<section', visitStart);
const visitSectionEnd = homeHtml.indexOf('</section>', visitStart) + 10;
const visit = homeHtml.substring(visitSectionStart, visitSectionEnd);
fs.writeFileSync('./reference_audit/ref_visit.html', visit);
console.log('Visit written, length:', visit.length);

// 8. Footer
console.log('=== FOOTER ===');
const footerStart = homeHtml.indexOf('<footer');
const footerEnd = homeHtml.indexOf('</footer>') + 9;
const footer = homeHtml.substring(footerStart, footerEnd);
fs.writeFileSync('./reference_audit/ref_footer.html', footer);
console.log('Footer written, length:', footer.length);
