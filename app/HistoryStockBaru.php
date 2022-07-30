<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStockBaru extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'kode_barang',
        'nomor_seri',
        'tanggal_ditambahkan',
        'waktu',
    ];

    public function barang(){
        return $this->belongsTo(Gudang::class);
    }
}
