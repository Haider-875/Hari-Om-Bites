import puppeteer from 'puppeteer-core';
import path from 'path';

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const outputDir = path.resolve('./public/audit');

const viewports = [
    { name: 'desktop', width: 1440, height: 900 },
    { name: 'mobile', width: 390, height: 844 }
];

async function run() {
    const browser = await puppeteer.launch({
        executablePath: chromePath,
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox']
    });

    const page = await browser.newPage();

    for (const vp of viewports) {
        await page.setViewport({ width: vp.width, height: vp.height, deviceScaleFactor: 1 });

        // Local Home
        console.log(`Recapturing local_home [${vp.name}]...`);
        await page.goto('http://127.0.0.1:8000/', { waitUntil: 'networkidle2' });
        await new Promise(r => setTimeout(r, 2000));
        await page.screenshot({ path: path.join(outputDir, `local_home_${vp.name}_fold.png`), fullPage: false });
        await page.screenshot({ path: path.join(outputDir, `local_home_${vp.name}_full.png`), fullPage: true });

        // Local Menu
        console.log(`Recapturing local_menu [${vp.name}]...`);
        await page.goto('http://127.0.0.1:8000/menu', { waitUntil: 'networkidle2' });
        await new Promise(r => setTimeout(r, 2500));
        await page.screenshot({ path: path.join(outputDir, `local_menu_${vp.name}_fold.png`), fullPage: false });
        await page.screenshot({ path: path.join(outputDir, `local_menu_${vp.name}_full.png`), fullPage: true });
    }

    console.log('Recapture complete!');
    await browser.close();
}

run().catch(console.error);
