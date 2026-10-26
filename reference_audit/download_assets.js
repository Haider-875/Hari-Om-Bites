const fs = require('fs');
const https = require('https');
const path = require('path');

const data = require('./extracted_data.js');
const images = {
  ...data.images,
  logo: 'https://media.base44.com/images/public/6ad842543ddcbd6550e4f877/559f5f2b2_logo.png',
  favicon: 'https://media.base44.com/images/public/6ad842543ddcbd6550e4f877/a8602a62d_images.png'
};

const outDir = path.join(__dirname, 'downloaded_images');
if (!fs.existsSync(outDir)) fs.mkdirSync(outDir, { recursive: true });

function download(name, url) {
  return new Promise((resolve, reject) => {
    const ext = url.includes('.jpg') ? '.jpg' : '.png';
    const filePath = path.join(outDir, `${name}${ext}`);
    const file = fs.createWriteStream(filePath);
    https.get(url, (res) => {
      res.pipe(file);
      file.on('finish', () => {
        file.close();
        console.log(`Downloaded ${name} -> ${filePath}`);
        resolve();
      });
    }).on('error', (err) => {
      fs.unlink(filePath, () => {});
      console.error(`Failed ${name}:`, err.message);
      resolve();
    });
  });
}

async function run() {
  for (const [key, url] of Object.entries(images)) {
    await download(key, url);
  }
  console.log('All images downloaded successfully!');
}

run();
