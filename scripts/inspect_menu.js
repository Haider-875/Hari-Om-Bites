import puppeteer from 'puppeteer-core';

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';

async function inspectMenu() {
    const browser = await puppeteer.launch({
        executablePath: chromePath,
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox']
    });

    const page = await browser.newPage();
    await page.setViewport({ width: 1440, height: 900 });
    await page.goto('https://hari-om-bites.base44.app/menu', { waitUntil: 'networkidle2' });

    const menuData = await page.evaluate(() => {
        // Find hero section
        const hero = document.querySelector('section');
        const heroHtml = hero ? hero.outerHTML : null;

        // Find search / filter bar
        const stickyBar = document.querySelector('[class*="sticky"]');
        const stickyHtml = stickyBar ? stickyBar.outerHTML : null;

        // Find first category section
        const firstCategory = document.querySelector('[id="appetizers"]') || document.querySelectorAll('section')[1];
        const catHtml = firstCategory ? firstCategory.outerHTML : null;

        // Find protein banner and bottom banner
        const allSections = Array.from(document.querySelectorAll('section, div')).map(el => {
            if (el.innerText && el.innerText.includes('Hungry yet')) {
                return { type: 'hungry_banner', html: el.outerHTML };
            }
            if (el.innerText && el.innerText.includes('CHOOSE YOUR PROTEIN')) {
                return { type: 'protein_banner', html: el.outerHTML };
            }
            return null;
        }).filter(Boolean);

        return {
            heroHtml: heroHtml ? heroHtml.substring(0, 1000) : null,
            stickyHtml: stickyHtml ? stickyHtml.substring(0, 1500) : null,
            catHtml: catHtml ? catHtml.substring(0, 1500) : null,
            banners: allSections
        };
    });

    console.log(JSON.stringify(menuData, null, 2));
    await browser.close();
}

inspectMenu().catch(console.error);
