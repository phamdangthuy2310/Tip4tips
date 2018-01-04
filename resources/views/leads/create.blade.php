@extends('layouts.master')
@section('title', 'Add new manager')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-warning">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatar2.png') }}" alt="User profile picture">

                    <h3 class="profile-username text-center">Thuy Pham</h3>

                    <p class="text-muted text-center">Admin</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Create a new manager</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{url('leads')}}">
                    {{ csrf_field() }}
                <div class="box-body">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Full name</label>
                            <input name="fullname" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Birthday</label>
                            <input name="birthday" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <select name="region" class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Need</label>
                            <textarea name="need" class="form-control"></textarea>
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