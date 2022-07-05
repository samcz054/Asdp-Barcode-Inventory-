<?php

namespace App\Http\Controllers\Admin;

use App\HistoryPeminjaman;
use App\HistoryPengembalian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function logPeminjaman(){
        $logPeminjaman = HistoryPeminjaman::all();
        return view ('admin.log.peminjaman',compact('logPeminjaman'));
    }

    public function logPengembalian(){
        $logPengembalian = HistoryPengembalian::all();
        return view ('admin.log.pengembalian',compact('logPengembalian'));
    }
}
