@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session()->get('sukses'))
                    <div class="alert alert-success">
                        {{ session()->get('sukses') }}
                    </div>
                @endif

                <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>

                <div class="form-row mt-4">
                    <div class="col-md-2 justify-content-start">
                        <a href="{{ url('/admin/karyawan/cetak') }}" class="btn btn-warning"> Cetak Data Karyawan</a>
                    </div>

                    <div class="col-md-7 ">
                        <a class="btn btn-success" href="{{ url('admin/file-export') }}">Export Excel</a>
                    </div>
                    


                    <div class="col-md-3 text-right">
                        @can('sdm-create')
                            <a href="{{ route('karyawan.create') }}" class="btn btn-primary"> Tambah</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Nomor Induk kepegawaian</th>
                                    <th>tempat lahir</th>
                                    <th>tanggal lahir</th>
                                    <th>Usia</th>
                                    <th>Status Keluarga</th>
                                    <th>Tanggal Masuk Kerja</th>
                                    <th>Masa Kerja</th>
                                    <th>No. Sk</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Dipilih Jabatan</th>
                                    <th>Masa Jabatan</th>
                                    <th>Pendidikan</th>
                                    <th>Nomor Induk Kependudukan</th>
                                    <th>Nomor BPJS Ketenagakerjaan</th>
                                    <th>Nomor BPJS Kesehatan</th>
                                    <th>Nomor NPWP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->nama_karyawan }}</td>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->tempat_lahir }}</td>
                                        <td>{{ $row->tanggal_lahir }}</td>
                                        <td>{{ $row->usia }} Tahun</td>
                                        <td>{{ $row->status_keluarga }}</td>
                                        <td>{{ $row->tanggal_masuk_kerja }}</td>
                                        <td>{{ $row->masa_kerja }}</td>
                                        <td>{{ $row->sk }}</td>
                                        <td>{{ $row->jabatan->nama_jabatan }}</td>
                                        <td>{{ $row->tanggal_pilih_jabatan }}</td>
                                        <td>{{ $row->masa_jabatan }}</td>
                                        <td>{{ $row->pendidikan }} {{ $row->jurusan }}</td>
                                        <td>{{ $row->nik_ktp }}</td>
                                        <td>{{ $row->no_bpjs_ketenagakerjaan }}</td>
                                        <td>{{ $row->no_bpjs_kesehatan }}</td>
                                        <td>{{ $row->no_npwp }}</td>

                                        <td class="d-flex">
                                            @can('sdm-show')
                                                <a href="{{ route('karyawan.show', $row->id) }}"
                                                    class="btn btn-success mr-2">Show</a>
                                            @endcan
                                            @can('sdm-edit')
                                                <a href="{{ route('karyawan.edit', $row->id) }}"
                                                    class="btn btn-primary mr-2">Edit</a>
                                            @endcan
                                            @can('sdm-delete')
                                                <form action="{{ route('karyawan.destroy', $row->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="ml-5 btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-row justify-content-center">
                    <div class="panel col-lg-10">
                        <canvas id="usia" class="rounded shadow"></canvas>
                        <div class="mt-2">
                            <a id="dlusia" download="grafik-usia.jpg" href=""
                                class="btn btn-primary float-right bg-flat-color-1" title="download grafik usia">

                                <!-- Download Icon -->
                                <i class="fa fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-row justify-content-center">
                    <div class="panel col-lg-10">
                        <canvas id="masaKerja" class="rounded shadow"></canvas>
                        <div class="mt-2">
                            <a id="dlmasakerja" download="grafik-masakerja.jpg" href=""
                                class="btn btn-primary float-right bg-flat-color-1" title="download grafik usia">

                                <!-- Download Icon -->
                                <i class="fa fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-row justify-content-center">
                    <div class="panel col-lg-10">
                        <canvas id="masaJabatan" class="rounded shadow"></canvas>
                        <div class="mt-2">
                            <a id="dlmasajabatan" download="grafik-masajabatan.jpg" href=""
                                class="btn btn-primary float-right bg-flat-color-1" title="download grafik usia">

                                <!-- Download Icon -->
                                <i class="fa fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    {{-- chart usia --}}
    <script>
        var ctx = document.getElementById('usia').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: {!! json_encode($grafikUsia->labels) !!},
                datasets: [{
                    label: 'usia',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 205, 86, 0.5)',
                    ],
                    data: {!! json_encode($grafikUsia->dataset) !!},
                }]
            },
            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: 'Grafik Usia Karyawan PT.ASDP'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>

    {{-- chart masa Kerja --}}

    <script>
        var ctx = document.getElementById('masaKerja').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',
            // The data for our dataset
            data: {
                labels: {!! json_encode($grafikMasaKerja->labels) !!},
                datasets: [{
                    label: 'Grafik masa kerja',
                    backgroundColor: [
                        'rgba(9, 160, 132, 0.5)',
                        'rgba(67, 159, 399, 0.5)',
                        'rgba(0, 255, 255, 0.5)',
                    ],
                    data: {!! json_encode($grafikMasaKerja->dataset) !!},
                }]
            },
            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: 'Grafik Masa Kerja Karyawan PT.ASDP'
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>

    {{-- chart masa Jabatan --}}

    <script>
        var ctx = document.getElementById('masaJabatan').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: {!! json_encode($grafikMasaJabatan->labels) !!},
                datasets: [{
                    label: 'Grafik masa jabaran',
                    backgroundColor: [
                        'rgba(242, 99, 242, 0.5)',
                        'rgba(124, 55, 171, 0.5)',
                        'rgba(28, 3, 110, 0.5)',
                    ],

                    data: {!! json_encode($grafikMasaJabatan->dataset) !!},
                }]
            },
            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: 'Grafik Masa Kerja jabatan Karyawan PT.ASDP'
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>

    {{-- download chart --}}

    <script>
        document.getElementById("dlusia").addEventListener('click', function() {
            /*Get image of canvas element*/
            var url_base64jp = document.getElementById("usia").toDataURL("image/jpg");
            /*get download button (tag: <a></a>) */
            var a = document.getElementById("dlusia");
            /*insert chart image url to download button (tag: <a></a>) */
            a.href = url_base64jp;
        });
        document.getElementById("dlmasakerja").addEventListener('click', function() {
            /*Get image of canvas element*/
            var url_base64jp = document.getElementById("masaKerja").toDataURL("image/jpg");
            /*get download button (tag: <a></a>) */
            var a = document.getElementById("dlmasakerja");
            /*insert chart image url to download button (tag: <a></a>) */
            a.href = url_base64jp;
        });
        document.getElementById("dlmasajabatan").addEventListener('click', function() {
            /*Get image of canvas element*/
            var url_base64jp = document.getElementById("masaJabatan").toDataURL("image/jpg");
            /*get download button (tag: <a></a>) */
            var a = document.getElementById("dlmasajabatan");
            /*insert chart image url to download button (tag: <a></a>) */
            a.href = url_base64jp;
        });
    </script>


@endsection
