<?php

namespace App\Http\Controllers;

use App\Models\Poli;

class PoliController extends Controller
{
    public function index()
    {
        $poli = Poli::all();

        return view('poli.index', compact('poli'));
    }
}