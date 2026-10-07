<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $dokter = Doctor::all();

        return view('dokter.index', compact('dokter'));
    }
}