@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold">Tambah Transaksi</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="transaction_date" class="form-label">Tanggal Transaksi:</label>
                    <input type="date" id="transaction_date" name="transaction_date" class="form-control" value="{{ old('transaction_date') }}">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis Transaksi:</label>
                    <select id="type" name="type" class="form-control">
                        <option value="in" {{ old('type') === 'in' ? 'selected' : '' }}>Masuk</option>
                        <option value="out" {{ old('type') === 'out' ? 'selected' : '' }}>Keluar</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="product_id" class="form-label">Produk:</label>
                    <select id="product_id" name="product_id" class="form-control">
                        @foreach($products as $p)
                            <option value="{{ $p->id }}" {{ old('product_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier (opsional):</label>
                    <select id="supplier_id" name="supplier_id" class="form-control">
                        <option value="">-- Tidak Ada --</option>
                        @foreach($suppliers as $s)
                            <option value="{{ $s->id }}" {{ old('supplier_id') == $s->id ? 'selected' : '' }}>
                                {{ $s->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" min="1">
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">Catatan:</label>
                    <textarea id="notes" name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
