@extends('admin.layout.master')

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <h4 class="m-0 font-weight-bold text-primary">Daftar User</h4>

            <div class="col-md-12 text-right">
                    <a style="background-color: #1c63b7" href="{{ route('user.create') }}" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-600">
                            <i class="fas fa-plus mt-1"></i>
                        </span>
                        <span class="text">Tambah User</span>
                    </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 12px">No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>E-Mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $i=>$row)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->username}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                <div class="dropdown no-arrow mb-4">
                                    <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" >
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('user.edit', $row->id)}}">Edit</a>
                                        <form action="{{ route('user.destroy', $row->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </div>
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