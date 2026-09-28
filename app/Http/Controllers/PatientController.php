<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
         $judul = 'Data Pasien';

        return view('pasien.index', compact('judul'));
    }
    public function show($id)
    {
        return 'Menampilkan pasien dengan ID: ' . $id;
    }
}