<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@klinik.test'],
            [
                'name' => 'Admin Klinik',
                'password' => Hash::make('password123'),
            ]
        );

        // Akun Petugas
        User::updateOrCreate(
            ['email' => 'petugas@klinik.test'],
            [
                'name' => 'Petugas Klinik',
                'password' => Hash::make('petugas123'),
            ]
        );
    }
}
