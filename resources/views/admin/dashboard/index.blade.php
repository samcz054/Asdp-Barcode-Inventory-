@extends('admin.layout.master')

@section('content')



    {{-- <div class="banner">
        <img src="{{url('backend/img/Ketapang.jpg')}}" class="img-fluid" style="width: 120%;">
        <h1 class="centered">WELCUM TO ASDP</h1>
    </div> --}}

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      </div>

      <!-- Content Row -->
      <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                  Total stok gudang
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$jumlahStockGudang->count()}}
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                 Barang dipinjam saat ini
                                </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$barangDipinjam->count()}}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-box fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Stok keseluruhan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$stockKeseluruhan->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <!-- Tabel Peminjaman -->
      <div class="row">
        <div class="container-fluid">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h5 class="m-0 font-weight-bold text-primary">
                    <a href="{{route('peminjaman.index')}}">
                        Barang yang dipinjam saat ini
                    </a>
                </h5>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Peminjam</th>
                                  <th>Nama Barang</th>
                                  <th>Nomor Seri</th>
                                  <th>Kode Barang</th>
                                  <th>Tanggal Dipinjam</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($dataPeminjaman as $i=>$row)
                              <tr>
                                  <td>{{++$i}}</td>
                                  <td>{{$row->pegawai->nama_lengkap}} - {{$row->pegawai->jabatan}} {{$row->pegawai->divisi}}</td>
                                  <td>{{$row->stock->barang->nama_barang}}</td>
                                  <td>{{$row->stock->nomor_seri}}</td>
                                  <td>{{$row->stock->kode_barang}}</td>
                                  <td>{{tanggal_indonesia($row->tanggal_dipinjam)}} - {{$row->waktu}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
  </div>


    
    {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="{{url('backend/img/ketapang1.png')}}" class="d-block w-100" alt="...">
              <h1 class="centered text-center">Selamat Datang di ASDP Inventory Management</h1>
          </div>
        </div>
      </div> --}}


@endsection