@extends('layouts.app')

@section('title', 'Konfirmasi Penghapusan Supplier')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Konfirmasi Penghapusan Supplier</h1>

    <p class="text-center">Apakah kamu yakin ingin menghapus supplier berikut?</p>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $supplier['name'] }}</h4>
            <p><strong>Nomor HP:</strong> {{ $supplier['contact'] ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $supplier['address'] ?? '-' }}</p>
            <p><strong>ID Supplier:</strong> {{ $supplier['id'] }}</p>
        </div>
    </div>

    <form action="{{ route('suppliers.destroy', $supplier['id']) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Supplier</button>
    </form>

    <a href="{{ route('suppliers.show', $supplier['id']) }}" class="btn btn-secondary ms-2">Batal</a>
</div>
@endsection
