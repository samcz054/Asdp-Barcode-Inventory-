@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            @if(session()->get('sukses'))
            <div class="alert alert-success">
                {{session()->get('sukses')}}
            </div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
            <div class="d-flex justify-content-end">
                <a href="{{route('users.create')}}" class="btn btn-primary"> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allUser as $i=>$row)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                @if (!empty($row->getRoleNames()))
                                @foreach ($row->getRoleNames() as $role)
                                <label class="badge badge-success">{{$role}}</label>
                                @endforeach
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{route('users.edit',$row->id)}}" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{route('users.destroy', $row->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
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