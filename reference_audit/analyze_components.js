const fs = require('fs');

const comps = JSON.parse(fs.readFileSync('e:/Hari OM Bites/reference_audit/components.json', 'utf8'));

comps.forEach(c => {
  // Extract all string literals inside backticks or quotes
  const strings = [...c.code.matchAll(/[`"']([^`"'\n]{2,80})[`"']/g)]
    .map(m => m[1].trim())
    .filter(s => !s.startsWith('http') && !s.includes('data-') && !s.includes('inline-block') && s.length > 2);
  
  // Find visible text (excluding pure CSS classes)
  const readable = strings.filter(s => !s.includes('flex') && !s.includes('text-') && !s.includes('bg-') && !s.includes('p-') && !s.includes('rounded-') && !s.includes('border-') && !s.includes('transition-'));
  
  console.log(`\n==============================================`);
  console.log(`Component: ${c.name}(${c.params}) [${c.length} chars]`);
  console.log(`Readable texts / identifiers (${readable.length}):`);
  console.log(readable.slice(0, 15));
});
