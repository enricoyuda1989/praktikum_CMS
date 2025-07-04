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
        <p><strong>Deskripsi:</strong> {{ $category['description'] ?? '-' }}</p>

        <div class="d-grid gap-2 mt-4">
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('categories.edit', $category['id']) }}" class="btn btn-warning text-dark">Edit Kategori</a>
                    
                    <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" class="d-grid gap-2 mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus Kategori</button>
                    </form>
                @endif
            @endauth

            <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-2">← Kembali</a>
        </div>
    </div>
</div>
@endsection