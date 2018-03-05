<?php use \App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Gift Information')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('gifts.show') }}
@stop
@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-8">
            <!-- create manager form -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('gifts.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                        @if($editAction == true)
                        <a href="{{route('gifts.edit', $gift->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        @endif
                        @if($deleteAction == true)
                        <a data-toggle="modal" data-target="#popup-confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        @endif
                    </span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if($gift->delete_is == 1)
                    <div class="alert alert-danger clearfix">
                        <p>This item was delete.</p>
                    </div>
                    @endif
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
    @if($deleteAction == true)
    {{--popup confirm--}}
    <div id="popup-confirm" class="modal popup-confirm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you really want to delete this item?</p>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                    <form id="formHolder" class="inline" action="{{route('gifts.destroy', $gift->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-sm btn-danger" type="submit"> Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection