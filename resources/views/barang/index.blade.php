@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Monitoring Barang</h1>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Art. No</th>
                <th>Description</th>
                <th>Color</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->art_no }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->color }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
