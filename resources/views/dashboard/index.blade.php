@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center mt-4 mb-4">Sistem Inventaris Barang</h2>

    <h5 class="text-muted mb-2 fw-semibold">Transaksi</h5>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-light shadow-sm">
                <div class="card-body text-center">
                    <h1 class="display-4">{{ $totalTransaksiMasuk }}</h1>
                    <p class="mb-0">Transaksi Masuk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light shadow-sm">
                <div class="card-body text-center">
                    <h1 class="display-4">{{ $totalTransaksiKeluar }}</h1>
                    <p class="mb-0">Transaksi Keluar</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light shadow-sm">
                <div class="card-body text-center">
                    <h1 class="display-4">{{ $totalStock }}</h1>
                    <p class="mb-0">Stock on Hand</p>
                </div>
            </div>
        </div>
    </div>

    <h5 class="text-muted mb-2 fw-semibold">Master Data</h5>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-light shadow-sm">
                <div class="card-body text-center">
                    <h1 class="display-5">{{ $totalProduk }}</h1>
                    <p class="mb-0">Total Jenis Produk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light shadow-sm">
                <div class="card-body text-center">
                    <h1 class="display-5">{{ $totalCategory }}</h1>
                    <p class="mb-0">Total Kategori</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light shadow-sm">
                <div class="card-body text-center">
                    <h1 class="display-5">{{ $totalSupplier }}</h1>
                    <p class="mb-0">Total Supplier</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-success shadow-sm">
                <div class="card-header bg-success text-white fw-semibold">Transaksi Masuk Terbaru</div>
                <ul class="list-group list-group-flush">
                    @forelse($latestTransaksiMasuk as $transaksi)
                        <li class="list-group-item">
                            {{ \Carbon\Carbon::parse($transaksi->transaction_date)->format('d/m/Y') }} -
                            {{ $transaksi->product->name ?? '-' }} -
                            Qty: {{ $transaksi->quantity }}
                        </li>
                    @empty
                        <li class="list-group-item">Tidak ada transaksi masuk.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white fw-semibold">Transaksi Keluar Terbaru</div>
                <ul class="list-group list-group-flush">
                    @forelse($latestTransaksiKeluar as $transaksi)
                        <li class="list-group-item">
                            {{ \Carbon\Carbon::parse($transaksi->transaction_date)->format('d/m/Y') }} -
                            {{ $transaksi->product->name ?? '-' }} -
                            Qty: {{ $transaksi->quantity }}
                        </li>
                    @empty
                        <li class="list-group-item">Tidak ada transaksi keluar.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
