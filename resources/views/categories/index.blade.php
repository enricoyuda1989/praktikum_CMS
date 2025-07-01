@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4 text-dark fw-semibold">DAFTAR KATEGORI</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                + Tambah Kategori
            </a>
        @endif
    @endauth
    <p class="mb-0 text-muted">Total Kategori: {{ $categories->count() }}</p>
</div>

    @if ($categories->count())
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 10%">ID</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none text-dark">
                            {{ $category->name }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-info text-center">
        Belum ada kategori yang tersedia.
    </div>
    @endif
</div>
@endsection
