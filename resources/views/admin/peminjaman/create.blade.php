
@extends('admin.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <a href="{{route('peminjaman.index')}}" class="btn btn-light btn-icon-split mb-3">
            <span class="icon text-gray-600">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-footer">

                        <!-- judul form-->
                        <div class="col-xl-12 mb-4">
                            <h4 class="m-0 font-weight-bold text-primary">Tambah Barang</h4>
                        </div>

                        <!-- Form Data Pribbadi -->
                        <form action="{{ route('peminjaman.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{-- Input Nama Barang --}}
                                <div class="form-row">
                                    <div class="col-md-6 search_select_box">
                                        <label>Nama Barang</label>
                                        <input name="nama_peminjam" type="text"
                                            class="form-control @error('nama_peminjam') is-invalid @enderror"
                                            value="{{ old('nama_peminjam') }}" />
                                        @error('nama_peminjam')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nama Barang</label>
                                        <select name="stock_id" class="form-control  @error('stock_id') is-invalid @enderror" width="100%" id="barang">
                                            <option value="">-Pilih Barang-</option>
                                            @foreach($dataStock as $item)
                                            <option value="{{$item->id}}">
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
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
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
    
@endsection
