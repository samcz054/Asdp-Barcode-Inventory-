@extends('admin.layout.master')

@section('content')

    {{-- Modal --}}
    <div class="modal fade" id="pinjam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <div class="col-md-6">
                                    <label>Nama Barang</label>
                                    <select name="stock_id" class="form-control  @error('stock_id') is-invalid @enderror" id="barang">
                                        <option value="">-Pilih Barang-</option>
                                        @foreach($dataStock as $item)
                                        <option value="{{$item->id}}" {{old('stock_id') == $item->id ? 'selected' : null}}>
                                            {{$item->barang->nama_barang}} - {{$item->kode_barang}}
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
                    {{-- <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-icon-split">
                        Pinjam Barang
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
                                <td>{{$row->kodeBarang}}</td>
                                <td>{{$row->tanggal_dipinjam}}</td>
                                <td>
                                    <form action="{{ route('peminjaman.destroy', $row->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="ml-5 btn btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
