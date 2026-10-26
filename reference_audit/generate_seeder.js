const fs = require('fs');
const data = require('./extracted_data.js');

let seederContent = `<?php

namespace Database\\Seeders;

use Illuminate\\Database\\Seeder;
use App\\Models\\Category;
use App\\Models\\MenuItem;
use App\\Models\\Setting;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        // Settings
        Setting::updateOrCreate(['key' => 'name'], ['value' => 'Hari Om Cuisine Of India']);
        Setting::updateOrCreate(['key' => 'short_name'], ['value' => 'Hari Om']);
        Setting::updateOrCreate(['key' => 'address'], ['value' => '1528 S Cushman St, Fairbanks, AK 99701, United States']);
        Setting::updateOrCreate(['key' => 'address_short'], ['value' => '1528 S Cushman St · Fairbanks, Alaska']);
        Setting::updateOrCreate(['key' => 'phone'], ['value' => '+1 907-328-3218']);
        Setting::updateOrCreate(['key' => 'phone_href'], ['value' => 'tel:+19073283218']);
        Setting::updateOrCreate(['key' => 'map_url'], ['value' => 'https://www.google.com/maps/search/?api=1&query=1528+S+Cushman+St,+Fairbanks,+AK+99701']);
        Setting::updateOrCreate(['key' => 'hours_weekday'], ['value' => 'Tue–Sun: 11:30 AM – 2:30 PM & 4:30 PM – 9:00 PM']);
        Setting::updateOrCreate(['key' => 'hours_monday'], ['value' => 'Monday: Closed']);
        Setting::updateOrCreate(['key' => 'tagline'], ['value' => 'Traditional Indian cooking in Fairbanks, Alaska. From the tandoor to the thali.']);
`;

data.menu.forEach((cat, cIdx) => {
  const catSlug = cat.id;
  const catName = cat.name.replace(/'/g, "\\'");
  const catTagline = (cat.tagline || '').replace(/'/g, "\\'");
  const layout = cat.layout || 'standard';

  seederContent += `
        $category_${cIdx} = Category::updateOrCreate(
            ['slug' => '${catSlug}'],
            [
                'name' => '${catName}',
                'tagline' => '${catTagline}',
                'layout' => '${layout}',
                'sort_order' => ${cIdx + 1},
                'is_active' => true,
            ]
        );
`;

  if (cat.items && cat.items.length > 0) {
    cat.items.forEach((item, iIdx) => {
      const name = item.name.replace(/'/g, "\\'");
      const desc = (item.desc || '').replace(/'/g, "\\'");
      const price = item.price !== undefined ? (typeof item.price === 'number' ? item.price : 0) : 0;
      const priceLabel = (item.priceLabel || (typeof item.price === 'string' ? item.price : `$${item.price}`)).replace(/'/g, "\\'");
      const tags = JSON.stringify(item.tags || []);
      const img = item.img || '';
      const list = item.list ? JSON.stringify(item.list).replace(/'/g, "\\'") : 'null';

      seederContent += `        MenuItem::create([
            'category_id' => $category_${cIdx}->id,
            'name' => '${name}',
            'price' => ${price},
            'price_label' => '${priceLabel}',
            'description' => '${desc}',
            'tags' => ${tags},
            'image' => '${img}',
            'details' => ${list},
            'sort_order' => ${iIdx + 1},
            'is_available' => true,
        ]);
`;
    });
  }
});

seederContent += `    }
}
`;

fs.writeFileSync('e:/Hari OM Bites/reference_audit/RestaurantSeeder.php', seederContent);
console.log('RestaurantSeeder.php generated successfully!');
