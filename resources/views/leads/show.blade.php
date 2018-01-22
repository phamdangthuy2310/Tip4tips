@extends('layouts.master')
@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-8">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatar2.png') }}" alt="User profile picture">
                    <p class="text-muted text-center">Avatar</p>
                    <p class="text-muted text-center"><span class="label-status {{\App\Model\Lead::showColorStatus($lead->status)}}">{{\App\Model\Lead::showNameStatus($lead->status)}}</span></p>
                    <hr/>
                    <p><strong>Be Assigned to:</strong><br/>
                    {{ \App\User::getUserByID(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id)->fullname }} - {{\App\Model\Role::getNameRoleByID(\App\User::getUserByID(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id)->role_id)}}</p>
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
                    <h3 class="box-title">About {{$lead->fullname}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <strong><i class="fa fa-address-book margin-r-5"></i> Fullname</strong>

                            <p class="text-muted">
                                {{ $lead->fullname }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-calendar margin-r-5"></i> Birthday</strong>

                            <p class="text-muted">
                                {{$lead->birthday}}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-venus-mars margin-r-5"></i> Gender</strong>

                            <p class="text-muted">
                                {{\App\Model\Lead::showGender($lead->gender)}}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                            <p class="text-muted">
                                {{$lead->email}}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                            <p class="text-muted">
                                {{$lead->phone}}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <hr>
                            <strong><i class="fa fa-home margin-r-5"></i> Address</strong>

                            <p class="text-muted">
                                {{$lead->address}}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Region</strong>

                            <p class="text-muted">{{$lead->region}}</p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Product</strong>

                            <p>{{$lead->need}}</p>
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