<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_buku',
        'penjualan_max',
        'penjualan_min',
        'persediaan_max',
        'persediaan_min',
        'cetak_max',
        'cetak_min',
        'banyak_terjual',
        'persediaan_buku'
    ];
}
