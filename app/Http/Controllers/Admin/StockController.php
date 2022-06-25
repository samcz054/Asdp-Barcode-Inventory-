<?php

namespace App\Http\Controllers\Admin;

use App\Gudang;
use App\Stock;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
        $prefix = date('ym');
        $generateBarcode = IdGenerator::generate(['table' => 'stocks', 'field' => 'kode_barang', 'length' => 10, 'prefix' => $prefix]);   
        $stokBaru = new Stock;
        $stokBaru->barang_id = $request->input('barang_id');
        $stokBaru->kode_barang = $generateBarcode;
        $stokBaru->tanggal_ditambahkan = Carbon::parse($stokBaru['created_at']);
        $stokBaru->save();

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
        $stock = Stock::find($id);
        $stock->delete();

        return Redirect::back()->with('success', 'Stok barang berhasil di hapus');
    }
}
