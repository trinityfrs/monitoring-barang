<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'art_no',
        'shelf',
        'quantity_in',
        'date_in',
        'quantity_out',
        'date_out',
        'balance_quantity',
    ];
}
