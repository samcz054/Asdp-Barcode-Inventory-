<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'divisi',
        'nik',
    ];

    public function pinjam(){
        return $this->hasMany(Pinjam::class,'pegawai_id');
    }

    public function logTransaksi(){
        return $this->hasMany(LogTransaksi::class,'pegawai_id');
    }
}
