<?php

namespace App\Http\Controllers\Admin;

use App\HistoryPeminjaman;
use App\HistoryPengembalian;
use App\Http\Controllers\Controller;
use App\LogTransaksi;
use App\Pegawai;
use Illuminate\Http\Request;
use App\Pinjam;
use App\Stock;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Validator;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPegawai = Pegawai::all();
        $dataStock = Stock::doesntHave('pinjam')->get();
        $dataPeminjaman = Pinjam::orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman.index',compact('dataPeminjaman','dataStock','dataPegawai'));
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


        $validator = Validator::make($request->all(), [
                'pegawai_id'            => 'required',
                'stock_id'              => 'required',
            ],
            $message = [
                'pegawai_id.required'   => 'Nama peminjam harus diisi', 
                'stock_id.required'     => 'Pilih barang yang akan dipinjam', 
            ]
        );

        if($validator->fails()){
            return response()->json([
                'status'    => 400,
                'errors'    => $message,

            ]);
        } else { 
            $dataPeminjaman = new Pinjam;
            $tanggal_dipinjam = Carbon::now();
            $waktu = new DateTime();
            $dataPeminjaman->pegawai_id = $request->pegawai_id;
            $dataPeminjaman->stock_id =  $request->stock_id;
            $dataPeminjaman->tanggal_dipinjam = $tanggal_dipinjam;
            $dataPeminjaman->waktu = $waktu->format('H:i:s');
            $dataPeminjaman->save();
            if ($dataPeminjaman->save()){
                $logTransaksi = new LogTransaksi;
                $logTransaksi->keterangan = "Peminjaman";
                $logTransaksi->pegawai_id = $dataPeminjaman->pegawai_id;
                $logTransaksi->stock_id = $dataPeminjaman->stock_id;
                $logTransaksi->tanggal_dipinjam = $tanggal_dipinjam;
                $logTransaksi->waktu = $waktu->format('H:i:s');
                $logTransaksi->save();
            }
            return response()->json([
                'status'    => 200,
                'message'   => 'Peminjaman berhasil dilakukan'
            ]);
        }

        // $this->validate(
        //     $request,
        //     [
        //         'nama_peminjam'             => 'required',
        //         'stock_id'  => 'required',
        //     ],
        //     [
        //         'nama_peminjam.required'    => "Nama peminjam harus diisi",
        //         'stock_id'         => "Pilih barang yang akan dipinjam"
        //     ]
        // );
        
        
        // return redirect('admin/peminjaman/')->with(['success'=>'Peminjaman berhasil dilakukan']);
        
    }               

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $dataPeminjaman = Pinjam::find($id);

        return view('admin.peminjaman.detail',compact('dataPeminjaman'));
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
    public function destroy(Request $request)
    {
        $tanggal_dipinjam = Carbon::now();
        $waktu = new DateTime();

        $dataPeminjaman = Pinjam::find($request->pengembalian_barang_id);

        if ($dataPeminjaman->delete()){
            $logTransaksi = new LogTransaksi;
            $logTransaksi->keterangan = "Pengembalian";
            $logTransaksi->pegawai_id = $dataPeminjaman->pegawai_id;
            $logTransaksi->stock_id = $dataPeminjaman->stock_id;
            $logTransaksi->tanggal_dipinjam = $tanggal_dipinjam;
            $logTransaksi->waktu = $waktu->format('H:i:s');
            $logTransaksi->save();
        }
        $dataPeminjaman->delete();
        

        return redirect('admin/peminjaman/')->with(['success'=>'Barang berhasil dikembalikan']);
    }
}
