<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Poli;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Menampilkan daftar dokter dengan search, filter,
    // sorting, eager loading, dan pagination
    public function index(Request $request)
    {
        $search = $request->search;
        $poli_id = $request->poli_id;
        $is_active = $request->is_active;

        // Kolom sorting yang diizinkan
        $allowedSorts = ['name'];

        $sort = $request->sort;
        $direction = $request->direction;

        // Validasi kolom sorting
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'name';
        }

        // Validasi arah sorting
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }

        $doctors = Doctor::with('poli')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('doctor_code', 'like', '%' . $search . '%');
                });
            })
            ->when($poli_id, function ($query, $poli_id) {
                $query->where('poli_id', $poli_id);
            })
            ->when($request->filled('is_active'), function ($query) use ($is_active) {
                $query->where('is_active', $is_active);
            })
            ->orderBy($sort, $direction)
            ->paginate(10)
            ->withQueryString();

        $polis = Poli::orderBy('name')->get();

        return view('dokter.index', compact('doctors', 'polis'));
    }

    // Menampilkan form tambah dokter
    public function create()
    {
        $polis = Poli::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('dokter.create', compact('polis'));
    }

    // Menyimpan data dokter baru
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

    // Menampilkan detail dokter
    public function show(Doctor $dokter)
    {
        $dokter->load('poli');

        return view('dokter.show', compact('dokter'));
    }

    // Menampilkan form edit dokter
    public function edit(Doctor $dokter)
    {
        $polis = Poli::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('dokter.edit', compact('dokter', 'polis'));
    }

    // Memperbarui data dokter
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

    // Menghapus data dokter
    public function destroy(Doctor $dokter)
    {
        $dokter->delete();

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data dokter berhasil dihapus.');
    }
}
