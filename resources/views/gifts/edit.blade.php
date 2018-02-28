<?php use \App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Edit Gift')
@section('javascript')
    <script src="{{ asset('js/admin/gift.js') }}"></script>
    <script>
      $(document).ready(function () {
        var src = '{{asset(Utils::$PATH__IMAGE)}}/';
        $("#imgAnchorInput").change(function() {
          $("#imgHandleInput").val($(this).val());
          src += $(this).val();
          console.log(src, $(this).val());
          $("#imgHandle").attr('src', src);
        }).change();
      })
    </script>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- /.box-header -->
                <form role="form" method="post" action="{{route('gifts.update', $gift->id)}}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <input id="imgHandleInput" name="thumbnail" type="hidden" value="{{$gift->thumbnail}}">
                        <div class="box-body">
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
                    <h3 class="box-title">Upload Gifts Image</h3>
                </div>
                <div class="box-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        <input id="imgAnchorInput" type="hidden" value="{{Session::get('image')}}">

                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="upload__area-thumbnail">
                        <p><span>
                            @if(!empty($gift->thumbnail))
                                <img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/{{$gift->thumbnail}}">
                                @else
                                <img id="imgHandle" src="{{ asset('images/no_image_available.jpg') }}">
                            @endif
                        </span></p>
                    </div>
                    <div class="form__upload">
                        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                        <div class="form-inline-simple">
                            {!! Form::file('image', array('class' => 'form-control')) !!}
                            <button type="submit" class="btn btn-info">Upload</button>
                        </div>

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