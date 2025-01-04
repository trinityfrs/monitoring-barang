@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>

            <form method="GET" class="d-flex">
                <input
                    type="text"
                    name="search"
                    id="search"
                    class="form-control me-2"
                    placeholder="Cari barang..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Art. No</th>
                            <th>Shelf</th>
                            <th>Quantity In</th>
                            <th>Date</th>
                            <th>Quantity Out</th>
                            <th>Balance Quantity</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->art_no }}</td>
                                <td>{{ $item->shelf }}</td>
                                <td>{{ $item->quantity_in }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{{ $item->quantity_out }}</td>
                                <td>{{ $item->balance_quantity }}</td>
                                <td>{{ $item->updated_at->format('d M Y') }}</td>
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

    <script>
        const searchInput = document.getElementById('search');

        searchInput.onchange = () => {
          
        }

    </script>
@endsection

