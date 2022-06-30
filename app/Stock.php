<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'kode_barang',
        'nomor_seri'
        
    ];

    public function barang(){
        return $this->belongsTo(Gudang::class);
    }

    public function pinjam(){
        return $this->hasOne(Pinjam::class,'stock_id');
    }
}
