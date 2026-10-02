@extends('layouts.app')

@section('title', 'Dokter')

@section('content')
    <h1>Data Dokter</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($dokter as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d['nama'] }}</td>
                    <td>{{ $d['spesialisasi'] }}</td>
                    <td>
                        @if ($d['status'] == 'Aktif')
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data dokter belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection