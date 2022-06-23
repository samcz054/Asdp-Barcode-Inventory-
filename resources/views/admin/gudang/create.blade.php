@extends('admin.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <a href="{{route('gudang.index')}}" class="btn btn-light btn-icon-split mb-3">
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
                        <form action="{{ route('gudang.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{-- Gambar Input--}}
                                <div class="form-row">
                                    <div class="mb-3">
                                        <img class="img-preview img-fluid mb-2" width="150px" height="150px">
                                        <label class="form-label"></label>
                                        <input class="form-control" type="file" name="gambar" id="gambar" onchange="previewImage()" placeholder="Upload Gambar">
                                    </div>
                                </div>
                                {{-- end --}}
                                {{-- Input Nama Barang --}}
                                <div class="form-row">
                                    <div class="col-md-6 search_select_box">
                                        <label>Nama Barang</label>
                                        <input name="nama_barang" type="text"
                                            class="form-control @error('nama_barang') is-invalid @enderror"
                                            value="{{ old('nama_barang') }}" />
                                        @error('nama_barang')
                                            <div class="invalid-feedback">{{ $message }}</div>
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


    <script>
        function previewImage() {
            document.querySelector('.img-preview').src =
                window.URL.createObjectURL(document.querySelector('#gambar').files[0]);
        }
    </script>

@endsection
