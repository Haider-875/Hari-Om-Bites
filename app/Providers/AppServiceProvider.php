<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Auto-seed menu items in production/edge environment if database is unseeded
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('menu_items')) {
                if (\App\Models\MenuItem::count() === 0) {
                    \Illuminate\Support\Facades\Artisan::call('db:seed', [
                        '--class' => 'RestaurantSeeder',
                        '--force' => true,
                    ]);
                }
            } elseif (!\Illuminate\Support\Facades\Schema::hasTable('categories')) {
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                \Illuminate\Support\Facades\Artisan::call('db:seed', [
                    '--class' => 'RestaurantSeeder',
                    '--force' => true,
                ]);
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Database auto-initialization check skipped: ' . $e->getMessage());
        }
    }
}
