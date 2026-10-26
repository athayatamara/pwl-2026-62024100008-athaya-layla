<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Poli;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('poli')->get();

        return view('dokter.index', compact('doctors'));
    }

    public function create()
    {
        $polis = Poli::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'is_active' => 'required|boolean',
            'poli_id' => 'required|exists:polis,id',
        ]);

        Doctor::create($validated);

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function show(Doctor $dokter)
    {
        $dokter->load('poli');

        return view('dokter.show', compact('dokter'));
    }

    public function edit(Doctor $dokter)
    {
        $polis = Poli::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request, Doctor $dokter)
    {
        $validated = $request->validate([
            'doctor_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'is_active' => 'required|boolean',
            'poli_id' => 'required|exists:polis,id',
        ]);

        $dokter->update($validated);

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Doctor $dokter)
    {
        $dokter->delete();

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data dokter berhasil dihapus.');
    }
}
