
@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">
        <a href="{{route('gudang.index')}}" class="btn btn-light btn-icon-split mb-3">
            <span class="icon text-gray-600">
                <i class="fas fa-arrow-left mt-1"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session()->get('sukses'))
                    <div class="alert alert-success">
                        {{ session()->get('sukses') }}
                    </div>
                @endif
                

                <h4 class="m-0 font-weight-bold text-primary">Log Stok Baru</h4>

                <div class="col-md-12 text-right">
                    <a style="background-color: #008507" href="{{ route('file-ExportStokBaru') }}" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-600">
                            <i class="fas fa-file-export mt-1"></i>
                        </span>
                        <span class="text">Export Riwayat</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu dan Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Nomor Seri</th>
                                <th>Kode Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logStock as $i=>$row)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$row->waktu}} - {{tanggal_indonesia($row->tanggal_ditambahkan)}}</td>
                                <td>{{$row->barang->nama_barang}}</td>
                                <td>{{$row->nomor_seri}}</td>
                                <td>{{$row->kode_barang}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
