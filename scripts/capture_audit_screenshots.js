import puppeteer from 'puppeteer-core';
import fs from 'fs';
import path from 'path';

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
const outputDir = path.resolve('./public/audit');

if (!fs.existsSync(outputDir)) {
    fs.mkdirSync(outputDir, { recursive: true });
}

const viewports = [
    { name: 'desktop', width: 1440, height: 900 },
    { name: 'mobile', width: 390, height: 844 }
];

async function run() {
    console.log('Launching Chrome from:', chromePath);
    const browser = await puppeteer.launch({
        executablePath: chromePath,
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox', '--disable-web-security']
    });

    const page = await browser.newPage();

    const targets = [
        // Reference site
        { name: 'ref_home', url: 'https://hari-om-bites.base44.app/' },
        { name: 'ref_menu', url: 'https://hari-om-bites.base44.app/menu' },
        // Local Laravel site
        { name: 'local_home', url: 'http://127.0.0.1:8000/' },
        { name: 'local_menu', url: 'http://127.0.0.1:8000/menu' }
    ];

    for (const vp of viewports) {
        await page.setViewport({ width: vp.width, height: vp.height, deviceScaleFactor: 1 });

        for (const target of targets) {
            console.log(`Capturing ${target.name} [${vp.name}]...`);
            try {
                await page.goto(target.url, { waitUntil: 'networkidle2', timeout: 30000 });
                // Brief pause for any fonts or transition stabilizes
                await new Promise(r => setTimeout(r, 1500));
                
                // Capture above-the-fold / viewport screenshot
                const viewportPath = path.join(outputDir, `${target.name}_${vp.name}_fold.png`);
                await page.screenshot({ path: viewportPath, fullPage: false });
                console.log(`Saved: ${viewportPath}`);

                // Capture full page screenshot
                const fullPath = path.join(outputDir, `${target.name}_${vp.name}_full.png`);
                await page.screenshot({ path: fullPath, fullPage: true });
                console.log(`Saved: ${fullPath}`);
            } catch (err) {
                console.error(`Error capturing ${target.name} [${vp.name}]:`, err.message);
            }
        }
    }

    // Also capture local Admin Login and Dashboard
    console.log('Capturing local admin login...');
    await page.setViewport({ width: 1440, height: 900 });
    await page.goto('http://127.0.0.1:8000/admin/login', { waitUntil: 'networkidle2' });
    await page.screenshot({ path: path.join(outputDir, 'local_admin_login_desktop.png') });

    // Login to admin
    await page.type('input[name="email"]', 'admin@hariombites.com');
    await page.type('input[name="password"]', 'password123');
    await page.click('button[type="submit"]');
    await page.waitForNavigation({ waitUntil: 'networkidle2' });
    await page.screenshot({ path: path.join(outputDir, 'local_admin_dashboard_desktop.png'), fullPage: true });
    console.log('Saved admin dashboard screenshot');

    await browser.close();
    console.log('All screenshots captured successfully in:', outputDir);
}

run().catch(console.error);
