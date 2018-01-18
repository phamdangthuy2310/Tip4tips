@extends('layouts.master')
@section('title', 'Edit Gift')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Gift</h3>
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
                <form role="form" method="post" action="{{action('GiftsController@update', $id)}}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Product name</label>
                                <input name="name" value="{{$gift->name}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{$gift->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input name="thumbnail" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Point</label>
                                <input name="point" value="{{$gift->point}}" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $gift->category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
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
    </div>

@endsection