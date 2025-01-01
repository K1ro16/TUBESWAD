<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Promosi</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Promosi</h2>
        <form action="{{ route('promosi.update', $promosi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                        <span class="floating-label">🏷️ Promo Code</span>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul promosi" required>
                    </div>
                    <div class="mb-3">
                        <span class="floating-label">✏️ Description</span>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi promosi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <span class="floating-label">💰 Discount (%)</span>
                        <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Masukkan diskon dalam persen" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('promosi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
