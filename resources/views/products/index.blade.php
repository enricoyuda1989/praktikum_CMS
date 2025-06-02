@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="container py-5">
        <h1 class="text-center mb-4">DAFTAR BARANG</h1>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        </div>
        @endif

        <div class="d-flex justify-content-start mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Barang
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted small">Total Barang: {{ $totalProducts }}</span>

    <a href="{{ route('products.index', ['sort' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}" 
       class="text-decoration-none fs-4" title="Urutkan Kategori">
        @if($sortOrder === 'asc')
            <i class="bi bi-arrow-down-circle text-muted"></i>
        @else
            <i class="bi bi-arrow-up-circle text-muted"></i>
        @endif
    </a>
</div>

<table class="table table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th class="fw-bold text-body">Nama Barang</th>
            <th class="fw-bold text-body">Kategori</th>
            <th class="fw-bold text-body">Supplier</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
    <tr>
        <td>
            <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-body d-block">
                {{ $product->name }}
            </a>
        </td>
        <td>
            <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-muted d-block">
                {{ $product->category ? $product->category->name : '-' }}
            </a>
        </td>
        <td>
            <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-muted d-block">
                {{ $product->supplier ? $product->supplier->name : '-' }}
            </a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

@endsection
