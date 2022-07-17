<?php

namespace App\Http\Controllers\Admin;

use App\HistoryPeminjaman;
use App\HistoryPengembalian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function logPeminjaman(){
        $logPeminjaman = HistoryPeminjaman::orderBy('created_at', 'desc')->get();
        return view ('admin.log.peminjaman',compact('logPeminjaman'));
    }

    public function logPengembalian(){
        $logPengembalian = HistoryPengembalian::orderBy('created_at', 'desc')->get();
        return view ('admin.log.pengembalian',compact('logPengembalian'));
    }
}
