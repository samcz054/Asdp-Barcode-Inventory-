@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <a href="{{route('gudang.index')}}" class="btn btn-light btn-icon-split mb-3">
            <span class="icon text-gray-600">
                <i class="fas fa-arrow-left"></i>
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
                

                <h4 class="m-0 font-weight-bold text-primary">Stok</h4>

                <div class="col-md-12 text-right">
                    <form id="tambahStok" method="POST" action="{{route('stock.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="barang_id" value="{{$dataBarang->id}}" style="display: none">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-600">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </button>
                    </form>
                            
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode_barang</th>
                                <th>Tanggal Ditambahkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataStock as $i=>$row)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$row->barang->nama_barang}}</td>
                                <td>{{$row->kode_barang}}</td>
                                <td>{{$row->tanggal_ditambahkan}}</td>
                                <td>
                                    <div class="dropdown no-arrow mb-4">
                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" >
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button type="button" class="dropdown-item cetakBarcode" data-id="{{ $row->id }}">
                                                Cetak Barcode
                                            </button>
                                            <form action="{{route('stock.destroy',$row->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" type="submit">
                                                    <span class="text">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            {{-- Modals cetak barcode --}}
                            <div class="modal fade-scale" id="cetakBarcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLongTitle">Cetak Barcode</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body text-center ">
                                        <img class="areaCetak" id="barcode">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success btn-icon-split" onclick="cetak()" data-dismiss="modal">
                                            <span class="text">Cetak</span>
                                        </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- end --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.cetakBarcode').click(function() {
                $('#cetakBarcode').modal('show');
                const id = $(this).attr('data-id');
                $.ajax({
                    type: "GET",
                    url: '/admin/stock/'+id+'/cetak/',
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data.kode_barang);
                        JsBarcode("#barcode",data.kode_barang,{
                            format: "CODE128",
                            displayValue: true,
                            fontSize: 20,
                            textMargin: 0,
                            fontOptions: "bold",
                            textAlign: "center",
                            font: "monospace",
                            lineColor: "#000",
                            width: 2,
                            height: 40,
                            margin: 0,
                            marginTop: 0,
                            marginBottom: 0,
                            marginLeft: 0,
                            marginRight: 0,
                            background: "#ffffff",
                            lineWidth: 1
                        });
                    }
                    
                })
            })
        })
    </script>
    
    <script>
        function cetak(){
            window.print();
        }
    </script>

@endsection
