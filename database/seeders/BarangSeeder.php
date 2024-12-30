<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'art_no' => '13093291026',
            'description' => 'Raukantex Decor',
            'color' => '420L',
        ]);
        Barang::create([
            'art_no' => '13093291030',
            'description' => 'Raukantex Decor',
            'color' => '646L',
        ]);
        Barang::create([
            'art_no' => '13105811023',
            'description' => 'Raukantex Decor Sonoma Oak',
            'color' => '1268B',
        ]);


    }
}
