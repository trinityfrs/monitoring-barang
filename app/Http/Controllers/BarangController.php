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

    public function addQuantityIn($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.add', compact('barang'));
    }

    public function storeQuantityIn(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'quantity_in' => 'required|integer|min:1',
            'date_in' => 'required|date',
        ]);

        $barang->quantity_in += $validated['quantity_in'];
        $barang->balance_quantity += $validated['quantity_in'];
        $barang->date_in = $validated['date_in'];

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Quantity In berhasil ditambahkan');
    }

    public function addQuantityOut($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.out', compact('barang'));
    }

    public function storeQuantityOut(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'quantity_out' => 'required|integer|min:1',
            'date_out' => 'required|date',
        ]);

        if ($validated['quantity_out'] > $barang->balance_quantity) {
            return redirect()->back()->withErrors(['quantity_out' => 'Quantity out tidak boleh melebihi balance quantity.']);
        }

        $barang->quantity_out += $validated['quantity_out'];
        $barang->balance_quantity -= $validated['quantity_out'];
        $barang->date_out = $validated['date_out'];

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Quantity Out berhasil ditambahkan');
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
        ]);

        $barang->update([
            'art_no' => $validated['art_no'],
            'shelf' => $validated['shelf'],
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
