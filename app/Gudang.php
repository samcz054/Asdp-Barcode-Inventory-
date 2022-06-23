<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'nama_barang',
    ];

    public function stok(){
        return $this->hasMany(Stock::class);
    }
}
