@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Edit Supplier</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong> {{ $errors->first() }}
    </div>
    @endif

    <form action="{{ route('suppliers.update', $supplier['id']) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Supplier:</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="{{ old('name', $supplier['name']) }}">
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Nomor HP:</label>
            <input type="text" class="form-control" name="contact" id="contact"
                   value="{{ old('contact', $supplier['contact']) }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat:</label>
            <input type="text" class="form-control" name="address" id="address"
                   value="{{ old('address', $supplier['address']) }}">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('suppliers.show', $supplier['id']) }}" class="btn btn-secondary">← Kembali ke Detail</a>
        </div>
    </form>
</div>
@endsection
