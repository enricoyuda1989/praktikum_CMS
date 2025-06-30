@extends('layouts.app')

@section('title', 'Tambah Barang Baru')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold">Tambah Barang Baru</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori:</label>
                    <select id="category_id" name="category_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                 <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier:</label>
                    <select id="supplier_id" name="supplier_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok:</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga:</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi:</label>
                    <textarea id="description" name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

               <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>  

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection