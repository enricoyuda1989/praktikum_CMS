{{-- Filter Form --}}
<form method="GET" action="{{ route('reports.index') }}" class="row g-3 mb-4">
    <div class="col-md-5">
        <label for="start_date" class="form-label">Tanggal Mulai</label>
        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="form-control">
    </div>
    <div class="col-md-5">
        <label for="end_date" class="form-label">Tanggal Akhir</label>
        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="form-control">
    </div>
    <div class="col-md-2 d-flex align-items-end">
        <button type="submit" class="btn btn-primary w-100">Terapkan</button>
    </div>
</form>

{{-- Ringkasan di Atas --}}
@php
    $totalMasuk = 0;
    $totalKeluar = 0;
    $jumlahTransaksiMasuk = 0;
    $jumlahTransaksiKeluar = 0;
@endphp

@foreach ($transactions as $transaction)
    @if ($transaction->type === 'in')
        @php
            $totalMasuk += $transaction->quantity;
            $jumlahTransaksiMasuk++;
        @endphp
    @elseif ($transaction->type === 'out')
        @php
            $totalKeluar += $transaction->quantity;
            $jumlahTransaksiKeluar++;
        @endphp
    @endif
@endforeach

<div class="row text-center mb-4">
    <div class="col-md-6">
        <div class="border rounded p-3 bg-white shadow-sm">
            <h5 class="fw-semibold mb-1">Barang Masuk</h5>
            <p class="mb-0">Total: {{ $totalMasuk }} | Transaksi: {{ $jumlahTransaksiMasuk }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="border rounded p-3 bg-white shadow-sm">
            <h5 class="fw-semibold mb-1">Barang Keluar</h5>
            <p class="mb-0">Total: {{ $totalKeluar }} | Transaksi: {{ $jumlahTransaksiKeluar }}</p>
        </div>
    </div>
</div>

@if ($transactions->count())
<div class="table-responsive">
    <table class="table table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th class="fw-bold text-body">Tanggal</th>
            <th class="fw-bold text-body">Jenis</th>
            <th class="fw-bold text-body">Produk</th>
            <th class="fw-bold text-body">Kategori</th>
            <th class="fw-bold text-body">Supplier</th>
            <th class="fw-bold text-body">Jumlah</th>
            <th class="fw-bold text-body">Catatan</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($transactions as $transaction)
        <tr>
            <td class="text-muted">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y') }}</td>
            <td>
                    <span class="badge bg-{{ $transaction->type === 'in' ? 'success' : 'danger' }}">
                        {{ $transaction->type === 'in' ? 'Masuk' : 'Keluar' }}
                    </span>
            </td>
            <td class="text-body">{{ $transaction->product->name ?? '-' }}</td>
            <td class="text-muted">{{ $transaction->product->category->name ?? '-' }}</td>
            <td class="text-muted">{{ $transaction->supplier->name ?? '-' }}</td>
            <td class="text-dark">{{ $transaction->quantity }}</td>
            <td class="text-muted">{{ $transaction->notes ?? '-' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@else
<div class="alert alert-info text-center">
    Tidak ada data transaksi pada rentang tanggal ini.
</div>
@endif