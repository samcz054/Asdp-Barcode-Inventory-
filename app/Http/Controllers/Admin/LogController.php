<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataPeminjamanExport;
use App\Exports\DataStokExport;
use App\HistoryStockBaru;
use App\Http\Controllers\Controller;
use App\LogTransaksi;
use Maatwebsite\Excel\Facades\Excel;

class LogController extends Controller
{
    public function logTransaksi(){
        $logTransaksi = LogTransaksi::orderBy('created_at', 'desc')->get();
        return view('admin.log.transaksi',compact('logTransaksi'));
    }

    public function logStok(){
        $logStock = HistoryStockBaru::orderBy('created_at', 'desc')->get();
        return view('admin.log.stokBaru',compact('logStock'));
    }

    // Export
    public function fileExportStokBaru()
    {
        return Excel::download(new DataStokExport, 'data-stock.xlsx');
    }

    public function fileExportPeminjaman(){
        return Excel::download(new DataPeminjamanExport, 'data-peminjaman-pengembalian.xlsx');
    }

}
