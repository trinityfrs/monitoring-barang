@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0">Tambah Barang</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="art_no" class="form-label">Art. No</label>
                    <input type="text" id="art_no" name="art_no" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="shelf" class="form-label">Shelf</label>
                    <input type="text" id="shelf" name="shelf" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
