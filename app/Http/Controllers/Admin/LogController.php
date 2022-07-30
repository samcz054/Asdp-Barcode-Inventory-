<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataPeminjamanExport;
use App\Exports\DataPengembalianExport;
use App\Exports\DataStokBaruExport;
use App\HistoryPeminjaman;
use App\HistoryPengembalian;
use App\HistoryStockBaru;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Facades\Excel;

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

    public function logStok(){
        $logStock = HistoryStockBaru::orderBy('created_at', 'desc')->get();
        return view ('admin.log.stokBaru',compact('logStock'));
    }

    // Export
    public function fileExportStokBaru()
    {
        return Excel::download(new DataStokBaruExport, 'data-stock.xlsx');
    }

    public function fileExportPeminjaman()
    {
        return Excel::download(new DataPeminjamanExport, 'data-peminjaman.xlsx');
    }

    public function fileExportPengembalian()
    {
        return Excel::download(new DataPengembalianExport, 'data-pengembalian.xlsx');
    }
}
