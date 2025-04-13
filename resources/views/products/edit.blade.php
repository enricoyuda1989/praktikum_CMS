<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center">Edit Barang</h1>

        <form action="{{ route('products.update', $product['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="name" value="{{ $product['name'] }}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori:</label>
                <input type="text" class="form-control" name="category" value="{{ $product['category'] }}">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stok:</label>
                <input type="number" class="form-control" name="stock" value="{{ $product['stock'] }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga:</label>
                <input type="number" class="form-control" name="price" value="{{ $product['price'] }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea class="form-control" name="description">{{ $product['description'] }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>

        <br>
        <a href="{{ route('products.show', $product['id']) }}" class="btn btn-secondary">← Kembali ke Detail</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
