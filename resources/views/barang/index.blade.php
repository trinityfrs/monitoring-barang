@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Art. No</th>
                            <th>Description</th>
                            <th>Color</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->art_no }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->color }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($barang->isEmpty())
                    <div class="text-center py-4">
                        <p class="text-muted">Belum ada data barang yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

