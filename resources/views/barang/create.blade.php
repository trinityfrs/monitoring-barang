@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Barang</h1>
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Art. No</label>
            <input type="text" name="art_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="number" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="text" name="color" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
