@extends('layouts.master')
@section('title', 'Create Gift')
@section('javascript')
    <script src="{{ asset('js/admin/product.js') }}"></script>
@stop
@section('content')
    @if($createAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
    <form role="form" method="post" action="{{route('gifts.create')}}">
        {{ csrf_field() }}
        <div class="row">
            <!-- /.col -->
            <div class="col-md-8">
                <!-- create manager form -->

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Gift</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group">
                            <label>Gifts name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Point</label>
                            <input placeholder="0" name="point" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="" disabled selected>Please pick a category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{route('gifts.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>

                </div>

                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Gift Image</h3>
                    </div>
                    <div class="box-body">
                        <p><img src="{{ asset('images/no_image_available.jpg') }}"></p>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="thumbnail" type="file" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="box box-success">
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
    </form>
    @endif
@endsection