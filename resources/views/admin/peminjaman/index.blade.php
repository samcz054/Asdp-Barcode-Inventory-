@extends('admin.layout.master')


@section('content')




    {{-- Modal --}}
    <div class="modal fade" id="pinjam" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pinjam Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="modal-body">
                        <div class="form-group">
                            {{-- Input Nama Barang --}}

                            <ul id="saveform_error"></ul>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="text-start">Nama peminjam</label>
                                    <input name="nama_peminjam" type="text"
                                        class="nama_peminjam form-control"/>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label>Nama Barang</label>
                                    <select id="barang" name="stock_id" class="stock_id form-control" style="width: 100%">
                                        <option value="">-Pilih Barang-</option>
                                        @foreach($dataStock as $item)
                                        <option value="{{$item->id}}" {{old('stock_id') == $item->id ? 'selected' : null}}>
                                            {{$item->barang->nama_barang}} - {{$item->nomor_seri}} - {{$item->kode_barang}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- end --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm pinjam_barang">
                            <i class="fa fa-dot-circle-o"></i> Simpan
                        </button>
                    </div>

            </div>
        </div>
    </div>
    {{-- end --}}

    <!-- Modal pengembalian -->
    <div class="modal fade" id="barangKembali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perhatian !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('peminjaman.destroy')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden"name="pengembalian_barang_id" id="pinjam_id">
                        Apakah barang yang dipilih sudah dikembalikan ? 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-icon-split btn-sm" data-dismiss="modal">
                            <span class="icon text-gray-600">
                                <i class="fas fa-arrow-left mt-1"></i>
                            </span>
                            <span class="text">Tidak</span>
                        </button>
                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-600">
                                <i class="fas fa-check mt-1"></i>
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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif --}}

                <div id="success_message"></div>
                

                <h4 class="m-0 font-weight-bold text-primary">Data Peminjaman</h4>

                <div class="col-md-12 text-right">

                    {{-- trigger modal --}}
                    <button style="background-color: #1c63b7" type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#pinjam">
                        <span class="icon text-white-600">
                            <i class="fas fa-plus mt-1"></i>
                        </span>
                        <span class="text">Pinjam Barang</span>
                    </button>
                    {{-- end --}}

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Barang</th>
                                <th>Nomor Seri</th>
                                <th>Kode Barang</th>
                                <th>Tanggal Dipinjam</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPeminjaman as $i=>$row)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$row->nama_peminjam}}</td>
                                <td>{{$row->stock->barang->nama_barang}}</td>
                                <td>{{$row->stock->nomor_seri}}</td>
                                <td>{{$row->stock->kode_barang}}</td>
                                <td>{{tanggal_indonesia($row->tanggal_dipinjam)}} - {{$row->waktu}}</td>
                                <td>
                                    <div class="dropdown no-arrow mb-4">
                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" >
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('peminjaman.details',$row->id)}}">Detail Peminjaman</a>
                                            <button type="button" value="{{$row->id}}" class="dropdown-item pengembalianBtn" data-toggle="modal" data-target="#barangKembali" >Barang Kembali</button> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#barang').select2();
        }); 
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.pinjam_barang', function(e){
                e.preventDefault();
                var data = {
                    'nama_peminjam' : $('.nama_peminjam').val(),
                    'stock_id'      : $('.stock_id').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url : "peminjaman/store",
                    data: data,
                    dataType: "json",
                    success: function(response){
                        if(response.status == 400){
                            $('#saveform_error').html("");
                            $('#saveform_error').addClass("alert alert-danger");
                            $.each(response.errors, function(key, err_values){
                                $('#saveform_error').append('<li>'+err_values+'</li>');
                            });
                        }else{
                            window.location = "peminjaman";
                            $('#saveform_error').html("");
                            $('#success_message').addClass("alert alert-success");
                            $('#success_message').text(response.message);
                            $('#pinjam').modal('hide');
                            $('#pinjam').find('input').val("");
                        }   
                    }
                });
            });
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('.pengembalianBtn').click(function(e){
                e.preventDefault();

                var pinjam_id = $(this).val();
                $('#pinjam_id').val(pinjam_id);
                $('#barangKembali').model('show');
            });
        });
    </script>



@endsection
