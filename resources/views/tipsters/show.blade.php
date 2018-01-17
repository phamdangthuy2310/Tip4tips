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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong><i class="fa fa-address-book margin-r-5"></i> Fullname</strong>

                            <p class="text-muted">
                                {{ $user->fullname }}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <strong><i class="fa fa-building margin-r-5"></i> Department</strong>

                            <p class="text-muted">
                                {{$role->name}} - {{$roletype->name}}

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-calendar margin-r-5"></i> Calendar</strong>

                            <p class="text-muted">
                                {{$user->birthday}}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-venus-mars margin-r-5"></i> Gender</strong>

                            <p class="text-muted">
                                {{ $user::showGender($user->gender) }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                            <p class="text-muted">
                                {{$user->email}}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                            <p class="text-muted">
                                {{$user->phone}}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-home margin-r-5"></i> Address</strong>

                            <p class="text-muted">
                                {{$user->address}}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                            <p class="text-muted">{{ \App\Model\Region::getNameByID($user->region_id)->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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