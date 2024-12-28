<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'nama_barang' => 'Laptop',
            'stok' => 15,
            'kategori' => 'Elektronik',
        ]);

        Barang::create([
            'nama_barang' => 'Meja Kantor',
            'stok' => 30,
            'kategori' => 'Furniture',
        ]);

        Barang::create([
            'nama_barang' => 'Printer',
            'stok' => 10,
            'kategori' => 'Elektronik',
        ]);
    }
}
