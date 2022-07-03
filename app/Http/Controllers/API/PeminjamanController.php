<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pinjam;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PeminjamanController extends Controller
{

    public function detailBarang(Request $request){

        $stock = Stock::with('barang')->where('kode_barang',$request->kode_barang)->first();
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
                'nama_barang' => $stock->barang->nama_barang,
                'kode_barang' => $stock->kode_barang,
                'nomor_seri'  => $stock->nomor_seri
            ],201);
        }
        // jika barang dipinjam
        else if($stock->pinjam){
            return response()->json([
                'nama_peminjam' => $stock->pinjam->nama_peminjam,
                'nama_barang' => $stock->barang->nama_barang,
                'kode_barang' => $stock->kode_barang,
                'nomor_seri'  => $stock->nomor_seri
            ],201);
        }
    }


    public function pinjam(Request $request){
        $dataStock = Stock::with('pinjam')->where('kode_barang' ,$request->kode_barang)->first();
        
        if(empty($dataStock)){
            return response()->json([
                "error" =>  "Barang tidak terdaftar"
            ],404);
        }
        if($dataStock->pinjam){
            return response()->json([
                "error" =>  "Barang saat ini sudah dipinjam"
            ],404);
        }
        if(empty($dataStock->pinjam)){

            $request->validate([
                'nama_peminjam' => 'required',
            ],[
                'nama_peminjam.required'   => 'harap isi nama peminjam'
            ]);

            $dataPeminjaman = new Pinjam;
            $dataPeminjaman->nama_peminjam = $request->input('nama_peminjam');
            $dataPeminjaman->stock_id = Stock::where('kode_barang',$request->kode_barang)->first()->id;
            $dataPeminjaman->tanggal_dipinjam = Carbon::now();
            $dataPeminjaman->save();
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
            $pinjam = Pinjam::find($dataPeminjaman->pinjam->id);
            $pinjam->delete();
            return response()->json([
                'berhasil' => 'barang berhasil dikembalikan'
            ],201);
            
        }
    }
}
