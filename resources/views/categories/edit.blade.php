@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Edit Kategori</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong> {{ $errors->first() }}
    </div>
    @endif

    <form action="{{ route('categories.update', $category['id']) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori:</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="{{ old('name', $category['name']) }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Deskripsi:</label>
            <input type="text" class="form-control" name="description" id="description"
                   value="{{ old('description', $category['description']) }}">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('categories.show', $category['id']) }}" class="btn btn-secondary">← Kembali ke Detail</a>
        </div>
    </form>
</div>
@endsection
