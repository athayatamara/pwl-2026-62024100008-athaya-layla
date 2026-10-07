<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'doctor_code' => 'D001',
            'name' => 'Dr. Syahmina Izza Nafiah',
            'specialization' => 'Umum',
            'phone' => '081234567801',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D002',
            'name' => 'Dr. Putri Amanda Karimatullah',
            'specialization' => 'Penyakit Dalam',
            'phone' => '081234567802',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D003',
            'name' => 'Dr. Ferris Fernanda',
            'specialization' => 'Anak',
            'phone' => '081234567803',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D004',
            'name' => 'Dr. Nael Egbert',
            'specialization' => 'Mata',
            'phone' => '081234567804',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D005',
            'name' => 'Dr. Tazkia Nihaya',
            'specialization' => 'Kulit dan Kelamin',
            'phone' => '081234567805',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D006',
            'name' => 'Dr. Aulia Sabila',
            'specialization' => 'Gigi',
            'phone' => '081234567806',
            'is_active' => false,
        ]);

        Doctor::create([
            'doctor_code' => 'D007',
            'name' => 'Dr. Athaya Layla',
            'specialization' => 'Kandungan',
            'phone' => '081234567807',
            'is_active' => true,
        ]);

        Doctor::create([
            'doctor_code' => 'D008',
            'name' => 'Dr. Derai Ranu Mahesa',
            'specialization' => 'Bedah',
            'phone' => '081234567808',
            'is_active' => false,
        ]);
    }
}