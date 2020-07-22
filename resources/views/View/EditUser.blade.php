@extends('Components.master')

@Section('title')
    Edit User
@stop

@Section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('get.users')}}">Users</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 offset-3">
                        <form method="post" action="{{route('post.edit.user')}}">
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <h1 class="text-center"><span class="fa fa-user-circle fa-4x"></span></h1>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input value="{{$user->name}}" name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif">
                                        @if($errors->has('name'))<span class="invalid-feedback">{{$errors->first('name')}}</span>@endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" value="{{$user->email}}" name="email" id="email" class="form-control @if($errors->has('email')) is-invalid @endif">
                                        @if($errors->has('email'))<span class="invalid-feedback">{{$errors->first('email')}}</span>@endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" id="password" class="form-control pass @if($errors->has('password')) is-invalid @endif" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button" id="button-addon2"><span class="fa fa-eye"></span></button>
                                            </div>
                                            @if($errors->has('password'))<span class="invalid-feedback">{{$errors->first('password')}}</span>@endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="co_password">Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password"  name="coPassword" id="co_password" class="form-control pass @if($errors->has('coPassword')) is-invalid @endif" aria-label="Recipient's username" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button" id="button-addon1"><span class="fa fa-eye"></span></button>
                                            </div>
                                            @if($errors->has('coPassword'))<span class="invalid-feedback">{{$errors->first('coPassword')}}</span>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group text-right">
                                        <button class="btn btn-outline-info btn-lg">Sign up</button>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>

                @if(Session('info'))
                    <div class="row info">
                        <div class="col-12">
                            <div class="alert alert-success text-center" style="" role="alert">
                                <span>{{Session('info')}}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@stop

@Section('script')
    <script>
        $(document).ready(function () {
            function  showPassword() {
                if('password' == $('.pass').attr('type')){
                    $('.pass').prop('type', 'text');
                }else{
                    $('.pass').prop('type', 'password');
                }
            }
            $('#button-addon2').click(function(){
                showPassword()
            });
            $('#button-addon1').click(function(){
                showPassword()
            });
        });
    </script>
@stop