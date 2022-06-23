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

                        <!-- judul form-->

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Data Pribadi</h1>
                        </div>

                        <!-- Form Data Pribbadi -->
                        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6 search_select_box">
                                        <label>Nama</label>
                                        <input name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" type="text"
                                            class="form-control @error('nama_karyawan') is-invalid @enderror"
                                            value="{{ old('nama_karyawan') }}" />
                                        @error('nama_karyawan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Tanggal Lahir</label>
                                        <input name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir') }}" />
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Tempat Lahir</label>
                                        <input name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}" type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            value="{{ old('tempat_lahir') }}" />
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Pendidikan</label>
                                        <select name="pendidikan" id=""
                                            class="form-control @error('pendidikan') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach (['SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA', 'D3' => 'D3', 'D4' => 'D4', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3', 'ANT I' => 'ANT I', 'ANT II' => 'ANT II', 'ANT III' => 'ANT III', 'ANT IV' => 'ANT IV', 'ANT V' => 'ANT V', 'ANT D' => 'ANT D', 'ATT I' => 'ATT I', 'ATT II' => 'ATT II', 'ATT III' => 'ATT III', 'ATT IV' => 'ATT IV', 'ATT V' => 'ATT V', 'ATT D' => 'ATT D'] as $item => $itempendidikan)
                                                <option value="{{ $item }}"
                                                    {{ old('pendidikan', $karyawan->pendidikan) == $item ? 'selected' : '' }}>
                                                    {{ $itempendidikan }}</option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Jurusan</label>
                                        <input name="jurusan" value="{{ $karyawan->jurusan }}" type="text"
                                            class="form-control @error('jurusan') is-invalid @enderror"
                                            value="{{ old('jurusan') }}" />
                                        @error('jurusan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 search_select_box">
                                        <label>Status Keluarga</label>
                                        <select name="status_keluarga"
                                            class="form-control @error('status_keluarga') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach (['K/0' => 'K/0', 'K/1' => 'K/1', 'K/2' => 'K/2', 'K/3' => 'K/3', 'K/4' => 'K/4', 'TK/0' => 'TK/0', 'TK/1' => 'TK/1', 'TK/2' => 'TK/2', 'TK/3' => 'TK/3', 'TK/4' => 'TK/4'] as $item => $itemstatus)
                                                <option value="{{ $item }}"
                                                    {{ old('status_keluarga', $karyawan->status_keluarga) == $item ? 'selected' : '' }}>
                                                    {{ $itemstatus }}</option>
                                            @endforeach
                                        </select>
                                        @error('status_keluarga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Nomor Induk Kependudukan</label>
                                        <input name="nik_ktp" value="{{ $karyawan->nik_ktp }}" type="text"
                                            class="form-control @error('nik_ktp') is-invalid @enderror"
                                            value="{{ old('nik_ktp') }}" />
                                        @error('nik_ktp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Nomor BPJS Kesehatan</label>
                                        <input name="no_bpjs_kesehatan" value="{{ $karyawan->no_bpjs_kesehatan }}"
                                            type="text"
                                            class="form-control @error('no_bpjs_kesehatan') is-invalid @enderror"
                                            value="{{ old('no_bpjs_kesehatan') }}" />
                                        @error('no_bpjs_kesehatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Nomor BPJS Ketenagakerjaan</label>
                                        <input name="no_bpjs_ketenagakerjaan"
                                            value="{{ $karyawan->no_bpjs_ketenagakerjaan }}" type="text"
                                            class="form-control @error('no_bpjs_ketenagakerjaan') is-invalid @enderror"
                                            value="{{ old('no_bpjs_ketenagakerjaan') }}" />
                                        @error('no_bpjs_ketenagakerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach (['L' => 'L', 'P' => 'P'] as $item => $itemstatus)
                                                <option value="{{ $item }}"
                                                    {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == $item ? 'selected' : '' }}>
                                                    {{ $itemstatus }}</option>
                                            @endforeach
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
                                            <input name="email" value="{{ $karyawan->email }}" type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="boleh tidak di isi" />
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>alamat</label>
                                            <input name="alamat" value="{{ $karyawan->alamat }}" type="text"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                value="{{ old('alamat') }}" placeholder="boleh tidak di isi" />
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>No Handphone</label>
                                            <input name="no_hp" value="{{ $karyawan->no_hp }}" type="text"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                value="{{ old('no_hp') }}" placeholder="boleh tidak di isi" />
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 search_select_box">
                                            <label>Ukuran Sepatu</label>
                                            <input name="uk_sepatu" value="{{ $karyawan->uk_sepatu }}" type="text"
                                                class="form-control @error('uk_sepatu') is-invalid @enderror"
                                                value="{{ old('uk_sepatu') }}" placeholder="boleh tidak di isi" />
                                            @error('uk_sepatu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>Ukuran Kaos</label>
                                            <input name="uk_kaos" value="{{ $karyawan->uk_kaos }}" type="text"
                                                class="form-control @error('uk_kaos') is-invalid @enderror"
                                                value="{{ old('uk_kaos') }}" placeholder="boleh tidak di isi" />
                                            @error('uk_kaos')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label>No Inhealth</label>
                                            <input name="no_inhealth" value="{{ $karyawan->no_inhealth }}" type="text"
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
                                            <input name="no_rek" value="{{ $karyawan->no_rek }}" type="text"
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
                                <div class="form-row search_select_box">
                                    <div class="col-md-6">
                                        <label>Nomor Induk Kepegawaian</label>
                                        <input name="nik" value="{{ $karyawan->nik }}" type="text"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik') }}" />
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Jabatan</label>
                                        <select name="jabatan_id" id="" class="form-control" data-live-search=" true">
                                            @foreach ($jabatan as $item)
                                                <option value={{ $item->id }} @if ($item->id == $karyawan->jabatan_id)
                                                    selected
                                            @endif

                                            >
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
                                                <option value={{ $item->id }} @if ($item->id == $karyawan->divisi_id)
                                                    selected
                                            @endif

                                            >
                                            {{ $item->nama_divisi }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('divisi_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label>Tanggal Masuk Kerja</label>
                                        <input name="tanggal_masuk_kerja" value="{{ $karyawan->tanggal_masuk_kerja }}"
                                            type="date"
                                            class="form-control @error('tanggal_masuk_kerja') is-invalid @enderror"
                                            value="{{ old('tanggal_masuk_kerja') }}" />
                                        @error('tanggal_masuk_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label>Darat/laut</label>
                                        <select name="darat_laut"
                                            class="form-control @error('darat_laut') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach (['Darat' => 'Darat', 'Laut' => 'Laut'] as $item => $itemstatus)
                                                <option value="{{ $item }}"
                                                    {{ old('darat_laut', $karyawan->darat_laut) == $item ? 'selected' : '' }}>
                                                    {{ $itemstatus }}</option>
                                            @endforeach
                                        </select>
                                        @error('darat_laut')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-md-6">
                                        <label>NPWP</label>
                                        <input name="no_npwp" value="{{ $karyawan->no_npwp }}" type="text"
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
                                                <option value={{ $item->id }} @if ($item->id == $karyawan->status_jabatan)
                                                    selected
                                            @endif

                                            >
                                            {{ $item->nama_jabatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label>No. Sk</label>
                                        <input name="sk" value="{{ $karyawan->sk }}" type="text"
                                            class="form-control @error('sk') is-invalid @enderror"
                                            value="{{ old('sk') }}" />
                                        @error('sk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Tanggal Dipilih jabatan</label>
                                        <input name="tanggal_pilih_jabatan"
                                            value="{{ $karyawan->tanggal_pilih_jabatan }}" type="date"
                                            class="form-control @error('tanggal_pilih_jabatan') is-invalid @enderror"
                                            value="{{ old('tanggal_pilih_jabatan') }}" />
                                        @error('tanggal_pilih_jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Segmen</label>
                                        <select name="segmen" class="form-control @error('segmen') is-invalid @enderror"
                                            data-live-search=" true">
                                            @foreach (['Kantor Gilimanuk' => 'Kantor Gilimanuk', 'Kantor Ketapang' => 'Kantor Ketapang', 'Ops Gilimanuk' => 'Ops Gilimanuk', 'Ops Ketapang' => 'Ops Ketapang', 'Pratitha' => 'Pratitha'] as $item => $itemstatus)
                                                <option value="{{ $item }}"
                                                    {{ old('segmen', $karyawan->segmen) == $item ? 'selected' : '' }}>
                                                    {{ $itemstatus }}</option>
                                            @endforeach
                                        </select>
                                        @error('segmen')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row mt-5">
                                    <div class="col-md-6">
                                        <label>Golongan Tht</label>
                                        <input name="gol_skala_tht" value="{{ $karyawan->gol_skala_tht }}" type="text"
                                            class="form-control @error('gol_skala_tht') is-invalid @enderror"
                                            value="{{ old('gol_skala_tht') }}" />
                                        @error('gol_skala_tht')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Golongan PHDP</label>
                                        <input name="gol_phdp" value="{{ $karyawan->gol_phdp }}" type="text"
                                            class="form-control @error('gol_phdp') is-invalid @enderror"
                                            value="{{ old('gol_phdp') }}" />
                                        @error('gol_phdp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Golongan Gaji</label>
                                        <input name="gol_gaji" value="{{ $karyawan->gol_gaji }}" type="text"
                                            class="form-control @error('gol_gaji') is-invalid @enderror"
                                            value="{{ old('gol_gaji') }}" />
                                        @error('gol_gaji')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Skala Tht</label>
                                        <input name="skala_tht" value="{{ $karyawan->skala_tht }}" type="text"
                                            class="form-control @error('skala_tht') is-invalid @enderror"
                                            value="{{ old('skala_tht') }}" />
                                        @error('skala_tht')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Skala PHDP</label>
                                        <input name="gol_skala_phdp" value="{{ $karyawan->gol_skala_phdp }}" type="text"
                                            class="form-control @error('gol_skala_phdp') is-invalid @enderror"
                                            value="{{ old('gol_skala_phdp') }}" />
                                        @error('gol_skala_phdp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label>Skala Gaji</label>
                                        <input name="gol_skala_gaji" value="{{ $karyawan->gol_skala_gaji }}" type="text"
                                            class="form-control @error('gol_skala_gaji') is-invalid @enderror"
                                            value="{{ old('gol_skala_gaji') }}" />
                                        @error('gol_skala_gaji')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col text-center">

                                <button type="submit" class="btn btn-success btn-lg">Update</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
