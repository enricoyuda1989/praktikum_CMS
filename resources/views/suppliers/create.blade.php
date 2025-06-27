@extends('layouts.app')

@section('title', 'Tambah Supplier Baru')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold">Tambah Supplier Baru</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Supplier:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Nomor HP:</label>
                    <input type="text" id="contact" name="contact" class="form-control" placeholder="Contoh: 081234567890" value="{{ old('contact') }}">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat:</label>
                    <textarea id="address" name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
