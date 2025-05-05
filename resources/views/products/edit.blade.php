@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Edit Barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product['id']) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product['name']) }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <input type="text" class="form-control" name="category_id" id="category_id" value="{{ old('category_id', $product['category_id']) }}">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok:</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock', $product['stock']) }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga:</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product['price']) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi:</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $product['description']) }}</textarea>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('products.show', $product['id']) }}" class="btn btn-secondary">← Kembali ke Detail</a>
        </div>
    </form>
</div>
@endsection