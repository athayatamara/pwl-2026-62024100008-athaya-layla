@extends('layouts.app')

@section('title', 'Poli')

@section('content')

<h1>Data Poli</h1>

<table border="1" cellpadding="10">

    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Poli</th>
            <th>Nama Poli</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($poli as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->poli_code }}</td>
                <td>{{ $p->name }}</td>
                <td>
                    @if ($p->is_active)
                        Aktif
                    @else
                        Tidak Aktif
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Data poli belum tersedia.</td>
            </tr>
        @endforelse
    </tbody>

</table>

@endsection