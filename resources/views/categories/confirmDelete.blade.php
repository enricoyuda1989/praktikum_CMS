@extends('layouts.app')

@section('title', 'Konfirmasi Penghapusan Kategori')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Konfirmasi Penghapusan Kategori</h1>

    <p class="text-center">Apakah kamu yakin ingin menghapus kategori berikut?</p>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $category['name'] }}</h4>
            <p><strong>Deskripsi:</strong> {{ $category['description'] ?? '-' }}</p>
            <p><strong>ID Kategori:</strong> {{ $category['id'] }}</p>
        </div>
    </div>

    <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Kategori</button>
    </form>

    <a href="{{ route('categories.show', $category['id']) }}" class="btn btn-secondary ms-2">Batal</a>
</div>
@endsection
