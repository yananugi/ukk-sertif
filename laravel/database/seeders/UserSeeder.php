<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // <--- WAJIB: Alamat model User
use Illuminate\Support\Facades\Hash; // <--- WAJIB: Alamat buat nge-hash password

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sekarang Laravel tahu User itu dari App\Models\User
        User::create([
            'name'     => 'Admin Nugi',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);
    }
}