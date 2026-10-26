const fs = require('fs');

const code = fs.readFileSync('e:/Hari OM Bites/reference_audit/index.js', 'utf8');

// 1. Image dict starts at `fD={hero:`
const imgStart = code.indexOf('{hero:`');
let imgDepth = 0;
let imgEnd = imgStart;
for (let i = imgStart; i < code.length; i++) {
  if (code[i] === '{') imgDepth++;
  else if (code[i] === '}') {
    imgDepth--;
    if (imgDepth === 0) {
      imgEnd = i + 1;
      break;
    }
  }
}
const imgBlock = code.substring(imgStart, imgEnd);

// 2. Restaurant info starts at `$={name:`Hari Om`
const restStart = code.indexOf('{name:`Hari Om');
let restDepth = 0;
let restEnd = restStart;
for (let i = restStart; i < code.length; i++) {
  if (code[i] === '{') restDepth++;
  else if (code[i] === '}') {
    restDepth--;
    if (restDepth === 0) {
      restEnd = i + 1;
      break;
    }
  }
}
const restBlock = code.substring(restStart, restEnd);

// 3. Menu starts at `pD=[{id:`appetizers`
const menuStart = code.indexOf('[{id:`appetizers`');
let menuDepth = 0;
let menuEnd = menuStart;
for (let i = menuStart; i < code.length; i++) {
  if (code[i] === '[') menuDepth++;
  else if (code[i] === ']') {
    menuDepth--;
    if (menuDepth === 0) {
      menuEnd = i + 1;
      break;
    }
  }
}
const menuBlock = code.substring(menuStart, menuEnd);

// Also look for hours, featured dishes, and other constants
// Let's inspect code after menuEnd
const restOfCode = code.substring(menuEnd);

fs.writeFileSync('e:/Hari OM Bites/reference_audit/extracted_data.js', `
module.exports = {
  images: ${imgBlock},
  restaurant: ${restBlock},
  menu: ${menuBlock}
};
`);

console.log('Saved extracted_data.js successfully!');
