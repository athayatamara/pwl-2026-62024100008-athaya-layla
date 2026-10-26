
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $registration->registration_date }}</td>
                        <td>{{ $registration->patient?->name ?? '-' }}</td>
                        <td>{{ $registration->doctor?->name ?? '-' }}</td>
                        <td>{{ $registration->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada data registrasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
