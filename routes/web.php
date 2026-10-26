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

        // Reservations
        Route::get('/reservations', [AdminController::class, 'reservationIndex'])->name('reservations.index');
        Route::patch('/reservations/{reservation}/status', [AdminController::class, 'reservationStatus'])->name('reservations.status');

        // Settings
        Route::get('/settings', [AdminController::class, 'settingsIndex'])->name('settings.index');
        Route::post('/settings', [AdminController::class, 'settingsUpdate'])->name('settings.update');
    });
});
