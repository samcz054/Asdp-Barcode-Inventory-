@extends('admin.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <a href="{{route('gudang.index')}}" class="btn btn-light btn-icon-split mb-3">
            <span class="icon text-gray-600">
                <i class="fas fa-arrow-left mt-1"></i>
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
                                    <div class="mb-3 col-md-12">
                                        <img class="img-preview img-fluid mb-2" width="150px" height="150px" style="max-width: 150px; max-height: 150px">
                                        <label class="form-label"></label>
                                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar" onchange="previewImage()" placeholder="Upload Gambar">
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- end --}}
                                {{-- Input Nama Barang --}}
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
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

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>Deskripsi / Keterangan </label>
                                        <textarea type="text" name="keterangan" class="form-control" rows="8">{{ old('keterangan') }}</textarea>
                                    </div>
                                </div>

                                {{-- Input Nomor Seri --}}
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>Nomor Seri</label>
                                        <input name="nomor_seri" type="text"
                                            class="form-control @error('nomor_seri') is-invalid @enderror"
                                            value="{{ old('nomor_seri') }}" />
                                        @error('nomor_seri')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- end --}}
                            </div>
                            <div class="col-md-12 mt-3">
                                <button style="background-color: #1c63b7" type="submit" class="btn btn-primary btn-sm">
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
