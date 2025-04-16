<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold">Tambah Barang Baru</h2>

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori:</label>
                    <input type="text" id="category" name="category" class="form-control" value="{{ old('category') }}" required>
                    @error('category') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok:</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
                    @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga:</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
                    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi:</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
