<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan',
        'stock_id',
        'pegawai_id',
        'tanggal_dipinjam',
        'waktu'
    ];

    public function stock(){
        return $this->belongsTo(Stock::class,'stock_id','id');
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'pegawai_id','id');
    }
}
