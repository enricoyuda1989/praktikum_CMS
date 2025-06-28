@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<div class="container mt-4">
    <h2 class="text-center fw-bold mb-4">LAPORAN</h2>

<ul class="nav nav-tabs mb-4" id="laporanTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="transaksi-tab" data-bs-toggle="tab" href="#transaksi" role="tab">Laporan Transaksi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="stok-tab" data-bs-toggle="tab" href="#stok" role="tab">Laporan Stok</a>
    </li>
</ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="transaksi" role="tabpanel">
            @include('reports.partials.transaction')
        </div>
        <div class="tab-pane fade" id="stok" role="tabpanel">
            @include('reports.partials.stock')
        </div>
    </div>
</div>
@endsection
