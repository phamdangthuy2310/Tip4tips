@extends('layouts.master')
@section('title', 'Add new user')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-8">

            <!-- Profile Image -->
            <div class="box box-warning">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatar2.png') }}" alt="User profile picture">
                </div>
                <div class="box-body text-center">
                    <p>Please upload an image.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-8 col-md-pull-4">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Create a new user</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{url('leads')}}">
                    {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Full name</label>
                                <input name="fullname" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input name="birthday" type="date" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Region</label>
                                <select name="region" class="form-control">
                                    @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                        <div class="form-group">
                            <label>Need</label>
                            <textarea name="need" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tipster</label>
                            <select name="tipster" class="form-control">
                                @foreach($tipsters as $tipster)
                                <option value="{{$tipster->id}}">{{$tipster->fullname}} - {{$tipster->username}} </option>
                                @endforeach
                            </select>
                        </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>


    </div>

@endsection