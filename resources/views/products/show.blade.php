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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-user margin-r-5"></i> Product name</strong>

                    <p class="text-muted">
                        {{$product->name}}
                    </p>

                    <hr>
                    <strong><i class="fa fa-building margin-r-5"></i> Description</strong>

                    <p class="text-muted">
                        {{$product->description}}

                    </p>

                    <hr>

                    <strong><i class="fa fa-envelope margin-r-5"></i> Category</strong>

                    <p class="text-muted">
                        {{$product->category}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-address-book margin-r-5"></i> Price</strong>

                    <p class="text-muted">
                        {{$product->price}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-envelope margin-r-5"></i> Quality</strong>

                    <p class="text-muted">
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
                <div class="box-body">
                    <p><img src="{{ asset('images/no_image_available.jpg') }}"></p>
                </div>
            </div>
        </div>
    </div>

@endsection