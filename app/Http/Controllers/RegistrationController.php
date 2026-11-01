<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $doctor_id = $request->doctor_id;
        $status = $request->status;
        $date = $request->date;

        // Membatasi pilihan sorting agar aman
        $direction = $request->direction;

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $registrations = Registration::with(['patient', 'doctor'])
            // Search berdasarkan nama pasien
            ->when($search, function ($query, $search) {
                $query->whereHas('patient', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })

            // Filter berdasarkan dokter
            ->when($doctor_id, function ($query, $doctor_id) {
                $query->where('doctor_id', $doctor_id);
            })

            // Filter berdasarkan status
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })

            // Filter berdasarkan tanggal registrasi
            ->when($date, function ($query, $date) {
                $query->whereDate('registration_date', $date);
            })

            // Sorting tanggal registrasi
            ->orderBy('registration_date', $direction)
            ->orderBy('id', $direction)

            // Pagination maksimal 10 data
            ->paginate(10)
            ->withQueryString();

        // Data untuk pilihan filter
        $doctors = Doctor::orderBy('name')->get();

        $statuses = Registration::select('status')
            ->distinct()
            ->orderBy('status')
            ->pluck('status');

        return view('registrasi.index', compact(
            'registrations',
            'doctors',
            'statuses'
        ));
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
