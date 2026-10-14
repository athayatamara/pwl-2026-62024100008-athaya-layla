
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>Tambah Pasien</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nomor Rekam Medis</label>
                <input type="text" name="medical_record_number"
                    class="form-control"
                    value="{{ old('medical_record_number') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Pasien</label>
                <input type="text" name="name"
                    class="form-control"
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="birth_date"
                    class="form-control"
                    value="{{ old('birth_date') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="address" class="form-control">{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="phone"
                    class="form-control"
                    value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
