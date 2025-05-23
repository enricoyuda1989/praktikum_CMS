@extends('layouts.app')

@section('title', $product['name'])

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">{{ $product['name'] }}</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card p-4 shadow-sm">
        <p><strong>Deskripsi:</strong> {{ $product['description'] }}</p>
        <p><strong>Stok:</strong> {{ $product['stock'] }}</p>
        <p><strong>Harga:</strong> Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
        <p><strong>Kategori:</strong> {{ $product['category_id'] }}</p>

        <div class="d-grid gap-2 mt-4">
            <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-warning text-dark">Edit Barang</a>
            <a href="{{ route('products.confirmDelete', $product['id']) }}" class="btn btn-danger">Hapus Barang</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection
