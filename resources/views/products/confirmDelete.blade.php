<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Penghapusan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center">Konfirmasi Penghapusan Barang</h1>
        <p>Apakah kamu yakin ingin menghapus barang berikut?</p>

        <div class="card p-4 mb-4">
            <h3>{{ $product['name'] }}</h3>
            <p><strong>Deskripsi:</strong> {{ $product['description'] }}</p>
            <p><strong>Stok:</strong> {{ $product['stock'] }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
            <p><strong>Kategori:</strong> {{ $product['category'] }}</p>
        </div>

        <form action="{{ route('products.destroy', $product['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus Barang</button>
        </form>
        
        <br>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
