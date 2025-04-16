<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-4">Daftar Barang</h1>

        <div class="d-flex justify-content-start mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Barang
            </a>
        </div>

        <div class="list-group">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product['id']) }}" class="list-group-item list-group-item-action">
                    {{ $product['name'] }}
                </a>
            @endforeach
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>
</html>
