<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'kode_barang',
    ];

    public function barang(){
        return $this->belongsTo(Gudang::class);
    }
}
