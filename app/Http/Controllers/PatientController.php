<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $patients = Patient::all();

        return view('pasien.index', compact('patients'));
    }

    // Menampilkan form tambah pasien
    public function create()
    {
        return view('pasien.create');
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'medical_record_number' => 'required|unique:patients,medical_record_number',
            'name' => 'required|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|max:20',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan.');
    }

    // Menampilkan detail pasien
    public function show(Patient $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    // Menampilkan form edit pasien
    public function edit(Patient $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    // Menyimpan perubahan data pasien
    public function update(Request $request, Patient $pasien)
    {
        $validated = $request->validate([
            'medical_record_number' => [
                'required',
                Rule::unique('patients', 'medical_record_number')
                    ->ignore($pasien->id),
            ],
            'name' => 'required|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|max:20',
        ]);

        $pasien->update($validated);

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui.');
    }

    // Menghapus data pasien
    public function destroy(Patient $pasien)
    {
        $pasien->delete();

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil dihapus.');
    }
}