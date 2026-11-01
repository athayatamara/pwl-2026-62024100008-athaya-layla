@extends('layouts.app')

@section('title', 'Data Dokter')

@section('content')

<h1>Data Dokter</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Tombol tambah dokter --}}
<a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">
    Tambah Dokter
</a>

{{-- Form pencarian, filter, dan sorting --}}
<form action="{{ route('dokter.index') }}" method="GET" class="mb-4">

    <div class="row g-2">

        {{-- Pencarian nama atau kode dokter --}}
        <div class="col-md-3">
            <label class="form-label">Pencarian</label>
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Nama atau kode dokter"
                value="{{ request('search') }}"
            >
        </div>

        {{-- Filter Poli --}}
        <div class="col-md-3">
            <label class="form-label">Poli</label>
            <select name="poli_id" class="form-control">
                <option value="">Semua Poli</option>

                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}"
                        {{ request('poli_id') == $poli->id ? 'selected' : '' }}>
                        {{ $poli->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Filter status --}}
        <div class="col-md-2">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-control">
                <option value="">Semua Status</option>
                <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>
            </select>
        </div>

        {{-- Sorting nama --}}
        <div class="col-md-2">
            <label class="form-label">Urutan</label>
            <select name="direction" class="form-control">
                <option value="asc" {{ request('direction', 'asc') == 'asc' ? 'selected' : '' }}>
                    A-Z
                </option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>
                    Z-A
                </option>
            </select>
        </div>

        {{-- Tombol terapkan --}}
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">
                Terapkan
            </button>
        </div>

    </div>

    <div class="mt-2">
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary btn-sm">
            Reset Filter
        </a>
    </div>

</form>

{{-- Tabel data dokter --}}
<table class="table table-bordered" cellpadding="8">

    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Spesialisasi</th>
            <th>Poli</th>
            <th>No. Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($doctors as $doctor)
            <tr>
                <td>{{ $doctors->firstItem() + $loop->index }}</td>
                <td>{{ $doctor->doctor_code }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->specialization }}</td>
                <td>{{ $doctor->poli->name ?? '-' }}</td>
                <td>{{ $doctor->phone ?? '-' }}</td>
                <td>
                    @if ($doctor->is_active)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('dokter.edit', $doctor->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('dokter.destroy', $doctor->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus data dokter ini?')">

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
                <td colspan="8" class="text-center">
                    Data dokter tidak ditemukan.
                </td>
            </tr>
        @endforelse
    </tbody>

</table>

{{-- Navigasi pagination Bootstrap 5 --}}
<div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">

    <div>
        <small class="text-muted">
            Menampilkan {{ $doctors->firstItem() ?? 0 }}
            sampai {{ $doctors->lastItem() ?? 0 }}
            dari {{ $doctors->total() }} data dokter
        </small>
    </div>

    <div>
        {{ $doctors->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection
