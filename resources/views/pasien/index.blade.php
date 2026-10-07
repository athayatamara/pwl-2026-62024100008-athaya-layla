@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')

<h1>Data Pasien</h1>

<table border="1" cellpadding="8">

    <thead>
        <tr>
            <th>No.</th>
            <th>No. Rekam Medis</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($patients as $patient)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $patient->medical_record_number }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->address }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    Belum ada data pasien.
                </td>
            </tr>
        @endforelse
    </tbody>

</table>

@endsection