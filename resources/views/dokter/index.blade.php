
@extends('layouts.app')

@section('title', 'Dokter')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Dokter</h1>

        <a href="{{ route('dokter.create') }}" class="btn btn-primary">
            + Tambah Dokter
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
                    <th>Nomor</th>
                    <th>Kode Dokter</th>
                    <th>Nama</th>
                    <th>Spesialisasi</th>
                    <th>Poli</th>
                    <th>No. Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($doctors as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->doctor_code }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->specialization }}</td>
                        <td>{{ $d->poli?->name ?? '-' }}</td>
                        <td>{{ $d->phone ?? '-' }}</td>
                        <td>
                            @if ($d->is_active)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dokter.edit', $d->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('dokter.destroy', $d->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus dokter ini?')">
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
                            Data dokter belum tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
