@extends('layouts.app')

@section('title', 'Data Registrasi')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Registrasi</h1>

        <a href="{{ route('registrasi.create') }}" class="btn btn-primary">
            + Tambah Registrasi
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Search dan Filter --}}
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('registrasi.index') }}" method="GET">

                <div class="row g-3">

                    {{-- Search nama pasien --}}
                    <div class="col-md-6">
                        <label class="form-label">Cari Nama Pasien</label>
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Masukkan nama pasien..."
                            value="{{ request('search') }}"
                        >
                    </div>

                    {{-- Filter dokter --}}
                    <div class="col-md-6">
                        <label class="form-label">Filter Dokter</label>
                        <select name="doctor_id" class="form-select">
                            <option value="">Semua Dokter</option>

                            @foreach ($doctors as $doctor)
                                <option
                                    value="{{ $doctor->id }}"
                                    {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}
                                >
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filter status --}}
                    <div class="col-md-4">
                        <label class="form-label">Filter Status</label>
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>

                            @foreach ($statuses as $item)
                                <option
                                    value="{{ $item }}"
                                    {{ request('status') == $item ? 'selected' : '' }}
                                >
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filter tanggal --}}
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Registrasi</label>
                        <input
                            type="date"
                            name="date"
                            class="form-control"
                            value="{{ request('date') }}"
                        >
                    </div>

                    {{-- Sorting --}}
                    <div class="col-md-4">
                        <label class="form-label">Urutkan Tanggal</label>
                        <select name="direction" class="form-select">
                            <option value="desc"
                                {{ request('direction', 'desc') == 'desc' ? 'selected' : '' }}>
                                Terbaru
                            </option>

                            <option value="asc"
                                {{ request('direction') == 'asc' ? 'selected' : '' }}>
                                Terlama
                            </option>
                        </select>
                    </div>

                </div>

                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Cari dan Filter
                    </button>

                    <a href="{{ route('registrasi.index') }}" class="btn btn-secondary">
                        Reset Filter
                    </a>
                </div>

            </form>
        </div>
    </div>

    {{-- Tabel Registrasi --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">

            <thead class="table-primary">
                <tr>
                    <th>No.</th>
                    <th>Tanggal Registrasi</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($registrations as $registration)
                    <tr>
                        <td>
                            {{ $registrations->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $registration->registration_date }}
                        </td>

                        <td>
                            {{ $registration->patient?->name ?? '-' }}
                        </td>

                        <td>
                            {{ $registration->doctor?->name ?? '-' }}
                        </td>

                        <td>
                            {{ $registration->status }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Data registrasi tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Informasi dan Pagination --}}
    <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">

        <div>
            <small class="text-muted">
                Menampilkan {{ $registrations->firstItem() ?? 0 }}
                sampai {{ $registrations->lastItem() ?? 0 }}
                dari {{ $registrations->total() }} data registrasi
            </small>
        </div>

        <div>
            {{ $registrations->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>
@endsection
