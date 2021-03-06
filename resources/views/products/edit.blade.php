<?php use App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Edit Product')
@section('javascript')
    <script src="{{ asset('js/admin/product.js') }}"></script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('products.edit') }}
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
                    <h3 class="box-title">Product</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('products.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                    </span>
                </div>

                <!-- /.box-header -->
                <form role="form" method="post" action="{{route('products.update', $id)}}" enctype = "multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <input id="imgHandleInput" name="thumbnail" type="file" value="{{$product->thumbnail}}">
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
                                <label>Product name</label>
                                <input name="name" value="{{$product->name}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option value="" disabled selected>Please pick a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Price</label>
                                    <input name="price" value="{{$product->price}}" type="number" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Quality</label>
                                    <input name="quality" value="{{$product->quality}}" type="number" class="form-control">
                                </div>
                            </div>



                        </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('products.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
                </form>
            </div>

            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Image</h3>
                </div>
                <div class="box-body">
                    <div class="upload__area-image">
                        <span>
                            <img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/{{$product->thumbnail}}">
                            <label for="imgAnchorInput">Upload image</label>
                        </span>
                        <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                    </div>
                    <div class="form__upload">
                        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                        <div class="form-inline-simple">
                            {!! Form::file('image', array('class' => 'form-control', 'id' => 'imgAnchorInput', 'onchange' =>'loadFile(event)')) !!}
                            {{--<button type="submit" class="btn btn-info">Upload</button>--}}
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
                    <div id="categoryForm" class="categoryForm" data-url="{{route('products.addcategory')}}">
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