<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin users
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        User::create([
            'name' => 'Admin Dua',
            'email' => 'admin2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        // Staff users
        $staffNames = [
            'Budi Santoso', 'Dewi Lestari', 'Andi Wijaya', 'Siti Nurhaliza',
            'Joko Widodo', 'Ratna Sari', 'Agus Hermawan', 'Rina Marlina'
        ];
        
        foreach ($staffNames as $index => $name) {
            $emailName = strtolower(str_replace(' ', '.', $name));
            User::create([
                'name' => $name,
                'email' => $emailName . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'staff',
            ]);
        }
    }
}
