@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row d-flex justify-content-center ">
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Info Data Karyawan</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row mb-2">
                            <div class="col-md-3">
                                <h3><i class="fas fa-user mr-4"></i>Data Pribadi</h3>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Nama Karyawan</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->nama_karyawan }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Tempat Tanggal Lahir</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->tempat_lahir }}, {{ tanggal_indonesia($model->tanggal_lahir) }}</h6>
                            </div>
                        </div>
                        <div class="form-row mt-2">

                            <div class="col-md-2">
                                <h6>Usia</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->usia }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Nik KTP</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->nik_ktp }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">

                            <div class="col-md-2">
                                <h6>Status Keluarga</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->status_keluarga }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Pendidikan Terakhir</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->pendidikan }} {{ $model->jurusan }}</h6>
                            </div>

                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>No BPJS Ketenagakerjaan</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->no_bpjs_ketenagakerjaan }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>No BPJS Kesehatan</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->no_bpjs_kesehatan }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Email</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->email }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>No Handphone</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->no_hp }}</h6>
                            </div>
                        </div>


                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Alamat</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->alamat }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>No Inhealth</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->no_inhealth }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Ukuran Sepatu</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->uk_sepatu }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Ukuran Kaos</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->uk_kaos }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-4 mb-2">
                            <div class="col-md-3">
                                <h3><i class="fas fa-briefcase mr-4"></i>Data Pegawai</h3>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Jabatan</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->jabatan->nama_jabatan }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>No Induk Kepegawaian</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->nik }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Status Jabatan</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->jabatan->nama_jabatan }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Sub Unker</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->divisi->nama_divisi }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Tanggal Masuk Kerja</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ tanggal_indonesia($model->tanggal_masuk_kerja) }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Masa Kerja</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->masa_kerja }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Tanggal Pemilihan Jabatan</h6>
                            </div>
                            <div class="col-md-3">
                                @if (isset($model->tanggal_pilih_jabatan))
                                    <h6> : {{ tanggal_indonesia($model->tanggal_pilih_jabatan) }}</h6>
                                @else
                                    <h6> :</h6>
                                @endif
                            </div>

                            <div class="col-md-2">
                                <h6>Masa Jabatan</h6>
                            </div>
                            <div class="col-md-3">
                                @if (isset($model->masa_jabatan))
                                    <h6> : {{ $model->masa_jabatan }}</h6>
                                @else
                                    <h6> :</h6>
                                @endif
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>No SK</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->sk }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>NO. Peserta Wajib Pajak</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->no_npwp }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Darat Laut</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->darat_laut }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Segmen</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->segmen }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Golongan THT</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->gol_skala_tht }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Skala THT</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->skala_tht }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Golongan PHDP</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->gol_phdp }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Skala PHDP</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->gol_skala_phdp }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-2">
                                <h6>Golongan Gaji</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->gol_gaji }}</h6>
                            </div>

                            <div class="col-md-2">
                                <h6>Skala Gaji</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> : {{ $model->gol_skala_gaji }}</h6>
                            </div>
                        </div>

                        <div class="form-row mt-4">
                            <div class="col-md-3">
                                <a href="{{ route('karyawan.index') }}" class="btn btn-primary mr-2">kembali</a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
