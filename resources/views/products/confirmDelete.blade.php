@extends('layouts.app')

@section('title', 'Konfirmasi Penghapusan Barang')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Konfirmasi Penghapusan Barang</h1>

    <p class="text-center">Apakah kamu yakin ingin menghapus barang berikut?</p>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="text-center mb-4">{{ $product['name'] }}</h3>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image->image_path) }}" alt="Gambar {{ $product->image->title }}" width="300" class="d-block mx-auto mb-4">
            @endif
            <p><strong>Deskripsi:</strong> {{ $product['description'] }}</p>
            <p><strong>Stok:</strong> {{ $product['stock'] }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
            <p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>
            <p><strong>Supplier:</strong> {{ $product->supplier->name ?? '-' }}</p>
        </div>
    </div>

    <form action="{{ route('products.destroy', $product['id']) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Barang</button>
    </form>

    <a href="{{ route('products.show', $product['id']) }}" class="btn btn-secondary ms-2">Batal</a>
</div>
@endsection
