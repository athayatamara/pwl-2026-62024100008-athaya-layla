@extends('layouts.app')

@section('title', 'Tambah Poli')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Poli</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('poli.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="poli_code" class="form-label">Kode Poli</label>
            <input
                type="text"
                name="poli_code"
                id="poli_code"
                class="form-control @error('poli_code') is-invalid @enderror"
                value="{{ old('poli_code') }}"
                required
            >

            @error('poli_code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Poli</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                required
            >

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select
                name="is_active"
                id="is_active"
                class="form-select @error('is_active') is-invalid @enderror"
                required
            >
                <option value="">-- Pilih Status --</option>
                <option value="1" {{ old('is_active') === '1' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>
            </select>

            @error('is_active')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection