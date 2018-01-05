@extends('layouts.master')
@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatar2.png') }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$lead->fullname}}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-address-book margin-r-5"></i> Fullname</strong>

                    <p class="text-muted">
                        {{ $lead->fullname }}
                    </p>

                    <hr>

                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                    <p class="text-muted">
                        {{$lead->email}}
                    </p>

                    <hr>
                    <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                    <p class="text-muted">
                        {{$lead->phone}}
                    </p>

                    <hr>
                    <strong><i class="fa fa-home margin-r-5"></i> Address</strong>

                    <p class="text-muted">
                        {{$lead->address}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Region</strong>

                    <p class="text-muted">{{$lead->region}}</p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Need</strong>

                    <p>{{$lead->need}}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection