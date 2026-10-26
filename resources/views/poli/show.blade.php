<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Poli</title>
</head>
<body>
    <h1>Detail Poli</h1>

    <p>
        <strong>Kode Poli:</strong>
        {{ $poli->poli_code }}
    </p>

    <p>
        <strong>Nama Poli:</strong>
        {{ $poli->name }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $poli->is_active ? 'Aktif' : 'Tidak Aktif' }}
    </p>

    <h2>Daftar Dokter</h2>

    @if ($poli->doctors->isEmpty())
        <p>Belum ada dokter yang terdaftar di poli ini.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Spesialisasi</th>
                    <th>No. Telepon</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poli->doctors as $index => $dokter)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dokter->doctor_code }}</td>
                        <td>{{ $dokter->name }}</td>
                        <td>{{ $dokter->specialization }}</td>
                        <td>{{ $dokter->phone ?? '-' }}</td>
                        <td>
                            {{ $dokter->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p>
        <a href="{{ route('poli.index') }}">Kembali ke Daftar Poli</a>
    </p>
</body>
</html>
