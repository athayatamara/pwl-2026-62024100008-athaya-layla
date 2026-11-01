<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    // Menampilkan daftar pasien dengan search, filter,
    // sorting, dan pagination
    public function index(Request $request)
    {
        $search = $request->search;
        $gender = $request->gender;

        // Kolom sorting yang diizinkan
        $allowedSorts = ['name', 'created_at'];

        $sort = $request->sort;
        $direction = $request->direction;

        // Validasi kolom sorting
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'created_at';
        }

        // Validasi arah sorting
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }

        $patients = Patient::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('medical_record_number', 'like', '%' . $search . '%');
                });
            })
            ->when($gender, function ($query, $gender) {
                $query->where('gender', $gender);
            })
            ->orderBy($sort, $direction)
            ->paginate(10)
            ->withQueryString();

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
