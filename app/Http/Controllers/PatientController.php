<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = [
            ['id' => 1, 'nama' => 'Kafka', 'alamat' => 'Kudus'],
            ['id' => 2, 'nama' => 'Sashi', 'alamat' => 'Jepara'],
            ['id' => 3, 'nama' => 'Aurora', 'alamat' => 'Pati'],
        ];

        return view('pasien.index', compact('patients'));
    }
}