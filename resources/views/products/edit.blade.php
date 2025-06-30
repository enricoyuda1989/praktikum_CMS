@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Edit Barang</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong> {{ $errors->first() }}
    </div>
@endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product['name']) }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option disabled selected>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

       <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier:</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                <option disabled selected>Pilih Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}"
                        {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga:</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product['price']) }}">
        </div>

        <input type="hidden" name="stock" value="{{ $product->stock }}">

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi:</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $product['description']) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ubah Gambar Produk</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
         @if($product->image)
            <div class="text-center">
                <img src="{{ asset($product->image->image_path) }}" alt="Gambar {{ $product->image->title }}" width="200" class="d-block mx-auto my-3 rounded shadow">
            </div>
        @endif

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('products.show', $product['id']) }}" class="btn btn-secondary">← Kembali ke Detail</a>
        </div>
    </form>
</div>
@endsection