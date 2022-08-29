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

    public function pegawai(){
        return $this->hasMany(Pinjam::class,'pegawai_id');
    }
}
