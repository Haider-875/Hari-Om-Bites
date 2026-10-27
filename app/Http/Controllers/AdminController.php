<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Reservation;
use App\Models\ContactMessage;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        // 1. If database has no users, create default admin user on the fly
        if (!$user && User::count() === 0 && $credentials['email'] === 'admin@hariombites.com') {
            $user = User::create([
                'name' => 'Hari Om Admin',
                'email' => 'admin@hariombites.com',
                'password' => Hash::make($credentials['password']),
            ]);
        }

        if ($user) {
            // 2. Check if password was stored as plain text or legacy unhashed string
            if ($user->password === $credentials['password']) {
                $user->password = Hash::make($credentials['password']);
                $user->save();

                Auth::login($user, $request->boolean('remember'));
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }

            // 3. Normal attempt wrapped in try-catch to heal non-bcrypt or corrupted hashes
            try {
                if (Auth::attempt($credentials, $request->boolean('remember'))) {
                    $request->session()->regenerate();
                    return redirect()->intended(route('admin.dashboard'));
                }
            } catch (\Throwable $e) {
                // If stored password in DB is not bcrypt or threw RuntimeException,
                // and it's the known default admin password, heal it automatically
                if ($credentials['email'] === 'admin@hariombites.com' && $credentials['password'] === 'password123') {
                    $user->password = Hash::make('password123');
                    $user->save();

                    Auth::login($user, $request->boolean('remember'));
                    $request->session()->regenerate();
                    return redirect()->intended(route('admin.dashboard'));
                }
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalItems = MenuItem::count();
        $totalCategories = Category::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        $recentReservations = Reservation::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalItems',
            'totalCategories',
            'pendingReservations',
            'unreadMessages',
            'recentReservations',
            'recentMessages'
        ));
    }

    // --- Menu Items Management ---
    public function menuIndex()
    {
        $items = MenuItem::with('category')->orderBy('category_id')->orderBy('sort_order')->paginate(20);
        return view('admin.menu.index', compact('items'));
    }

    public function menuCreate()
    {
        $categories = Category::all();
        return view('admin.menu.create', compact('categories'));
    }

    public function menuStore(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_label' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'image' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_available' => 'boolean',
            'sort_order' => 'integer',
        ]);

        MenuItem::create($validated);
        return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully.');
    }

    public function menuEdit(MenuItem $item)
    {
        $categories = Category::all();
        return view('admin.menu.edit', compact('item', 'categories'));
    }

    public function menuUpdate(Request $request, MenuItem $item)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_label' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'image' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_available' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $item->update($validated);
        return redirect()->route('admin.menu.index')->with('success', 'Menu item updated successfully.');
    }

    public function menuDestroy(MenuItem $item)
    {
        $item->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted.');
    }

    // --- Reservations ---
    public function reservationIndex()
    {
        $reservations = Reservation::latest()->paginate(15);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function reservationStatus(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
        $reservation->update($validated);
        return back()->with('success', 'Reservation status updated.');
    }

    // --- Settings ---
    public function settingsIndex()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Settings updated successfully.');
    }
}
