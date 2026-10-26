const fs = require('fs');

const dump = fs.readFileSync('e:/Hari OM Bites/reference_audit/components_dump.txt', 'utf8');

const sections = dump.split('============================= FUNCTION: ');
sections.forEach(sec => {
  if (!sec.trim()) return;
  const lines = sec.trim().split('\n');
  const header = lines[0];
  const preview = lines.slice(1, 10).join(' ');
  // Extract JSX text or className or tags
  const classMatches = [...sec.matchAll(/className:\`([^`]+)\`/g)].map(m => m[1]).slice(0, 3);
  const textMatches = [...sec.matchAll(/>([^<>{}\n`]+)</g)].map(m => m[1].trim()).filter(t => t.length > 2).slice(0, 5);
  console.log(`\n### ${header}`);
  console.log(`Classes:`, classMatches);
  console.log(`Texts:`, textMatches);
});
