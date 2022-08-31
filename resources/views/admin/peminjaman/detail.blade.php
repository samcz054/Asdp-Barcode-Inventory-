

@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">
        <a href="{{route('peminjaman.index')}}" class="btn btn-light btn-icon-split mb-3">
            <span class="icon text-gray-600">
                <i class="fas fa-arrow-left mt-1"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                

                <h4 class="m-0 font-weight-bold text-primary mb-4"> Detail Peminjaman {{$dataPeminjaman->stock->barang->nama_barang}}</h4>

                <hr>
                
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12 text-center">
                            @if (isset($dataPeminjaman->stock->barang->gambar))
                                <img src="{{asset('fotobarang/'.$dataPeminjaman->stock->barang->gambar)}}" width="50%" alt="gambar" style="max-width: 180px;max-height: 180px">    
                            @else
                                <img src="{{asset('fotobarang/default/default.jpg')}}"  width="50%"  alt="gambar" style="max-width: 250px;max-height: 250px">
                            @endif

                            <h4 class="mt-4">{{$dataPeminjaman->stock->barang->nama_barang}}</h4>

                            @php
                                $generateBarcode = new Picqer\Barcode\BarcodeGeneratorHTML();
                            @endphp

                            <span class="d-flex justify-content-center mt-4 mb-1">
                                {!! $generateBarcode->getbarcode($dataPeminjaman->stock->kode_barang , $generateBarcode::TYPE_CODE_128); !!}
                            </span>

                                {{$dataPeminjaman->stock->kode_barang}}

                        </div>
                    </div>
                </div>
                <hr class="mt-3 mb-3">
                <div class="form-group">
                    <div class="form-row" style="margin-right: 2cm; margin-left: 2cm;">
                        <div class="col-md-6">
                            <pre><h6>Dipinjam Oleh    : {{$dataPeminjaman->pegawai->nama_lengkap}}</h6></pre>
                            <pre><h6>Model / Type     : {{$dataPeminjaman->stock->barang->model}}</h6></pre>
                            <pre><h6>Kode Barang      : {{$dataPeminjaman->stock->kode_barang}}</h6></pre>
                            
                        </div>
                        <div class="col-md-6">
                            <pre><h6>Divisi           : {{$dataPeminjaman->pegawai->jabatan}} {{$dataPeminjaman->pegawai->divisi}}</h6></pre>
                            <pre><h6>Nomor Seri       : {{$dataPeminjaman->stock->nomor_seri}}</h6></pre>
                            <pre><h6>Tanggal dipinjam : {{$dataPeminjaman->waktu}} {{tanggal_indonesia($dataPeminjaman->tanggal_dipinjam)}}</h6></pre>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="form-row">
                        <h5 class="mb-3" style="margin-right: 2cm; margin-left: 2cm;">
                            Deskripsi  :
                        </h5>
                        @if (isset($dataPeminjaman->stock->barang->keterangan))
                            <textarea disabled rows="10" style="width: 100%; max-width: 100%;">{{$dataPeminjaman->stock->barang->keterangan}}</textarea>
                        @else
                            <textarea disabled rows="10" style="width: 100%; max-width: 100%;">Tidak ada Keterangan</textarea>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.hapusStockBtn').click(function(e){
                e.preventDefault();

                var stock_id = $(this).val();
                $('#stock_id').val(stock_id);
                $('#deleteStock').model('show');
            });
        });
    </script>

@endsection
