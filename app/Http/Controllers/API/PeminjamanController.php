<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\LogTransaksi;
use App\Pegawai;
use App\Pinjam;
use App\Stock;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{

    public function getPegawai(){
        $dataPegawai = Pegawai::all();

        return response()->json($dataPegawai,200);
    }

    public function cekKodeBarang($kode_barang){
        $stock = Stock::with('barang')->where('kode_barang',$kode_barang)->first();

        if(empty($stock)){
            return response()->json([
                'error'     => 'Barang tidak ada dalam inventaris'
            ],404);
        } else if ($stock->pinjam){
            return response()->json([
                'error'     => 'Barang sudah dipinjam'
            ],404);
        }else if(empty($stock->pinjam)){
            return response()->json([
                'message'   => 'Barang siap dipinjam'
            ],201);
        }
    }

    public function detailBarang($kode_barang){

        // $stock = Stock::with('barang')->where('kode_barang',$request->kode_barang)->first();
        $stock = Stock::with('barang')->where('kode_barang',$kode_barang)->first();
        //jika kode barang tidak ada
        if(empty($stock)){
            return response()->json([
                'error' => 'Barang tidak terdaftar harap hubungi pak oke'
            ],404);
        }

        // jika barang digudang
        else if(empty($stock->pinjam)){
            return response()->json([
                'nama_peminjam' => 'digudang',
                'gambar'        => $stock->barang->gambar,
                'nama_barang'   => $stock->barang->nama_barang,
                'kode_barang'   => $stock->kode_barang,
                'keterangan'    => $stock->barang->keterangan,
                'nomor_seri'    => $stock->nomor_seri
            ],201);
        }
        // jika barang dipinjam
        else if($stock->pinjam){
            return response()->json([
                'nama_peminjam' => $stock->pinjam->pegawai->nama_lengkap." - ".$stock->pinjam->pegawai->jabatan." ".$stock->pinjam->pegawai->divisi,
                'gambar'        => $stock->barang->gambar,
                'nama_barang'   => $stock->barang->nama_barang,
                'kode_barang'   => $stock->kode_barang,
                'keterangan'    => $stock->barang->keterangan,
                'nomor_seri'    => $stock->nomor_seri
            ],201);
        }
    }
    

    public function pinjam(Request $request){
        $dataStock = Stock::with('pinjam')->where('kode_barang' ,$request->kode_barang)->first();
        
        if(empty($dataStock)){
            return response()->json([
                "error" =>  "Barang tidak terdaftar"
            ],405);
        }
        if($dataStock->pinjam){
            return response()->json([
                "error" =>  "Barang saat ini sudah dipinjam"
            ],404);
        }
        if(empty($dataStock->pinjam)){

            $request->validate([
                'pegawai_id' => 'required',
            ],[
                'pegawai_id.required'   => 'harap isi nama peminjam'
            ]);
            
            $waktu = new DateTime();

            $dataPeminjaman = new Pinjam;
            $dataPeminjaman->pegawai_id = $request->pegawai_id;
            $dataPeminjaman->stock_id = Stock::where('kode_barang',$request->kode_barang)->first()->id;
            $dataPeminjaman->tanggal_dipinjam = Carbon::now();
            $dataPeminjaman->waktu = $waktu->format('H:i:s');
            $dataPeminjaman->save();
            if($dataPeminjaman->save()){
                $log = new LogTransaksi;
                $log->keterangan = "Peminjaman";
                $log->pegawai_id = $dataPeminjaman->pegawai_id;
                $log->stock_id = $dataPeminjaman->stock_id;
                $log->tanggal_dipinjam = Carbon::now();
                $log->waktu = $dataPeminjaman->waktu;
                $log->save();
            }
            return response()->json([
                $dataPeminjaman
            ],201);
        }
    }

    public function pengembalian(Request $request){

        $dataPeminjaman = Stock::with('pinjam')->where('kode_barang' ,$request->kode_barang)->first();
        
        if(empty($dataPeminjaman)){
            return response()->json([
                'error' => 'Barang tidak terdaftar'
            ],404);
        }
        if(empty($dataPeminjaman->pinjam)){
            return response()->json([
                'error' => 'Barang berada digudang'
            ],404);
        }if($dataPeminjaman->pinjam){
            $waktu = new DateTime();
            $pinjam = Pinjam::find($dataPeminjaman->pinjam->id);
            if($pinjam->delete()){
                $logPengembalian = new LogTransaksi();
                $logPengembalian->keterangan = "Pengembalian";
                $logPengembalian->pegawai_id = $pinjam->pegawai_id;
                $logPengembalian->stock_id = $pinjam->stock_id;
                $logPengembalian->tanggal_dipinjam = Carbon::now();
                $logPengembalian->waktu = $waktu->format('H:i:s');
                $logPengembalian->save();
            }
            $pinjam->delete();
            return response()->json([
                'berhasil' => 'barang berhasil dikembalikan'
            ],201);
            
        }
    }
}
