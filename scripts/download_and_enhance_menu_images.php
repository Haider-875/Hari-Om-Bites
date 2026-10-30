<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\MenuItem;
use Illuminate\Support\Str;

$mappings = json_decode(file_get_contents('item_mappings.json'), true);
if (!$mappings) {
    die("Error loading item_mappings.json\n");
}

$targetDir = public_path('images/menu');
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

echo "Starting download & enhancement of " . count($mappings) . " menu images...\n\n";

$successCount = 0;
$failCount = 0;

$updatedItems = [];

foreach ($mappings as $index => $m) {
    $dbName = $m['dbName'];
    $category = $m['category'];
    $url = $m['imageUrl'];
    $itemId = $m['id'];

    $slug = Str::slug($dbName);
    // If slug empty or too generic, prefix category
    if (empty($slug)) {
        $slug = 'item-' . $itemId;
    }
    // For beers or wine or entrees with duplicate names if any:
    if (in_array($category, ['Wine', 'Beer'])) {
        $slug = Str::slug($category . '-' . $dbName);
    }

    $destPath = $targetDir . '/' . $slug . '.jpg';
    $imageKey = 'menu/' . $slug;

    echo "[" . ($index + 1) . "/" . count($mappings) . "] Processing '{$dbName}' ({$category})...\n";

    if (!$url) {
        echo "  -> Skipped: No URL found.\n";
        $failCount++;
        continue;
    }

    // Download with cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $rawData = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if (!$rawData || $httpCode !== 200) {
        echo "  -> Failed download (HTTP $httpCode) from $url\n";
        $failCount++;
        continue;
    }

    // Try GD image creation
    $src = @imagecreatefromstring($rawData);
    if (!$src) {
        echo "  -> Failed creating image resource from data.\n";
        $failCount++;
        continue;
    }

    $origW = imagesx($src);
    $origH = imagesy($src);

    // Square crop
    $targetSize = 600;
    $cropSize = min($origW, $origH);
    $srcX = (int)(($origW - $cropSize) / 2);
    $srcY = (int)(($origH - $cropSize) / 2);

    $dst = imagecreatetruecolor($targetSize, $targetSize);

    // Fill with white background in case source has transparency (e.g. PNG drinks)
    $white = imagecolorallocate($dst, 255, 255, 255);
    imagefill($dst, 0, 0, $white);

    // Resample
    imagecopyresampled($dst, $src, 0, 0, $srcX, $srcY, $targetSize, $targetSize, $cropSize, $cropSize);

    // Enhancement Filters:
    // 1. Contrast: mild contrast boost (-4 in GD where negative increases contrast)
    imagefilter($dst, IMG_FILTER_CONTRAST, -4);

    // 2. Brightness: gentle lift (+2)
    imagefilter($dst, IMG_FILTER_BRIGHTNESS, 2);

    // 3. Subtle Sharpening Filter:
    $sharpenMatrix = [
        [-0.3, -0.3, -0.3],
        [-0.3,  3.4, -0.3],
        [-0.3, -0.3, -0.3]
    ];
    @imageconvolution($dst, $sharpenMatrix, 1.0, 0);

    // Save as JPEG with 92% quality
    imagejpeg($dst, $destPath, 92);

    imagedestroy($src);
    imagedestroy($dst);

    $fileSize = round(filesize($destPath) / 1024, 1);
    echo "  -> Saved {$destPath} ({$fileSize} KB)\n";

    // Update database
    $menuItem = MenuItem::find($itemId);
    if ($menuItem) {
        $menuItem->image = $imageKey;
        $menuItem->save();
        echo "  -> Updated DB item #{$itemId} '{$dbName}' with image '{$imageKey}'\n";
    }

    $updatedItems[] = [
        'id' => $itemId,
        'name' => $dbName,
        'category' => $category,
        'imageKey' => $imageKey,
        'file' => $slug . '.jpg',
    ];

    $successCount++;
}

echo "\n============================================\n";
echo "Finished! Successfully processed: $successCount, Failed: $failCount\n";
echo "============================================\n";

file_put_contents('enhanced_menu_results.json', json_encode($updatedItems, JSON_PRETTY_PRINT));

