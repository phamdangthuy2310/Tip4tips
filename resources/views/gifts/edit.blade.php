<?php use \App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Edit Gift')
@section('javascript')
    <script src="{{ asset('js/admin/gift.js') }}"></script>
@endsection
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('gifts.edit') }}
@stop
@section('content')
    @if($editAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else

    <div class="row">
        <!-- /.col -->
        <div class="col-md-8">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('gifts.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                    </span>
                </div>

                <!-- /.box-header -->
                <form role="form" method="post" action="{{route('gifts.update', $gift->id)}}" enctype = "multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <input id="imgHandleInput" name="thumbnail" type="file" value="">
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @if (count($errors) > 0)
                                        <strong>Whoops!</strong> There were some problems with your input.
                                    @endif
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Gift name</label>
                                <input name="name" value="{{$gift->name}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5">{{$gift->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option readonly="true">Please pick a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $gift->category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Point</label>
                                <input name="point" value="{{$gift->point}}" type="number" class="form-control">
                            </div>


                        </div>
                <!-- /.box-body -->

                    <div class="box-footer">
                        <a class="btn btn-default" href="{{route('gifts.index')}}">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
            </div>

            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Gifts Image</h3>
                </div>
                <div class="box-body">
                    <div class="upload__area-image">
                        <span>
                            <img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/{{$gift->thumbnail}}">
                            <label for="imgAnchorInput">Upload image</label>
                        </span>
                        <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                    </div>
                    <div class="form__upload">
                        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                        <div class="form-inline-simple">
                            {!! Form::file('image', array('class' => 'form-control', 'id' => 'imgAnchorInput', 'onchange' =>'loadFile(event)')) !!}
                        </div>
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('imgHandle');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            document.getElementById('imgHandleInput').files = event.target.files;
                          };
                        </script>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Category</h3>
                </div>
                <div class="box-body">
                    <div id="categoryForm" class="categoryForm" data-url="{{route('gifts.addcategory')}}">
                        <div class="form-group">
                            <input name="categoryName" class="form-control" placeholder="Ex: Insurance">
                            <button id="catAdd" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group">
                            <label id="catAlert" class="label"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
@endsection