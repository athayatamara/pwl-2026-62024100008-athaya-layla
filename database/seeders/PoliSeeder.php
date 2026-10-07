<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('polis')->insert([
            [
                'poli_code' => 'P001',
                'name' => 'Poli Umum',
                'is_active' => true,
            ],
            [
                'poli_code' => 'P002',
                'name' => 'Poli Anak',
                'is_active' => true,
            ],
            [
                'poli_code' => 'P003',
                'name' => 'Poli Gigi',
                'is_active' => true,
            ],
            [
                'poli_code' => 'P004',
                'name' => 'Poli Mata',
                'is_active' => true,
            ],
            [
                'poli_code' => 'P005',
                'name' => 'Poli Penyakit Dalam',
                'is_active' => false,
            ],
        ]);
    }
}