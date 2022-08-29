@extends('admin.layout.master')

@section('content')

    <!-- Modal hapus -->
    <div class="modal fade" id="deletePegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perhatian !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('pegawai.destroy')}}" method="POST">
                    @csrf
                    <div class="modal-body text-center">
                        <input type="hidden" name="pegawai_modal_delete_id" id="barang_id">
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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <h4 class="m-0 font-weight-bold text-primary">Daftar Pegawai</h4>

                <div class="col-md-12 text-right">
                        <a style="background-color: #1c63b7" href="{{ route('pegawai.create') }}" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-600">
                                <i class="fas fa-plus mt-1"></i>
                            </span>
                            <span class="text">Tambah Pegawai</span>
                        </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 12px">No</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Divisi</th>
                                <th>NIK</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPegawai as $i=>$row)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$row->nama_lengkap}}</td>
                                <td>{{$row->jabatan}}</td>
                                <td>{{$row->divisi}}</td>
                                <td>{{$row->nik}}</td>
                                <td>
                                    <div class="dropdown no-arrow mb-4">
                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" >
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('pegawai.edit',$row->id)}}">Edit</a>
                                            <button type="button" value="{{$row->id}}" class="dropdown-item hapusPegawaiBtn" data-toggle="modal" data-target="#deletePegawai" >Hapus Barang</button>    
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


    

    <script>
        $(document).ready(function () {
            $('.hapusPegawaiBtn').click(function(e){
                e.preventDefault();

                var barang_id = $(this).val();
                $('#barang_id').val(barang_id);
                $('#deletePegawai').model('show');
            });
        });
    </script>

@endsection
