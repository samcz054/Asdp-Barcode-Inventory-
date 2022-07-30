<?php

namespace App\Http\Controllers\Admin;

use App\Gudang;
use App\HistoryStockBaru;
use App\Stock;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $dataBarang = Gudang::find($id);
        $dataStock = Stock::doesntHave('pinjam')->where('barang_id',$id)->get();

        return view('admin.stock.index',compact('dataBarang','dataStock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'nomor_seri'             => 'required',
            ],
            [
                'nomor_seri.required'   => "Harap isi nomor seri",
                'nomor_seri.unique'     => "Nomor seri sudah ada",
            ]
        );

        $prefix = date('ym');
        $generateBarcode = IdGenerator::generate(['table' => 'stocks', 'field' => 'kode_barang', 'length' => 10, 'prefix' => $prefix]);   
        $stokBaru = new Stock;
        $stokBaru->barang_id = $request->input('barang_id');
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

        return Redirect::back()->with('success', 'Stok barang berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataStock = Stock::find($id);
        return response()->json($dataStock);
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
        $this->validate(
            $request,
            [
                'nomor_seri'             => 'required|unique:stocks',
            ],
            [
                'nomor_seri.required'   => "Harap isi nomor seri",
                'nomor_seri.unique'     => "Nomor seri sudah ada",
            ]
        );

        $stok = Stock::find($id);
        $stok->barang_id = $request->barang_id;
        $stok->nomor_seri = $request->nomor_seri;
        $stok->kode_barang = $request->kode_barang;

        $stok->update();

        return Redirect::back()->with('success, Nomor seri berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $stock = Stock::find($request->stock_modal_delete_id);
        $stock->delete();

        return Redirect::back()->with('success', 'Stok barang berhasil di hapus');
    }
}
