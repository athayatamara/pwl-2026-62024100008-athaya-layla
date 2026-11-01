
@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')

<h1>Data Pasien</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">
    Tambah Pasien
</a>

{{-- Form pencarian, filter, dan sorting --}}
<form action="{{ route('pasien.index') }}" method="GET" class="mb-4">
    <div class="row g-2">

        <div class="col-md-4">
            <label class="form-label">Pencarian</label>
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Nama atau nomor rekam medis"
                value="{{ request('search') }}"
            >
        </div>

        <div class="col-md-2">
            <label class="form-label">Jenis Kelamin</label>
            <select name="gender" class="form-control">
                <option value="">Semua</option>
                <option value="L" {{ request('gender') == 'L' ? 'selected' : '' }}>
                    Laki-laki
                </option>
                <option value="P" {{ request('gender') == 'P' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Urutkan Berdasarkan</label>
            <select name="sort" class="form-control">
                <option value="name" {{ request('sort', 'created_at') == 'name' ? 'selected' : '' }}>
                    Nama
                </option>
                <option value="created_at" {{ request('sort', 'created_at') == 'created_at' ? 'selected' : '' }}>
                    Tanggal Input
                </option>
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label">Urutan</label>
            <select name="direction" class="form-control">
                <option value="asc" {{ request('direction', 'asc') == 'asc' ? 'selected' : '' }}>
                    Ascending
                </option>
                <option value="desc" {{ request('direction', 'asc') == 'desc' ? 'selected' : '' }}>
                    Descending
                </option>
            </select>
        </div>

        <div class="col-md-1 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">
                Terapkan
            </button>
        </div>

    </div>

    <div class="mt-2">
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary btn-sm">
            Reset Filter
        </a>
    </div>
</form>

{{-- Tabel data pasien --}}
<table class="table table-bordered" cellpadding="8">
    <thead>
        <tr>
            <th>No.</th>
            <th>No. Rekam Medis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($patients as $patient)
            <tr>
               <td>{{ $patients->firstItem() + $loop->index }}</td>
                <td>{{ $patient->medical_record_number }}</td>
                <td>{{ $patient->name }}</td>
                <td>
                    {{ $patient->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </td>
                <td>{{ $patient->address }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $patient->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('pasien.destroy', $patient->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus data pasien ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">
                    Data pasien tidak ditemukan.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
    {{-- Navigasi pagination Bootstrap 5 --}}
<div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">

    <div>
        <small class="text-muted">
            Menampilkan {{ $patients->firstItem() ?? 0 }}
            sampai {{ $patients->lastItem() ?? 0 }}
            dari {{ $patients->total() }} data pasien
        </small>
    </div>

    <div>
        {{ $patients->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
