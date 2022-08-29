@extends('admin.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <a href="{{route('pegawai.index')}}" class="btn btn-light btn-icon-split mb-3">
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
                            <h4 class="m-0 font-weight-bold text-primary">Edit Barang</h4>
                        </div>

                        <!-- Form Data Pribbadi -->
                        <form action="{{ route('pegawai.update',$dataPegawai->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">

                                {{-- Input Nama Lengkap --}}
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text"
                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            value="{{ old('nama_lengkap',$dataPegawai->nama_lengkap) }}" />
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- end --}}

                                {{-- Input Jabatan --}}
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>Jabatan</label>
                                        <input name="jabatan" type="text"
                                            class="form-control @error('jabatan') is-invalid @enderror"
                                            value="{{ old('jabatan',$dataPegawai->jabatan) }}" />
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- end --}}
                                {{-- Input Divisi --}}
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>Divisi</label>
                                        <input name="divisi" type="text"
                                            class="form-control @error('divisi') is-invalid @enderror"
                                            value="{{ old('divisi',$dataPegawai->divisi) }}" />
                                        @error('divisi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- end --}}
                                {{-- Input Nik --}}
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>NIK</label>
                                        <input name="nik" type="text"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik',$dataPegawai->nik) }}" />
                                        @error('nik')
                                            <div class="invalid-feedbackW">{{ $message }}</div>
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
