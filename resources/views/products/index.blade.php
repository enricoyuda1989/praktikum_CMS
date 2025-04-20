@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="container py-5">
        <h1 class="text-center mb-4">Daftar Barang</h1>

        <div class="d-flex justify-content-start mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Barang
            </a>
        </div>

        <div class="list-group">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product['id']) }}" class="list-group-item list-group-item-action">
                    {{ $product['name'] }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
