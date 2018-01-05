@extends('layouts.master')
@section('title', 'Add new product')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Create a new product</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{action('ProductsController@update', $id)}}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Product name</label>
                                <input name="name" value="{{$product->name}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{$product->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input name="thumbnail" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" value="{{$product->price}}" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Quality</label>
                                <input name="quality" value="{{$product->quality}}" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection