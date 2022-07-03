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
                <form action="{{route('peminjaman.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- Input Nama Barang --}}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="text-start">Nama peminjam</label>
                                    <input name="nama_peminjam" type="text"
                                        class="form-control @error('nama_peminjam') is-invalid @enderror"
                                        value="{{ old('nama_peminjam') }}" />
                                    @error('nama_peminjam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>Nama Barang</label>
                                    <select id="barang" name="stock_id" class="form-control  @error('stock_id') is-invalid @enderror" id="barang" style="width: 100%" unique>
                                        <option value="">-Pilih Barang-</option>
                                        @foreach($dataStock as $item)
                                        <option value="{{$item->id}}" {{old('stock_id') == $item->id ? 'selected' : null}}>
                                            {{$item->barang->nama_barang}} - {{$item->nomor_seri}} - {{$item->kode_barang}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('stock_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Simpan
                        </button>
                    </div>
                </form>
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
                                <i class="fas fa-x"></i>
                            </span>
                            <span class="text">Tidak</span>
                        </button>
                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-600">
                                <i class="fas fa-check"></i>
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
                @if (session()->get('sukses'))
                    <div class="alert alert-success">
                        {{ session()->get('sukses') }}
                    </div>
                @endif

                <h4 class="m-0 font-weight-bold text-primary">Data Peminjaman</h4>

                <div class="col-md-12 text-right">
                    {{-- <a style="background-color: #1c63b7" href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-600">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Pinjam Barang</span>
                    </a> --}}
                    {{-- trigger modal --}}
                    <button style="background-color: #1c63b7" type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#pinjam">
                        <span class="icon text-white-600">
                            <i class="fas fa-plus"></i>
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
                                <td>{{$row->stock->barang->nama_barang}} - {{$row->stock->nomor_seri}}</td>
                                <td>{{$row->stock->kode_barang}}</td>
                                <td>{{$row->tanggal_dipinjam}}</td>
                                <td>
                                    <div class="dropdown no-arrow mb-4">
                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" >
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Detail Peminjaman</a>
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
