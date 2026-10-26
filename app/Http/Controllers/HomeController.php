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

    public function story()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $totalDishes = MenuItem::count();
        $vegCount = MenuItem::whereJsonContains('tags', 'V')->count();
        $gfCount = MenuItem::whereJsonContains('tags', 'GF')->count();

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
            [
                'title' => 'Tandoor Craft',
                'caption' => 'Fresh dough slapped directly onto blistering clay tandoor walls at 800 degrees.',
                'src' => asset('images/tandoor.png'),
            ],
            [
                'title' => 'Spices of Punjab',
                'caption' => 'Cardamom pods, cloves, mace, cinnamon, cumin, and dried Kashmiri chilies.',
                'src' => asset('images/spices.png'),
            ],
            [
                'title' => 'Dining Atmosphere',
                'caption' => 'Warm, golden illumination and aromatic spice scents greeting every Alaskan evening.',
                'src' => asset('images/interior.png'),
            ],
        ];

        return view('pages.story', compact('settings', 'cultureGallery', 'totalDishes', 'vegCount', 'gfCount'));
    }

    public function gallery()
    {
        $settings = Setting::pluck('value', 'key')->all();

        $galleryItems = [
            ['title' => 'Fresh Tandoor Naan', 'category' => 'Craft', 'img' => asset('images/tandoor.png'), 'caption' => 'Puffed to blistered perfection inside the 800° clay tandoor oven.'],
            ['title' => 'Lamb Rogan Josh', 'category' => 'Dishes', 'img' => asset('images/lamb.png'), 'caption' => 'Slow-braised tender lamb simmered in glossy tomato and Kashmiri spices.'],
            ['title' => 'Vegetable Samosas', 'category' => 'Dishes', 'img' => asset('images/samosas.png'), 'caption' => 'Golden fried pastries filled with cumin-spiced potatoes and green peas.'],
            ['title' => 'The Holy Shrine', 'category' => 'Interior', 'img' => asset('images/cultureShrine.jpg'), 'caption' => 'Ganesh, fresh marigolds, and hand-painted sacred Om welcoming diners.'],
            ['title' => 'Dining Booths & Alaska Mural', 'category' => 'Interior', 'img' => asset('images/cultureBooths.jpg'), 'caption' => 'Warm burgundy booths beneath our hand-painted Alaska mural and fabric lanterns.'],
            ['title' => 'The Cushman Entrance', 'category' => 'Interior', 'img' => asset('images/cultureExterior.jpg'), 'caption' => 'Our historic entrance on South Cushman Street in downtown Fairbanks.'],
            ['title' => 'Whole Indian Spices', 'category' => 'Craft', 'img' => asset('images/spices.png'), 'caption' => 'Whole spices hand-roasted and ground fresh daily in our kitchen.'],
            ['title' => 'Shahi Paneer', 'category' => 'Dishes', 'img' => asset('images/paneer.png'), 'caption' => 'Delicate house paneer cheese in rich cashew cream and tomato gravy.'],
            ['title' => 'Thali Feast', 'category' => 'Dishes', 'img' => asset('images/thali.png'), 'caption' => 'The crown jewel of Indian dining — four chef curries, rice, naan, and raitha.'],
            ['title' => 'Warm Dining Room', 'category' => 'Interior', 'img' => asset('images/interior.png'), 'caption' => 'Cosy respite from Alaska sub-zero nights filled with laughter and spices.'],
            ['title' => 'Crisp Vegetable Pakoras', 'category' => 'Dishes', 'img' => asset('images/pakoras.png'), 'caption' => 'Chickpea batter fritters served with tangy tamarind and mint chutneys.'],
            ['title' => 'Alaskan Craft Beer & Ales', 'category' => 'Craft', 'img' => asset('images/beer.png'), 'caption' => 'Locally brewed Alaskan beers poured fresh to pair with authentic heat.'],
        ];

        return view('pages.gallery', compact('settings', 'galleryItems'));
    }

    public function reservations()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('pages.reservations', compact('settings'));
    }

    public function contact()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('pages.contact', compact('settings'));
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
