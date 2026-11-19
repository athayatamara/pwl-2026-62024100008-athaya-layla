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
                'role' => 'admin',
            ]
        );

        // Akun Petugas Pendaftaran
        User::updateOrCreate(
            ['email' => 'petugas@klinik.test'],
            [
                'name' => 'Petugas Pendaftaran',
                'password' => Hash::make('petugas123'),
                'role' => 'registration',
            ]
        );

        // Akun Dokter
        User::updateOrCreate(
            ['email' => 'dokter@klinik.test'],
            [
                'name' => 'Dokter Demo',
                'password' => Hash::make('dokter123'),
                'role' => 'doctor',
            ]
        );
    }
}
