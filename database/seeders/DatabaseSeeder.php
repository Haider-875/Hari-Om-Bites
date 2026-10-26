<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Admin User
        User::updateOrCreate(
            ['email' => 'admin@hariombites.com'],
            [
                'name' => 'Hari Om Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // Seed restaurant settings, categories, and menu items
        $this->call(RestaurantSeeder::class);
    }
}
