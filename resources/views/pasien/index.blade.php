\
@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')

<h1>Data Pasien</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered" cellpadding="8">
    <thead>
        <tr>
            <th>No.</th>
            <th>No. Rekam Medis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($patients as $patient)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $patient->medical_record_number }}</td>
                <td>{{ $patient->name }}</td>
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
                <td colspan="5">
                    Belum ada data pasien.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
