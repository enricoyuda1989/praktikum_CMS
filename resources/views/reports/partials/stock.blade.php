<div class="container py-5">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th class="fw-bold text-body">Nama Barang</th>
                <th class="fw-bold text-body">Kategori</th>
                <th class="fw-bold text-body">Supplier</th>
                <th class="fw-bold text-body">Stok</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <td>
                <span class="text-body d-block">{{ $product->name }}</span>
            </td>
            <td>
                <span class="text-muted d-block">{{ $product->category->name ?? '-' }}</span>
            </td>
            <td>
                <span class="text-muted d-block">{{ $product->supplier->name ?? '-' }}</span>
            </td>
            <td>
                <span class="text-dark fw-semibold d-block">{{ $product->stock }}</span>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
