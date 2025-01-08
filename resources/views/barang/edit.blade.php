@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0">Edit Barang</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="art_no" class="form-label">Art. No</label>
                    <input type="text" id="art_no" name="art_no" value="{{ $barang->art_no }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="shelf" class="form-label">Shelf</label>
                    <input type="text" id="shelf" name="shelf" value="{{ $barang->shelf }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="quantity_in" class="form-label">Quantity In</label>
                    <input type="number" id="quantity_in" name="quantity_in" value="{{ $barang->quantity_in }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="quantity_out" class="form-label">Quantity Out</label>
                    <input type="number" id="quantity_out" name="quantity_out" value="{{ $barang->quantity_out }}" class="form-control" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
