<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Penghapusan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Konfirmasi Penghapusan Barang</h1>

    <p class="text-center">Apakah kamu yakin ingin menghapus barang berikut?</p>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $product['name'] }}</h4>
            <p><strong>Deskripsi:</strong> {{ $product['description'] }}</p>
            <p><strong>Stok:</strong> {{ $product['stock'] }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
            <p><strong>Kategori:</strong> {{ $product['category'] }}</p>
        </div>
    </div>

    <form action="{{ route('products.destroy', $product['id']) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Barang</button>
    </form>

    <a href="{{ route('products.show', $product['id']) }}" class="btn btn-secondary ms-2">Batal</a>
</div>

</body>
</html>
