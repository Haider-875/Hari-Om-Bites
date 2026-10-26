import puppeteer from 'puppeteer-core';

const chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';

async function inspect() {
    const browser = await puppeteer.launch({
        executablePath: chromePath,
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox']
    });

    const page = await browser.newPage();
    await page.setViewport({ width: 1440, height: 900 });
    await page.goto('https://hari-om-bites.base44.app/', { waitUntil: 'networkidle2' });

    const data = await page.evaluate(() => {
        // Find navbar logo
        const nav = document.querySelector('nav') || document.querySelector('header');
        const navHtml = nav ? nav.outerHTML : null;

        // Find hero logo
        const heroImgs = Array.from(document.querySelectorAll('img')).map(img => ({
            src: img.src,
            alt: img.alt,
            className: img.className
        }));

        // Nav links
        const navLinks = Array.from(document.querySelectorAll('nav a, header a')).map(a => ({
            text: a.innerText.trim(),
            href: a.getAttribute('href'),
            className: a.className
        }));

        return {
            navHtml: navHtml ? navHtml.substring(0, 1500) : null,
            heroImgs,
            navLinks
        };
    });

    console.log(JSON.stringify(data, null, 2));
    await browser.close();
}

inspect().catch(console.error);
