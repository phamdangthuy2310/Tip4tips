<?php
use App\Common\Common;
use App\Common\Utils;
?>
@extends('layouts.master')
@section('title', 'User detail')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('users.show') }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-8">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="upload__area-image">
                        <span><img id="imgHandle" src="@if($user->avatar){{asset(Utils::$PATH__IMAGE)}}/{{$user->avatar}}@else{{Utils::$PATH__DEFAULT__AVATAR}}@endif" ></span>
                    </div>
                    <p class="text-muted text-center" title="Username">
                        <strong><i class="fa fa-user margin-r-5"></i> {{$user->username}}</strong>
                    </p>
                    <hr>

                    <p class="text-center">
                        @if($user->delete_is == 0)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Non active</span>
                        @endif
                    </p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-8 col-md-pull-4">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('users.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                        @if($editAction == true)
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        @endif
                        @if($deleteAction == true && $user->delete_is==0)
                            <a data-toggle="modal" data-target="#popup-confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        @endif
                    </span>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-address-book margin-r-5"></i> Fullname
                                <span class="text-highlight">{{ $user->fullname }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-building margin-r-5"></i> Department
                                <span class="text-highlight">{{$user->role}} - {{$user->roletype}}</span>

                            </p>
                        </div>
                    </div>
                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-calendar margin-r-5"></i> Birthday
                                <span class="text-highlight">{{$user->birthday}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-venus-mars margin-r-5"></i> Gender
                                <span class="text-highlight">{{ $user->genderName }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-envelope margin-r-5"></i> Email
                                <span class="text-highlight">{{$user->email}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-phone margin-r-5"></i> Phone
                                <span class="text-highlight">{{$user->phone}}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-home margin-r-5"></i> Address
                                <span class="text-highlight">{{$user->address}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-map-marker margin-r-5"></i> Location
                                <span class="text-highlight">{{ $user->region }}</span></p>
                        </div>
                    </div>
                    <div class="row box-line">
                        <div class="col-sm-12">
                            <p>
                                <i class="fa fa-file-text-o margin-r-5"></i> Notes
                                <span class="text-highlight"></span>
                            </p>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @if($deleteAction == true)
    {{--popup confirm--}}
    <div id="popup-confirm" class="modal popup-confirm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you really want to delete user "{{$user->fullname}}" ?</p>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                    <form class="inline" action="{{route('users.destroy', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-sm btn-danger" type="submit">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection