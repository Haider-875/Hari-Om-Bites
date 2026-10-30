<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;

$items = MenuItem::with('category')->get();
$missing = 0;
$valid = 0;

echo "Verifying all " . $items->count() . " menu items in database:\n\n";

foreach ($items as $item) {
    $path = public_path('images/' . $item->image . '.jpg');
    $url = $item->image_url;
    if (file_exists($path)) {
        $valid++;
        // echo "  OK: [{$item->category->name}] {$item->name} -> {$item->image} (URL: {$url})\n";
    } else {
        $missing++;
        echo "  MISSING: [{$item->category->name}] {$item->name} -> {$item->image} ({$path})\n";
    }
}

echo "\nSummary: $valid valid images, $missing missing images.\n";

