<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['patient', 'doctor'])->get();

        return view('registrasi.index', compact('registrations'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('registrasi.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'registration_date' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        Registration::create($validated);

        return redirect()
            ->route('registrasi.index')
            ->with('success', 'Data registrasi berhasil ditambahkan.');
    }
}
