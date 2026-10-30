<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $items = DB::table('menu_items')
            ->leftJoin('categories', 'menu_items.category_id', '=', 'categories.id')
            ->select('menu_items.id', 'menu_items.name', 'categories.name as cat_name')
            ->get();

        foreach ($items as $item) {
            $slug = Str::slug($item->name);
            if ($item->cat_name && in_array($item->cat_name, ['Wine', 'Beer'])) {
                $slug = Str::slug($item->cat_name . '-' . $item->name);
            }
            DB::table('menu_items')->where('id', $item->id)->update([
                'image' => 'menu/' . $slug,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reversible if needed
    }
};
