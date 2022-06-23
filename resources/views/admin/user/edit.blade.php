@extends('admin.layout.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-6">
            <div class="card mb-4 ">
                <div class="card-footer">

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
                        <h6 class="m-0 font-weight-bold text-primary mb-3">User Edit</h6>
                    </div>

                    <!-- isi form input -->
                    <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">

                                    <label>nama</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" />
                                    <label>Email</label>
                                    <input type="text" name="txtemail_user" class="form-control" value="{{$user->email}}" />
                                    <label>Password</label>
                                    <input type="password" name="password_user" class="form-control" />
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="konfirmasipassword_user" class="form-control" />

                                    <label for="select" class=" form-control-label">Permission</label>
                                    <select name="role_user" id="select" class="form-control">

                                        @foreach ($allRoles as $role)
                                        <option value="{{$role->id}}" @if (in_array($role->id, $userRole))
                                            selected

                                            @endif
                                            >
                                            {{$role->name}}
                                        </option>

                                        @endforeach

                                    </select>
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