<?php

namespace App\Http\Controllers;

class DoctorController extends Controller
{
    public function index()
    {
        $dokter = [
            [
                'nama' => 'Dr. Ahmad Fauzi',
                'spesialisasi' => 'Dokter Umum',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'Dr. Siti Aminah',
                'spesialisasi' => 'Dokter Anak',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'Dr. Budi Santoso',
                'spesialisasi' => 'Dokter Gigi',
                'status' => 'Tidak Aktif'
            ],
            [
                'nama' => 'Dr. Rina Wulandari',
                'spesialisasi' => 'Penyakit Dalam',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'Dr. Andi Pratama',
                'spesialisasi' => 'Kardiologi',
                'status' => 'Aktif'
            ],
        ];

        return view('dokter.index', compact('dokter'));
    }
}
