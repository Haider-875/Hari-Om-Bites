import puppeteer from 'puppeteer-core';
import fs from 'fs';

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';

async function run() {
    const browser = await puppeteer.launch({
        executablePath: chromePath,
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox']
    });

    const page = await browser.newPage();
    await page.setViewport({ width: 1440, height: 900 });
    await page.goto('https://hari-om-bites.base44.app/menu', { waitUntil: 'networkidle2' });

    const html = await page.evaluate(() => {
        // Return main element or body innerHTML
        const main = document.querySelector('main') || document.body;
        return main.innerHTML;
    });

    fs.writeFileSync('./reference_audit/menu_page.html', html, 'utf8');
    console.log('Saved menu_page.html, size:', html.length);

    await page.goto('https://hari-om-bites.base44.app/', { waitUntil: 'networkidle2' });
    const homeHtml = await page.evaluate(() => {
        const main = document.querySelector('main') || document.body;
        return main.innerHTML;
    });
    fs.writeFileSync('./reference_audit/home_page.html', homeHtml, 'utf8');
    console.log('Saved home_page.html, size:', homeHtml.length);

    await browser.close();
}

run().catch(console.error);
