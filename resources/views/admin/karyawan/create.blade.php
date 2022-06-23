@extends('admin.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="mb-2 d-flex justify-content-start">
            <a href="{{ url('admin/karyawan') }}" class="btn btn-success"> Kembali</a>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-footer">

                        @if ($errors->any())

                            <div class="alert alert-danger">
                                <div class="list-group">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </div>
                            </div>

                        @endif

                        <!-- judul form-->

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Data Pribadi</h1>
                        </div>

                        <!-- Form Data Pribbadi -->
                        <form action="{{ route('karyawan.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6 search_select_box">
                                        <label>Nama</label>
                                        <input name="nama_karyawan" type="text"
                                            class="form-control @error('nama_karyawan') is-invalid @enderror"
                                            value="{{ old('nama_karyawan') }}" />
                                        @error('nama_karyawan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Tanggal Lahir</label>
                                        <input name="tanggal_lahir" type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir') }}" />
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            value="{{ old('tempat_lahir') }}" />
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Pendidikan</label>
                                        <select name="pendidikan"
                                            class="form-control @error('pendidikan') is-invalid @enderror"
                                            data-live-search=" true">
                                            <option value="SD" @if (old('pendidikan') == 'SD') selected="selected" @endif>SD</option>
                                            <option value="SMP" @if (old('pendidikan') == 'SMP') selected="selected" @endif>SMP</option>
                                            <option value="SMA" @if (old('pendidikan') == 'SMA') selected="selected" @endif>SMA</option>
                                            <option value="D3" @if (old('pendidikan') == 'D3') selected="selected" @endif>D3</option>
                                            <option value="D4" @if (old('pendidikan') == 'D4') selected="selected" @endif>D4</option>
                                            <option value="S1" @if (old('pendidikan') == 'S1') selected="selected" @endif>S1</option>
                                            <option value="S2" @if (old('pendidikan') == 'S2') selected="selected" @endif>S2</option>
                                            <option value="S3" @if (old('pendidikan') == 'S3') selected="selected" @endif>S3</option>
                                            <option value="ANT I" @if (old('pendidikan') == 'ANT I') selected="selected" @endif>ANT I</option>
                                            <option value="ANT II" @if (old('pendidikan') == 'ANT II') selected="selected" @endif>ANT II</option>
                                            <option value="ANT III" @if (old('pendidikan') == 'ANT III') selected="selected" @endif>ANT III</option>
                                            <option value="ANT IV" @if (old('pendidikan') == 'ANT IV') selected="selected" @endif>ANT IV</option>
                                            <option value="ANT V" @if (old('pendidikan') == 'ANT V') selected="selected" @endif>ANT V</option>
                                            <option value="ANT D" @if (old('pendidikan') == 'ANT D') selected="selected" @endif>ANT D</option>
                                            <option value="ATT I" @if (old('pendidikan') == 'ATT I') selected="selected" @endif>ATT I</option>
                                            <option value="ATT II" @if (old('pendidikan') == 'ATT II') selected="selected" @endif>ATT II</option>
                                            <option value="ATT III" @if (old('pendidikan') == 'ATT III') selected="selected" @endif>ATT III</option>
                                            <option value="ATT IV" @if (old('pendidikan') == 'ATT IV') selected="selected" @endif>ATT IV</option>
                                            <option value="ATT V" @if (old('pendidikan') == 'ATT V') selected="selected" @endif>ATT V</option>
                                            <option value="ATT D" @if (old('pendidikan') == 'ATT D') selected="selected" @endif>ATT D</option>
                                        </select>
                                        @error('pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Jurusan</label>
                                        <input name="jurusan" type="text"
                                            class="form-control @error('jurusan') is-invalid @enderror"
                                            value="{{ old('jurusan') }}" placeholder="boleh tidak di isi" />
                                        @error('jurusan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 search_select_box">
                                        <label>Status Keluarga</label>
                                        <select name="status_keluarga"
                                            class="form-control @error('status_keluarga') is-invalid @enderror"
                                            data-live-search=" true">
                                            <option value="K/0" @if (old('status_keluarga') == 'K/0') selected="selected" @endif>K/0</option>
                                            <option value="K/1" @if (old('status_keluarga') == 'K/1') selected="selected" @endif>K/1</option>
                                            <option value="K/2" @if (old('status_keluarga') == 'K/2') selected="selected" @endif>K/2</option>
                                            <option value="K/3" @if (old('status_keluarga') == 'K/3') selected="selected" @endif>K/3</option>
                                            <option value="K/4" @if (old('status_keluarga') == 'K/4') selected="selected" @endif>K/4</option>
                                            <option value="TK/0" @if (old('status_keluarga') == 'TK/0') selected="selected" @endif>TK/0</option>
                                            <option value="TK/1" @if (old('status_keluarga') == 'TK/1') selected="selected" @endif>TK/1</option>
                                            <option value="TK/2" @if (old('status_keluarga') == 'TK/2') selected="selected" @endif>TK/2</option>
                                            <option value="TK/3" @if (old('status_keluarga') == 'TK/3') selected="selected" @endif>TK/3</option>
                                            <option value="TK/4" @if (old('status_keluarga') == 'TK/4') selected="selected" @endif>TK/4</option>
                                        </select>
                                        @error('status_keluarga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Nomor Induk Kependudukan</label>
                                        <input name="nik_ktp" type="text"
                                            class="form-control @error('nik_ktp') is-invalid @enderror"
                                            value="{{ old('nik_ktp') }}" />
                                        @error('nik_ktp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Nomor BPJS Kesehatan</label>
                                        <input name="no_bpjs_kesehatan" type="text"
                                            class="form-control @error('no_bpjs_kesehatan') is-invalid @enderror"
                                            value="{{ old('no_bpjs_kesehatan') }}" />
                                        @error('no_bpjs_kesehatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Nomor BPJS Ketenagakerjaan</label>
                                        <input name="no_bpjs_ketenagakerjaan" type="text"
                                            class="form-control @error('no_bpjs_ketenagakerjaan') is-invalid @enderror"
                                            value="{{ old('no_bpjs_ketenagakerjaan') }}" />
                                        @error('no_bpjs_ketenagakerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                            data-live-search=" true">
                                            <option value="L" @if (old('jenis_kelamin') == 'L') selected="selected" @endif>L</option>
                                            <option value="P" @if (old('jenis_kelamin') == 'P') selected="selected" @endif>P</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mt-5">
                                    <div class="row">
                                        <div class="col-md-6 search_select_box">
                                            <label>Email</label>
                                            <input name="email" type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="boleh tidak di isi" />
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>alamat</label>
                                            <input name="alamat" type="text"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                value="{{ old('alamat') }}" placeholder="boleh tidak di isi" />
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>No Handphone</label>
                                            <input name="no_hp" type="text"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                value="{{ old('no_hp') }}" placeholder="boleh tidak di isi" />
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 search_select_box">
                                            <label>Ukuran Sepatu</label>
                                            <input name="uk_sepatu" type="text"
                                                class="form-control @error('uk_sepatu') is-invalid @enderror"
                                                value="{{ old('uk_sepatu') }}" placeholder="boleh tidak di isi" />
                                            @error('uk_sepatu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>Ukuran Kaos</label>
                                            <input name="uk_kaos" type="text"
                                                class="form-control @error('uk_kaos') is-invalid @enderror"
                                                value="{{ old('uk_kaos') }}" placeholder="boleh tidak di isi" />
                                            @error('uk_kaos')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>No Inhealth</label>
                                            <input name="no_inhealth" type="text"
                                                class="form-control @error('no_inhealth') is-invalid @enderror"
                                                value="{{ old('no_inhealth') }}" placeholder="boleh tidak di isi" />
                                            @error('no_inhealth')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6">
                                            <label>Nomor Rekening</label>
                                            <input name="no_rek" type="text"
                                                class="form-control @error('no_rek') is-invalid @enderror"
                                                value="{{ old('no_rek') }}" />
                                            @error('no_rek')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Data Pegawai -->
                                <div class="text-center mt-4">
                                    <h1 class="h4 text-gray-900 mb-4">Form Data Pegawai</h1>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 search_select_box">
                                        <label>Nomor Induk Kepegawaian</label>
                                        <input name="nik" type="text"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik') }}" />
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Jabatan</label>
                                        <select name="jabatan_id" id=""
                                            class="form-control @error('jabatan_id') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('jabatan_id') == $item->id ? 'selected' : null }}>
                                                    {{ $item->nama_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jabatan_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Sub Unker</label>
                                        <select name="divisi_id" id=""
                                            class="form-control @error('divisi_id') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach ($data_divisi as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('divisi_id') == $item->id ? 'selected' : null }}>
                                                    {{ $item->nama_divisi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('divisi_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Tanggal Masuk Kerja</label>
                                        <input name="tanggal_masuk_kerja" type="date"
                                            class="form-control @error('tanggal_masuk_kerja') is-invalid @enderror"
                                            value="{{ old('tanggal_masuk_kerja') }}" />
                                        @error('tanggal_masuk_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label>Darat/laut</label>
                                        <select name="darat_laut"
                                            class="form-control @error('darat_laut') is-invalid @enderror"
                                            data-live-search=" true">
                                            <option value="Darat" @if (old('darat_laut') == 'darat') selected="selected" @endif>Darat</option>
                                            <option value="Laut" @if (old('darat_laut') == 'Laut') selected="selected" @endif>Laut</option>
                                        </select>
                                        @error('darat_laut')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-md-6 search_select_box">
                                        <label>NPWP</label>
                                        <input name="no_npwp" type="text"
                                            class="form-control @error('no_npwp') is-invalid @enderror"
                                            value="{{ old('no_npwp') }}" />
                                        @error('no_npwp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Status jabatan</label>
                                        <select name="status_jabatan" id=""
                                            class="form-control @error('status_jabatan') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('status_jabatan') == $item->id ? 'selected' : null }}>
                                                    {{ $item->nama_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('status_jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>No. Sk</label>
                                        <input name="sk" type="text" class="form-control @error('sk') is-invalid @enderror"
                                            value="{{ old('sk') }}" />
                                        @error('sk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Tanggal Dipilih jabatan</label>
                                        <input name="tanggal_pilih_jabatan" type="date"
                                            class="form-control @error('tanggal_pilih_jabatan') is-invalid @enderror"
                                            value="{{ old('tanggal_pilih_jabatan') }}" />
                                        @error('tanggal_pilih_jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Segmen</label>
                                        <select name="segmen" class="form-control @error('segmen') is-invalid @enderror"
                                            data-live-search=" true">
                                            <option value="Kantor Gilimanuk" @if (old('darat_laut') == 'Kantor Gilimanuk') selected="selected" @endif>Kantor Gilimanuk
                                            </option>
                                            <option value="Kantor Ketapang" @if (old('darat_laut') == 'Kantor Ketapang') selected="selected" @endif>Kantor Ketapang
                                            </option>
                                            <option value="Ops Gilimanuk" @if (old('darat_laut') == 'Ops Gilimanuk') selected="selected" @endif>Ops Gilimanuk</option>
                                            <option value="Ops Ketapang" @if (old('darat_laut') == 'Ops Ketapang') selected="selected" @endif>Ops Ketapang</option>
                                            <option value="Pratitha" @if (old('darat_laut') == 'Pratitha') selected="selected" @endif>Pratitha</option>
                                        </select>
                                        @error('segmen')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-row mt-5">
                                    <div class="col-md-6">
                                        <label>Golongan Tht</label>
                                        <input name="gol_skala_tht" type="text"
                                            class="form-control @error('gol_skala_tht') is-invalid @enderror"
                                            value="{{ old('gol_skala_tht') }}" />
                                        @error('gol_skala_tht')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Golongan PHDP</label>
                                        <input name="gol_phdp" type="text"
                                            class="form-control @error('gol_phdp') is-invalid @enderror"
                                            value="{{ old('gol_phdp') }}" />
                                        @error('gol_phdp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Golongan Gaji</label>
                                        <input name="gol_gaji" type="text"
                                            class="form-control @error('gol_gaji') is-invalid @enderror"
                                            value="{{ old('gol_gaji') }}" />
                                        @error('gol_gaji')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Skala Tht</label>
                                        <input name="skala_tht" type="text"
                                            class="form-control @error('skala_tht') is-invalid @enderror"
                                            value="{{ old('skala_tht') }}" />
                                        @error('skala_tht')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Skala PHDP</label>
                                        <input name="gol_skala_phdp" type="text"
                                            class="form-control @error('gol_skala_phdp') is-invalid @enderror"
                                            value="{{ old('gol_skala_phdp') }}" />
                                        @error('gol_skala_phdp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Skala Gaji</label>
                                        <input name="gol_skala_gaji" type="text"
                                            class="form-control @error('gol_skala_gaji') is-invalid @enderror"
                                            value="{{ old('gol_skala_gaji') }}" />
                                        @error('gol_skala_gaji')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                            </div>

                            <div class="col text-center">

                                <input type="submit" class="btn btn-success btn-lg" name="simpan" id="simpan" value="simpan"
                                    style="padding: 5px 50px; margin-top: 10px;">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
