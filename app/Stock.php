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
        'tanggal_ditambahkan'
        
    ];

    public function barang(){
        return $this->belongsTo(Gudang::class);
    }
}
