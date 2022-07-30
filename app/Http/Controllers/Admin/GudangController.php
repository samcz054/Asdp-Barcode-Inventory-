<?php

namespace App\Http\Controllers\Admin;

use App\Gudang;
use App\HistoryStockBaru;
use App\Stock;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahStock = Stock::doesntHave('pinjam')->get();
        $dataBarang = Gudang::all();
        return view('admin.gudang.index',compact('dataBarang','jumlahStock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gudang.create');
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
                'nama_barang'           => 'required',
                'nomor_seri'            => 'required',
            ],
            [
                'nama_barang.required'  => "Nama barang harus diisi",
                'nomor_seri.required'   => "Nomor Seri harus diisi",
            ]
        );


        $dataBarang = new Gudang;
        $dataBarang->nama_barang = $request->input('nama_barang');
        $dataBarang->keterangan = $request->input('keterangan');

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('fotobarang/', $request->file('gambar')->getClientOriginalName());
            $dataBarang->gambar = $request->file('gambar')->getClientOriginalName();
        }

        $dataBarang->save();
        if($dataBarang->save()){
            $prefix = date('ym').$dataBarang->id;
            $generateBarcode = IdGenerator::generate(['table' => 'stocks', 'field' => 'kode_barang', 'length' => 10, 'prefix' => $prefix]);   
            $stokBaru = new Stock;
            $stokBaru->barang_id = $dataBarang->id;
            $stokBaru->nomor_seri = $request->input('nomor_seri');
            $stokBaru->kode_barang = $generateBarcode;
            $stokBaru->save();
            if ($stokBaru->save()) {
                $waktu = new DateTime();
            $tanggal_ditambahkan = Carbon::now();
            $logStok = new HistoryStockBaru;
            $logStok->barang_id = $stokBaru->barang_id;
            $logStok->nomor_seri = $stokBaru->nomor_seri;
            $logStok->kode_barang = $stokBaru->kode_barang;
            $logStok->tanggal_ditambahkan = $tanggal_ditambahkan;
            $logStok->waktu = $waktu->format('H:i:s');
            $logStok->save();
            }
        }

        return redirect('admin/gudang/')->with('success, Data barang berhasil ditambahkan');
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
        $dataBarang = Gudang::find($id);
        return view('admin.gudang.edit', compact('dataBarang'));
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
        $dataBarang = Gudang::find($id);
        if ($request->hasFile('gambar')) {
            if (File::exists('fotobarang/'.$dataBarang->gambar)) {
                File::delete('fotobarang/'.$dataBarang->gambar);
            }
            $request->file('gambar')->move('fotobarang/', $request->file('gambar')->getClientOriginalName());
            $dataBarang->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->keterangan = $request->keterangan;
        $dataBarang->update();

        return redirect('admin/gudang/')->with('success, Data barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dataBarang = Gudang::find($request->barang_modal_delete_id);
        if (File::exists('fotobarang/'.$dataBarang->gambar)) {
            File::delete('fotobarang/'.$dataBarang->gambar);
        }
        $dataBarang->delete();

        return redirect('admin/gudang/')->with('success', 'Data barang berhasil dihapus');
    }
}
