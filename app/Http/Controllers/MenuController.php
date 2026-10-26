<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->all();

        $categories = Category::with(['menuItems' => function ($q) {
            $q->where('is_available', true)->orderBy('sort_order', 'asc');
        }])->where('is_active', true)->orderBy('sort_order', 'asc')->get();

        // Prepare client-side payload for Alpine.js live search & filtering
        $clientCategories = $categories->map(function ($cat) {
            return [
                'id' => $cat->slug,
                'name' => $cat->name,
                'tagline' => $cat->tagline,
                'layout' => $cat->layout,
                'items' => $cat->menuItems->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'price' => (float) $item->price,
                        'priceLabel' => $item->price_label ?: ('$' . number_format($item->price, 0)),
                        'desc' => $item->description ?: '',
                        'tags' => $item->tags ?: [],
                        'img' => $item->image ?: 'samosas',
                        'imgUrl' => $item->image_url,
                        'list' => $item->details ?: [],
                    ];
                })->values(),
            ];
        })->values();

        return view('pages.menu', compact('settings', 'categories', 'clientCategories'));
    }

    public function api()
    {
        $categories = Category::with(['menuItems' => function ($q) {
            $q->where('is_available', true)->orderBy('sort_order', 'asc');
        }])->where('is_active', true)->orderBy('sort_order', 'asc')->get();

        return response()->json($categories);
    }
}
