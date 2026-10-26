
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokter</title>
</head>
<body>
    <h2>Edit Data Dokter</h2>

    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kode Dokter</label><br>
        <input
            type="text"
            name="doctor_code"
            value="{{ old('doctor_code', $dokter->doctor_code) }}"
            required
        >
        @error('doctor_code')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Nama Dokter</label><br>
        <input
            type="text"
            name="name"
            value="{{ old('name', $dokter->name) }}"
            required
        >
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Spesialisasi</label><br>
        <input
            type="text"
            name="specialization"
            value="{{ old('specialization', $dokter->specialization) }}"
            required
        >
        @error('specialization')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Nomor Telepon</label><br>
        <input
            type="text"
            name="phone"
            value="{{ old('phone', $dokter->phone) }}"
        >
        @error('phone')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <label>Poli</label><br>
        <select name="poli_id">
            <option value="">-- Pilih Poli --</option>

            @foreach ($polis as $poli)
                <option
                    value="{{ $poli->id }}"
                    {{ (string) old('poli_id', $dokter->poli_id) === (string) $poli->id ? 'selected' : '' }}
                >
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
            <option value="1" {{ (string) old('is_active', $dokter->is_active) === '1' ? 'selected' : '' }}>
                Aktif
            </option>
            <option value="0" {{ (string) old('is_active', $dokter->is_active) === '0' ? 'selected' : '' }}>
                Tidak Aktif
            </option>
        </select>
        @error('is_active')
            <p>{{ $message }}</p>
        @enderror
        <br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('dokter.index') }}">Kembali</a>
    </form>
</body>
</html>
