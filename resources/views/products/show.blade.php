<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">{{ $product['name'] }}</h1>

    <div class="card p-4 shadow-sm">
        <p><strong>Deskripsi:</strong> {{ $product['description'] }}</p>
        <p><strong>Stok:</strong> {{ $product['stock'] }}</p>
        <p><strong>Harga:</strong> Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
        <p><strong>Kategori:</strong> {{ $product['category'] }}</p>

        <div class="d-grid gap-2 mt-4">
            <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-warning text-dark">Edit Barang</a>
            <a href="{{ route('products.confirmDelete', $product['id']) }}" class="btn btn-danger">Hapus Barang</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>

</body>
</html>
