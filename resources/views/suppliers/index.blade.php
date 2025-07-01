@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4 text-dark fw-semibold">DAFTAR SUPPLIER</h1>

   <div class="d-flex justify-content-between align-items-center mb-3">
    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
                + Tambah Supplier
            </a>
        @endif
    @endauth
    <p class="mb-0 text-muted">Total Supplier: {{ $suppliers->count() }}</p>
</div>

    @if ($suppliers->count())
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 10%">ID</th>
                    <th>Nama Supplier</th>
                    <th>Nomor HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>
                        <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-decoration-none text-dark">
                            {{ $supplier->name }}
                        </a>
                    </td>
                    <td>{{ $supplier->contact ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-info text-center">
        Belum ada supplier yang tersedia.
    </div>
    @endif
</div>
@endsection
