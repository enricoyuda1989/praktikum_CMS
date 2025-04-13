<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Barang</h1>

        <!-- Tombol Tambah Barang -->
        <div class="mb-4">
            <a href="{{ route('products.create') }}" class="btn btn-primary">➕ Tambah Barang</a>
        </div>

        <!-- Daftar Produk -->
        @if (count($products) > 0)
            <ul class="list-group">
                @foreach ($products as $id => $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('products.show', $id) }}" class="text-decoration-none text-primary">{{ $product['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-muted">Belum ada produk ditambahkan.</p>
        @endif
    </div>

    <!-- Link ke Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
