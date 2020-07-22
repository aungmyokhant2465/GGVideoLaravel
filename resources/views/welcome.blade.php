@extends('Components.master')

@Section('title')
    Dashboard
    @stop

@Section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h1>Dashboard page</h1>


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