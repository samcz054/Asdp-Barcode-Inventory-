<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'pegawai_id',
        'tanggal_dipinjam'
    ];

    public function stock(){
        return $this->belongsTo(Stock::class,'stock_id','id');
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'pegawai_id','id');
    }
}
