@extends('Components.master')
@Section('title')
    Category
    @stop
@Section('style')
    @stop
@Section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}/">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                <h3>Categories</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->category_name}}</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#e{{$category->id}}" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
                                                        <!--Edit Modal -->
                                                        <div class="modal" tabindex="-1" role="dialog" id="e{{$category->id}}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <form method="post" action="{{route('post.edit.category')}}">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Category</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="category_name">Category Name</label>
                                                                                <input required class="form-control" id="category_name" name="new_category_name" value="{{$category->category_name}}">
                                                                            </div>
                                                                            <input type="hidden" name="id" value="{{$category->id}}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">Change</button>
                                                                        </div>
                                                                        {{csrf_field()}}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Edit Modal -->
                                                        <a data-toggle="modal" data-target="#d{{$category->id}}" class="btn btn-outline-danger"><span class="fa fa-trash"></span></a>
                                                        <!--Remove Modal -->
                                                        <div class="modal" tabindex="-1" role="dialog" id="d{{$category->id}}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Confirmation to remove</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure want to remove <em>{{$category->category_name}}</em> category</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="{{route('get.remove.category',['category_id'=>$category->id])}}" class="btn btn-primary">Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Remove Modal -->
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add New Category</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('post.new.category')}}">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input class="form-control @if($errors->has('category_name')) is-invalid @endif" id="category_name" name="category_name">
                                        @if($errors->has('category_name')) <span class="invalid-feedback">{{$errors->first('category_name')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary btn-lg">ADD</button>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
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