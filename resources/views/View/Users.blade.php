@extends('Components.master')

@Section('title')
    Users
@stop

@Section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                    <div class="col-8 offset-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($users  as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('get.edit.user',['user_id'=>$user->id])}}"><span class="fa fa-edit"></span></a>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#d{{$user->id}}"><span class="fa fa-trash"></span></a>
                                            <!--Remove Modal -->
                                            <div class="modal" tabindex="-1" role="dialog" id="d{{$user->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirmation to remove</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure want to remove <em>{{$user->name}}</em>.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{route('get.remove.user',['user_id'=>$user->id])}}" class="btn btn-primary">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Remove Modal -->
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
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