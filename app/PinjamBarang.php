<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'nama_peminjam',
        'tanggal_dipinjam'
    ];

}
