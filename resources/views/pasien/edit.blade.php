
@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')

<h1>Edit Pasien</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nomor Rekam Medis</label>
        <input type="text" name="medical_record_number"
            class="form-control"
            value="{{ old('medical_record_number', $pasien->medical_record_number) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Pasien</label>
        <input type="text" name="name"
            class="form-control"
            value="{{ old('name', $pasien->name) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="gender" class="form-select">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L" {{ old('gender', $pasien->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('gender', $pasien->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="birth_date"
            class="form-control"
            value="{{ old('birth_date', $pasien->birth_date) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="address" class="form-control">{{ old('address', $pasien->address) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" name="phone"
            class="form-control"
            value="{{ old('phone', $pasien->phone) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
