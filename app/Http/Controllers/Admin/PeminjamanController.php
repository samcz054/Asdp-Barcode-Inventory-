<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pinjam;
use App\PinjamBarang;
use App\Stock;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBarangPinjam = PinjamBarang::all();
        $dataStock = Stock::all();
        $dataPeminjaman = Pinjam::all();
        return view('admin.peminjaman.index',compact('dataPeminjaman','dataStock','dataBarangPinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataStock = Stock::all();
        return view('admin.peminjaman.create',compact('dataStock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'nama_peminjam'             => 'required',
                // 'stock_id'                  => 'required|unique'
            ],
            [
                'nama_peminjam.required'  => "Nama peminjam harus diisi"
            ]
        );

        $dataPeminjaman = new Pinjam;

        $dataPeminjaman->nama_peminjam = $request->input('nama_peminjam');
        $dataPeminjaman->stock_id =  $request->stock_id;
        $dataPeminjaman->tanggal_dipinjam = Carbon::now();
        // Stock::query()->where('id', $dataPeminjaman->stock_id)
        // ->each(function($diGudang){
        //     $dipinjam = $diGudang->replicate();
        //     $dipinjam->setTable('pinjam_barangs');
        //         $dipinjam->save();
        //         $diGudang->delete();
        //     });
        $dataPeminjaman->save();
        return redirect('admin/peminjaman/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataPeminjaman = Pinjam::find($id);
        $dataPeminjaman->delete();
        // if($dataPeminjaman->delete()){
        //     PinjamBarang::where('id', $dataPeminjaman->delete($id))
        //     ->each(function($diGudang){
        //         $dipinjam = $diGudang->replicate();
        //         $dipinjam->setTable('stocks');
        //         $dipinjam->save();
        //         $diGudang->delete();
        //     });
        // }

        return redirect('admin/peminjaman/')->with('success', 'Data barang berhasil di hapus');
    }
}
