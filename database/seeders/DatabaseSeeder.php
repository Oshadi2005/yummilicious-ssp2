<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test customer
        User::updateOrCreate(
            ['email' => 'sharankumaravel@gmail.com'],
            [
                'name' => 'Sharan',
                'password' => Hash::make('Oshadi#123#'),
                'role' => 'customer',
            ]
        );

        // Create the admin user
        User::updateOrCreate(
            ['email' => 'oshadikumaravel@gmail.com'],
            [
                'name' => 'Oshadi Admin',
                'password' => Hash::make('SHARAN#123#'),
                'role' => 'admin',
            ]
        );

        // Seed sample products
        $this->call(ProductSeeder::class);
    }
}
