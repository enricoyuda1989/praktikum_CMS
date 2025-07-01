@extends('layouts.app')

@section('title', $category['name'])

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">{{ $category['name'] }}</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card p-4 shadow-sm">
        <p><strong>ID Kategori:</strong> {{ $category['id'] }}</p>
        <p><strong>Nama Kategori:</strong> {{ $category['name'] }}</p>
        <p><strong>Deskripsi:</strong> {{ $category['description'] }}</p>

        <div class="d-grid gap-2 mt-4">
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('categories.edit', $category['id']) }}" class="btn btn-warning text-dark">Edit Barang</a>
            <a href="{{ route('categories.confirmDelete', $category['id']) }}" class="btn btn-danger">Hapus Barang</a>
        @endif
    @endauth
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">← Kembali</a>
</div>
    </div>
</div>
@endsection
