@extends('layouts.master')
@section('title', 'Product Information')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-8">
            <!-- create manager form -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Product</h3>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-xs btn-info pull-right"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">


                    <p class="text-muted">
                        <strong><i class="fa fa-shield margin-r-5"></i> Product name: </strong>
                        {{$product->name}}
                    </p>

                    <hr>

                    <p class="text-muted">
                        <strong><i class="fa fa-info-circle margin-r-5"></i> Description:</strong>
                        {{$product->description}}

                    </p>

                    <hr>


                    <p class="text-muted">
                        <strong><i class="fa fa-folder-open margin-r-5"></i> Category:</strong>
                        {{$product->category}}
                    </p>

                    <hr>


                    <p class="text-muted">
                        <strong><i class="fa fa-money margin-r-5"></i> Price:</strong>
                        {{$product->price}}
                    </p>

                    <hr>


                    <p class="text-muted">
                        <strong><i class="fa fa-cubes margin-r-5"></i> Quality:</strong>
                        {{$product->quality}}
                    </p>


                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Image</h3>
                </div>
                <div class="box-body text-center">
                    <p><img src="{{ asset('images/no_image_available.jpg') }}"></p>
                </div>
            </div>
        </div>
    </div>

@endsection