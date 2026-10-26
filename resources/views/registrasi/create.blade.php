@extends('layouts.app')

@section('title', 'Tambah Registrasi')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Registrasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registrasi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="patient_id" class="form-label">Pasien</label>
            <select name="patient_id" id="patient_id" class="form-select" required>
                <option value="">-- Pilih Pasien --</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}"
                        {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="doctor_id" class="form-label">Dokter</label>
            <select name="doctor_id" id="doctor_id" class="form-select" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}"
                        {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="registration_date" class="form-label">
                Tanggal Registrasi
            </label>
            <input
                type="date"
                name="registration_date"
                id="registration_date"
                class="form-control"
                value="{{ old('registration_date') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>
                    Menunggu
                </option>
                <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                    Selesai
                </option>
                <option value="Dibatalkan" {{ old('status') == 'Dibatalkan' ? 'selected' : '' }}>
                    Dibatalkan
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('registrasi.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
