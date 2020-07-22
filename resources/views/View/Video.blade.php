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
                        <h1 class="m-0 text-dark">Video</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                            <li class="breadcrumb-item active">addVideo</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-8">
                        <div>
                            @foreach($videos as $video)
                                <div class="accordion" id="a{{$video->id}}">
                                    <div class="card" style="border-top: 3px solid darkgreen">
                                        <div class="card-header bg-gradient-gray" id="h{{$video->id}}">
                                            <h2 class="mb-0">
                                                <button class="btn" type="button" data-toggle="collapse" data-target="#v{{$video->id}}" aria-expanded="false" aria-controls="collapseOne">
                                                    {{$video->title}} #{{$video->id}}
                                                </button>
                                                <span class="float-right">
                                                    <a class="btn btn-outline-primary" data-toggle="modal" data-target="#e{{$video->id}}"><span class="fa fa-edit"></span></a>
                                                    <a class="btn btn-outline-danger" data-toggle="modal" data-target="#r{{$video->id}}"><span class="fa fa-trash"></span></a>
                                                </span>
                                            </h2>
                                            <!-- remove modal -->
                                            <div class="modal fade text-dark" id="r{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation of removing video</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure went to remove <em>{{$video->title}}</em> video?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{route('get.remove.video',['video_id'=>$video->id])}}" type="button" class="btn btn-primary">Confirm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/remove modal -->
                                            <!-- edit modal -->
                                            <div class="modal fade text-dark" id="e{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit video</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" action="{{route('post.edit.video')}}" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="{{$video->id}}">
                                                                <input type="hidden" name="oldPhoto" value="{{$video->video_photo}}">
                                                                <div class="form-group">
                                                                    <label for="video_photo" ><span class="fa fa-image"></span> Video photo</label>
                                                                    <input type="file" name="videoPhoto" id="video_photo" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="title">Title</label>
                                                                    <input value="{{$video->title}}" required type="text" name="title" id="title" class="form-control @if($errors->has('title')) is-invalid @endif">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="link">Link or Video ID</label>
                                                                    <input value="{{$video->link}}" required type="text" name="link" id="link" class="form-control @if($errors->has('link')) is-invalid @endif">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="category">Category</label>
                                                                    <select required name="category" class="custom-select @if($errors->has('category')) is-invalid @endif" id="category">
                                                                        <option></option>
                                                                        @foreach($categories as $category)
                                                                            <option @if($category->id == $video->category_id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="rate" >Rating #<span id="rateLabel1"></span></label>
                                                                    <input required value="{{$video->rating}}" name="rate" type="range" class="custom-range" min="0" max="10" step="0.5" id="rate1">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="description">Description</label>
                                                                    <textarea name="description" id="description" class="form-control @if($errors->has('description')) is-invalid @endif">{{$video->description}}</textarea>
                                                                </div>
                                                                <div class="form-group form-check">
                                                                    <input @if($video->link_type)checked @endif name="link_type" type="checkbox" class="form-check-input" id="type_link">
                                                                    <label class="form-check-label" for="type_link">YouTube video</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-outline-info">Upload</button>
                                                                </div>
                                                            </div>
                                                            {{csrf_field()}}
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/edit modal -->
                                        </div>

                                        <div id="v{{$video->id}}" class="collapse" aria-labelledby="h{{$video->id}}" data-parent="#a{{$video->id}}">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img src="{{route('get.image',['image_name'=>$video->video_photo])}}" class="img-fluid">
                                                    </div>
                                                    <div class="col-3">
                                                        <ul style="list-style-type: none">
                                                            <li class="mb-3">Title</li>
                                                            <li class="mb-3">category</li>
                                                            <li class="mb-3">Rating</li>
                                                            <li class="mb-3">Link</li>
                                                            <li class="mb-3">Link Type</li>
                                                            <li class="mb-3">Description</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul style="list-style-type: none">
                                                            <li class="mb-3">{{$video->title}}</li>
                                                            <li class="mb-3">{{$video->category->category_name}}</li>
                                                            <li class="mb-3">
                                                                @for($i=1; $i<$video->rating; $i++)
                                                                    <span class="fa fa-star"></span>
                                                                    @endfor
                                                                @if(($video->rating/0.5)%2)
                                                                        <span class="fa fa-star-half"></span>
                                                                    @else
                                                                        <span class="fa fa-star"></span>
                                                                    @endif
                                                            </li>
                                                            <li class="mb-3"><a href="{{$video->link}}">{{$video->link}}</a></li>
                                                            <li class="mb-3">@if($video->link_type)YouTube @else Other @endif</li>
                                                            <li>{{$video->description}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        {{$videos->links()}}
                    </div>
                    <div class="col-4">
                        <div class="card" style="border-top: 3px solid indigo">
                            <form method="post" action="{{route('post.add.video')}}" enctype="multipart/form-data">
                                <div class="card-header">
                                    <h3>Add New Video</h3>
                                    <h6>If video link is from YouTube, please fill video ID in <em>link or Video ID field</em> and check <em>YouTube video field</em>.</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="video_photo" ><span class="fa fa-image"></span> Video photo</label>
                                        <input type="file" name="videoPhoto" id="video_photo" class="form-control @if($errors->has('videoPhoto')) is-invalid @endif">
                                        @if($errors->has('videoPhoto'))<span class="invalid-feedback">{{$errors->first('videoPhoto')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control @if($errors->has('title')) is-invalid @endif">
                                        @if($errors->has('title')) <span class="invalid-feedback">{{$errors->first('title')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link or Video ID</label>
                                        <input type="text" name="link" id="link" class="form-control @if($errors->has('link')) is-invalid @endif">
                                        @if($errors->has('link')) <span class="invalid-feedback">{{$errors->first('link')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" class="custom-select @if($errors->has('category')) is-invalid @endif" id="category">
                                            <option></option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                        </select>
                                        @if($errors->has('category')) <span class="invalid-feedback">{{$errors->first('category')}}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="rate" >Rating #<span id="rateLabel"></span></label>
                                        <input name="rate" type="range" class="custom-range" min="0" max="10" step="0.5" id="rate">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control @if($errors->has('description')) is-invalid @endif"></textarea>
                                        @if($errors->has('description')) <span class="invalid-feedback">{{$errors->first('description')}}</span> @endif
                                    </div>
                                    <div class="form-group form-check">
                                        <input name="link_type" type="checkbox" class="form-check-input" id="type_link">
                                        <label class="form-check-label" for="type_link">YouTube video</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-info">Upload</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
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
            $('#rateLabel').html($('#rate').val());
            $('#rate').on('change',function () {
                $('#rateLabel').html($('#rate').val());
            });
            $('#rateLabel1').html($('#rate1').val());
            $('#rate1').on('change',function () {
                $('#rateLabel1').html($('#rate1').val());
            });
        });
    </script>
    @stop