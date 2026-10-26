<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter</title>
</head>
<body>
    <h2>Tambah Data Dokter</h2>

    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf

        <label>Kode Dokter</label><br>
        <input type="text" name="doctor_code" value="{{ old('doctor_code') }}" required>
        @error('doctor_code')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Nama Dokter</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Spesialisasi</label><br>
        <input type="text" name="specialization" value="{{ old('specialization') }}" required>
        @error('specialization')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Nomor Telepon</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}">
        <br><br>

        <label>Poli</label><br>
        <select name="poli_id">
            <option value="">-- Pilih Poli --</option>
            @foreach ($polis as $poli)
                <option value="{{ $poli->id }}"
                    {{ old('poli_id') == $poli->id ? 'selected' : '' }}>
                    {{ $poli->name }}
                </option>
            @endforeach
        </select>
        @error('poli_id')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Status</label><br>
        <select name="is_active" required>
            <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                Aktif
            </option>
            <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>
                Tidak Aktif
            </option>
        </select>
        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('dokter.index') }}">Kembali</a>
    </form>
</body>
</html>
