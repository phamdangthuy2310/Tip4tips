<?php use \App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Gift Information')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-8">
            <!-- create manager form -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Gift</h3>
                    <a href="{{route('gifts.edit', $gift->id)}}" class="btn btn-xs btn-info pull-right"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p class="text-muted">
                        <strong><i class="fa fa-gift margin-r-5"></i> Gift name:</strong>
                        {{$gift->name}}
                    </p>

                    <hr>
                    <p class="text-muted">
                        <strong><i class="fa fa-info-circle margin-r-5"></i> Description:</strong>
                        {{$gift->description}}
                    </p>

                    <hr>
                    <p class="text-muted">
                        <strong><i class="fa fa-folder-open margin-r-5"></i> Category:</strong>
                        {{$gift->category}}
                    </p>

                    <hr>
                    <p class="text-muted">
                        <strong><i class="fa fa-braille margin-r-5"></i> Points:</strong>
                        {{$gift->point}}
                    </p>
                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Gifts Image</h3>
                </div>
                <div class="box-body text-center">
                    <p>@if(!empty($gift->thumbnail))
                            <img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/{{$gift->thumbnail}}">
                        @else
                            <img id="imgHandle" src="{{ asset('images/no_image_available.jpg') }}">
                        @endif</p>
                </div>
            </div>
        </div>
    </div>

@endsection