@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Art. No</label>
            <input type="text" name="nama_barang" value="{{ $barang->art_no }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="number" name="stok" value="{{ $barang->description }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="text" name="kategori" value="{{ $barang->color }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
