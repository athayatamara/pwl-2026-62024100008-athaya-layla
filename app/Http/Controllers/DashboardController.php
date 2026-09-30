<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPasien = 25;
        $jumlahDokter = 8;
        $jumlahPoli = 4;

        return view('dashboard', compact(
            'jumlahPasien',
            'jumlahDokter',
            'jumlahPoli'
        ));
    }
}