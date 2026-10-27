<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes - Hari Om Cuisine of India
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/api/menu', [MenuController::class, 'api'])->name('menu.api');
Route::get('/story', [HomeController::class, 'story'])->name('story');
Route::get('/about', [HomeController::class, 'story'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/reservations', [HomeController::class, 'reservations'])->name('reservations');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/visit', [HomeController::class, 'contact'])->name('visit');

Route::post('/reservation', [HomeController::class, 'reservationStore'])->name('reservation.store');
Route::post('/contact', [HomeController::class, 'contactStore'])->name('contact.store');

// Database initialization route for edge/cloud deployments
Route::get('/init-restaurant-db', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        \Illuminate\Support\Facades\Artisan::call('db:seed', [
            '--class' => 'RestaurantSeeder',
            '--force' => true,
        ]);
        // Also ensure admin user exists with valid hash and role
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@hariombites.com'],
            [
                'name' => 'Hari Om Admin',
                'role' => 'Store Manager',
                'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            ]
        );
        return response()->json([
            'status' => 'success',
            'admin_user' => 'admin@hariombites.com',
            'categories' => \App\Models\Category::count(),
            'menu_items' => \App\Models\MenuItem::count(),
            'settings' => \App\Models\Setting::count(),
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
});

// Standard Login Route (redirects to admin login)
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');

// Admin Portal Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Menu items
        Route::get('/menu', [AdminController::class, 'menuIndex'])->name('menu.index');
        Route::get('/menu/create', [AdminController::class, 'menuCreate'])->name('menu.create');
        Route::post('/menu', [AdminController::class, 'menuStore'])->name('menu.store');
        Route::get('/menu/{item}/edit', [AdminController::class, 'menuEdit'])->name('menu.edit');
        Route::put('/menu/{item}', [AdminController::class, 'menuUpdate'])->name('menu.update');
        Route::delete('/menu/{item}', [AdminController::class, 'menuDestroy'])->name('menu.destroy');

        // Categories
        Route::get('/categories', [AdminController::class, 'categoryIndex'])->name('categories.index');
        Route::post('/categories', [AdminController::class, 'categoryStore'])->name('categories.store');
        Route::put('/categories/{category}', [AdminController::class, 'categoryUpdate'])->name('categories.update');
        Route::delete('/categories/{category}', [AdminController::class, 'categoryDestroy'])->name('categories.destroy');

        // Staff & Roles Management
        Route::get('/users', [AdminController::class, 'userIndex'])->name('users.index');
        Route::post('/users', [AdminController::class, 'userStore'])->name('users.store');
        Route::put('/users/{user}', [AdminController::class, 'userUpdate'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('users.destroy');

        // Reservations
        Route::get('/reservations', [AdminController::class, 'reservationIndex'])->name('reservations.index');
        Route::patch('/reservations/{reservation}/status', [AdminController::class, 'reservationStatus'])->name('reservations.status');

        // Settings
        Route::get('/settings', [AdminController::class, 'settingsIndex'])->name('settings.index');
        Route::post('/settings', [AdminController::class, 'settingsUpdate'])->name('settings.update');
    });
});
