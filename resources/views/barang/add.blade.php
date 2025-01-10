@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0">Tambah Quantity In</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.storeQuantityIn', $barang->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="art_no" class="form-label">Art No</label>
                    <input type="text" id="art_no" value="{{ $barang->art_no }}" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="quantity_in" class="form-label">Quantity In</label>
                    <input type="number" id="quantity_in" name="quantity_in" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="date_in" class="form-label">Tanggal Masuk</label>
                    <input type="date" id="date_in" name="date_in" class="form-control" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
