

@extends('admin.layout.master')

{{-- <style>
    @media print{
        .areaCetak :
    }
</style> --}}

@section('content')

    <!-- Modal hapus -->
    <div class="modal fade" id="deleteStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perhatian !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('stock.destroy')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="stock_modal_delete_id" id="stock_id">
                        Apakah anda yakin ingin menghapus ? 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-icon-split btn-sm" data-dismiss="modal">
                            <span class="icon text-gray-600">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Tidak</span>
                        </button>
                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-600">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Iya</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}

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
                

                <h4 class="m-0 font-weight-bold text-primary">Stok {{$dataBarang->nama_barang}}</h4>

                <div class="col-md-12 text-right">
                    <form id="tambahStok" method="POST" action="{{route('stock.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="barang_id" value="{{$dataBarang->id}}" style="display: none">
                        <div class="form-row d-flex">
                            <div class="col-md-10">
                                
                            </div>
                            <div class="col-md-2">
                                <button style="background-color: #1c63b7" type="submit" class="btn btn-primary btn-icon-split btn-sm mb-2">
                                    <span class="icon text-white-600">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah stok</span>
                                </button>
                                <input class="form-control @error('nomor_seri') is-invalid @enderror" type="text" placeholder="Nomor Seri" name="nomor_seri">
                                @error('nomor_seri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
                                <th>Nomor Seri</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataStock as $i=>$row)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$row->barang->nama_barang}}</td>
                                <td>{{$row->kode_barang}}</td>
                                <td>{{$row->nomor_seri}}</td>
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
                                            <button type="button" value="{{$row->id}}" class="dropdown-item hapusStockBtn" data-toggle="modal" data-target="#deleteStock" >Hapus</button> 
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
