<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        return view('poli.index');
    }
}
