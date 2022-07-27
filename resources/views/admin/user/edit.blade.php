@extends('admin.layout.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-6">
            <div class="card mb-4 ">
                <div class="card-body">

                    <!-- judul form-->

                    @if($errors->any())

                    <div class="alert alert-danger">
                        <div class="list-group">
                            @foreach($errors->all() as $error)
                            <li class="list-group-item">
                                {{$error}}
                            </li>
                            @endforeach
                        </div>
                    </div>

                    @endif


                    <div class=" text-start">
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Edit User</h6>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" required/>
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="{{$user->username}}" required/>
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}" required/>
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required/>
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="konfirmasi" class="form-control" required/>

                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection