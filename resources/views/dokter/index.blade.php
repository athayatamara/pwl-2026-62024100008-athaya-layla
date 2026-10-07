@extends('layouts.app')

@section('title', 'Dokter')

@section('content')

<h1>Data Dokter</h1>

<table border="1" cellpadding="10">

    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Dokter</th>
            <th>Nama</th>
            <th>Spesialisasi</th>
            <th>No. Telepon</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($dokter as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->doctor_code }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->specialization }}</td>
                <td>{{ $d->phone ?? '-' }}</td>
                <td>
                    @if ($d->is_active)
                        Aktif
                    @else
                        Tidak Aktif
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Data dokter belum tersedia.</td>
            </tr>
        @endforelse
    </tbody>

</table>

@endsection