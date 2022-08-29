<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataPegawai = Pegawai::all();

        return view('admin.pegawai.index',compact('dataPegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_lengkap'          => 'required',
            'jabatan'               => 'required',
            'divisi'                => 'required',
            'nik'                   => 'required',
        ],[
            'nama_lengkap.required' => 'Nama lengkap pegawai tidak boleh kosong',
            'jabatan.required'      => 'Jabatan tidak boleh kosong',
            'divisi.required'       => 'Divisi tidak boleh kosong',
            'nik.required'          => 'Nik tidak boleh kosong',
        ]);

        $dataPegawai = new Pegawai;
        $dataPegawai->nama_lengkap  = $request->input('nama_lengkap');
        $dataPegawai->jabatan       = $request->input('jabatan');
        $dataPegawai->divisi        = $request->input('divisi');
        $dataPegawai->nik           = $request->input('nik');
        $dataPegawai->save();

        return redirect('admin/pegawai/')->with(['success'=>'Data pegawai berhasil ditambahkan']);
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
        $dataPegawai = Pegawai::find($id);

        return view('admin.pegawai.edit',compact('dataPegawai'));
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
        $this->validate($request,[
            'nama_lengkap'          => 'required',
            'jabatan'               => 'required',
            'divisi'                => 'required',
            'nik'                   => 'required',
        ],[
            'nama_lengkap.required' => 'Nama lengkap pegawai tidak boleh kosong',
            'jabatan.required'      => 'Jabatan tidak boleh kosong',
            'divisi.required'       => 'Divisi tidak boleh kosong',
            'nik.required'          => 'Nik tidak boleh kosong',
        ]);

        $dataPegawai = Pegawai::find($id);
        $dataPegawai->nama_lengkap  = $request->nama_lengkap;
        $dataPegawai->jabatan       = $request->jabatan;
        $dataPegawai->divisi        = $request->divisi;
        $dataPegawai->nik           = $request->nik;
        $dataPegawai->update();

        return redirect('admin/pegawai/')->with(['success'=>'Data pegawai berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dataPegawai = Pegawai::find($request->pegawai_modal_delete_id);
        $dataPegawai->delete();

        return redirect('admin/pegawai/')->with(['success'=>'Data pegawai berhasil dihapus']);
    }
}
