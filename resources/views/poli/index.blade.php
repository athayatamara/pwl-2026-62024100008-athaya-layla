
@extends('layouts.app')

@section('title', 'Data Poli')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Poli</h1>
        <a href="{{ route('poli.create') }}" class="btn btn-primary">
            + Tambah Poli
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
                    <th>Kode Poli</th>
                    <th>Nama Poli</th>
                    <th>Status</th>
                    <th width="250">Aksi</th>
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
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('poli.show', $p->id) }}"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('poli.edit', $p->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('poli.destroy', $p->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data poli ini?')">
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
                        <td colspan="5" class="text-center">
                            Data poli belum tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
