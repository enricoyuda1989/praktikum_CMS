@extends('layouts.app')

@section('title', 'Tambah Barang Baru')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold">Tambah Barang Baru</h2>

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori:</label>
                    <input type="text" id="category_id" name="category_id" class="form-control" value="{{ old('category_id') }}" required>
                    @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok:</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
                    @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga:</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
                    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi:</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection