<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPeminjaman extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'stock_id',
        'nama_peminjam',
        'tanggal_dipinjam',
        'waktu',
    ];


    public function stock(){
        return $this->belongsTo(Stock::class,'stock_id','id');
    }
}
