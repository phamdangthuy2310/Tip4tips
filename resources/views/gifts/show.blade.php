@extends('layouts.master')
@section('title', 'Gift Information')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- create manager form -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Gift</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-user margin-r-5"></i> Gift name</strong>

                    <p class="text-muted">
                        {{$gift->name}}
                    </p>

                    <hr>
                    <strong><i class="fa fa-building margin-r-5"></i> Description</strong>

                    <p class="text-muted">
                        {{$gift->description}}

                    </p>

                    <hr>

                    <strong><i class="fa fa-address-book margin-r-5"></i> Points</strong>

                    <p class="text-muted">
                        {{$gift->point}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-envelope margin-r-5"></i> Category</strong>

                    <p class="text-muted">
                        {{$gift->category}}
                    </p>
                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection