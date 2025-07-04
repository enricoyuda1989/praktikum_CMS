@extends('layouts.app')

@section('title', $supplier['name'])

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">{{ $supplier['name'] }}</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card p-4 shadow-sm">
        <p><strong>ID Supplier:</strong> {{ $supplier['id'] }}</p>
        <p><strong>Nama Supplier:</strong> {{ $supplier['name'] }}</p>
        <p><strong>Nomor HP:</strong> {{ $supplier['contact'] ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $supplier['address'] ?? '-' }}</p>

        <div class="d-grid gap-2 mt-4">
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('suppliers.edit', $supplier['id']) }}" class="btn btn-warning text-dark">Edit Supplier</a>
            
            <form action="{{ route('suppliers.destroy', $supplier['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus supplier ini?')" class="d-grid gap-2 mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus Supplier</button>
            </form>
        @endif
    @endauth
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mt-2">← Kembali</a>
</div>
    </div>
</div>
@endsection
