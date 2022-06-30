<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'nama_peminjam',
        'tanggal_dipinjam'
    ];

    public function kodeBarang(){
        return $this->belongsTo(Stock::class,'stock_id','id');
    }
}
