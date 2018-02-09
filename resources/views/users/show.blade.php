@extends('layouts.master')
@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-8">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatar2.png') }}" alt="User profile picture">

                    <p class="text-center">Avatar</p>

                    <p class="text-center">
                        @if($user->delete_is == 1)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Deactive</span>
                        @endif
                    </p>

                    <hr>

                    <p class="text-muted text-center">
                        <strong><i class="fa fa-user margin-r-5"></i> {{$user->username}}</strong>
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
                    <h3 class="box-title">About Me</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('users.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
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
                                <span class="text-highlight">{{$role->name}} - {{$roletype->name}}</span>

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
                                <span class="text-highlight">{{ $user::showGender($user->gender) }}</span>
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
                                <span class="text-highlight">{{ \App\Model\Region::getNameByID($user->region_id)->name }}</span></p>
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

@endsection