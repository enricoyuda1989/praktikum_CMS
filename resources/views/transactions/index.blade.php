@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4 text-dark fw-semibold">DAFTAR TRANSAKSI</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">
            + Tambah Transaksi
        </a>
        <p class="mb-0 text-muted">Total Transaksi: {{ $transactions->count() }}</p>
    </div>

    @if ($transactions->count())
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 5%">ID</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->transaction_date)->format('d-m-Y') }}</td>
                    <td>
                        <span class="badge {{ $t->type === 'in' ? 'bg-success' : 'bg-danger' }}">
                            {{ $t->type === 'in' ? 'Masuk' : 'Keluar' }}
                        </span>
                    </td>
                    <td>{{ $t->product->name }}</td>
                    <td>{{ $t->product->category->name }}</td>
                    <td>{{ $t->supplier->name ?? '-' }}</td>
                    <td>{{ $t->quantity }}</td>
                    <td>{{ $t->notes ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-info text-center">
        Belum ada transaksi yang tercatat.
    </div>
    @endif
</div>
@endsection
