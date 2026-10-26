<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Reservation;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->all();

        $categories = Category::with(['menuItems' => function ($q) {
            $q->where('is_available', true)->orderBy('sort_order', 'asc');
        }])->where('is_active', true)->orderBy('sort_order', 'asc')->get();

        // Chef's selection items (matching original gD array)
        $chefSelection = [
            [
                'name' => 'Vegetable Samosas',
                'price' => '$14',
                'desc' => 'Two large pastries stuffed with spiced potato and green peas, fried to order and served with tamarind and green chutney.',
                'img' => asset('images/samosas.png'),
            ],
            [
                'name' => 'Lamb Rogan Josh',
                'price' => 'Lamb $32',
                'desc' => 'Lamb slow-blended with tomatoes and seasoned with cardamom, cloves and fennel until the gravy turns deep and glossy.',
                'img' => asset('images/lamb.png'),
            ],
            [
                'name' => 'Shahi Paneer',
                'price' => '$26',
                'desc' => 'Mashed paneer in a creamy tomato sauce with cream, puréed cashews and warm Indian spices.',
                'img' => asset('images/paneer.png'),
            ],
            [
                'name' => 'Thali Platter',
                'price' => '$24',
                'desc' => "Chef's choice of four dishes with one chicken dish, basmati rice, naan, papad, raitha and dessert all on one platter.",
                'img' => asset('images/thali.png'),
            ],
        ];

        // Culture gallery images
        $cultureGallery = [
            [
                'title' => 'The shrine',
                'caption' => 'Ganesh, fresh flowers and a hand-painted Om on the green wall — the heart of our dining room.',
                'src' => asset('images/cultureShrine.jpg'),
            ],
            [
                'title' => 'Booths & murals',
                'caption' => 'Burgundy booths under our Alaska mural, hung with fabric lanterns and fairy lights.',
                'src' => asset('images/cultureBooths.jpg'),
            ],
            [
                'title' => 'Our door on Cushman',
                'caption' => 'Up the red stairs on South Cushman Street — look for the Om and the gold drapes.',
                'src' => asset('images/cultureExterior.jpg'),
            ],
        ];

        // Counts
        $totalDishes = MenuItem::count();
        $vegCount = MenuItem::whereJsonContains('tags', 'V')->count();
        $gfCount = MenuItem::whereJsonContains('tags', 'GF')->count();

        return view('pages.home', compact(
            'settings',
            'categories',
            'chefSelection',
            'cultureGallery',
            'totalDishes',
            'vegCount',
            'gfCount'
        ));
    }

    public function reservationStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'guests' => 'required|integer|min:1|max:30',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|string',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        Reservation::create($validated);

        return back()->with('success', 'Your table reservation request has been received! Our kitchen will confirm promptly.');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Thank you for your message! We will get back to you shortly.');
    }
}
