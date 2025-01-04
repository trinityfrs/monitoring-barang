<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $search = request()->input('search');
        if ($search) {
            $barang = Barang::where('art_no', 'like', "%{$search}%")->get();
        } else {
            $barang = Barang::all();
        }
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'art_no' => 'required',
            'shelf' => 'required',
            'quantity_in' => 'required',
        ]);

        $validated['balance_quantity'] = $validated['quantity_in'];

        Barang::create($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'art_no' => 'required',
            'shelf' => 'required',
            'quantity_out' => 'required',
            function ($attribute, $value, $fail) use ($barang) {
                if ($value > $barang->balance_quantity) {
                    $fail('Quantity out tidak boleh lebih besar dari balance quantity.');
                }
            },
        ]);

        $balance_quantity = $barang->quantity_in - $validated['quantity_out'];
        $barang->update([
            'quantity_out' => $validated['quantity_out'],
            'balance_quantity' => $balance_quantity,
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
