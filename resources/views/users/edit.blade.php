@extends('layouts.master')
@section('title', 'Edit Manager')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                    <h3 class="box-title">Edit manager</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{action('UsersController@update', $id)}}">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="{{$user->username}}" disabled="">
                    </div>

                    <div class="form-group">
                        <label>Full name</label>
                        <input name="fullname" type="text" class="form-control" value="{{$user->fullname}}" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="0" @if($user->gender == 0) selected @endif>Male</option>
                            <option value="1" @if($user->gender == 1) selected @endif>Female</option>
                            <option value="2" @if($user->gender == 2) selected @endif>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Birthday</label>
                        <input name="birthday" type="text" class="form-control" value="{{$user->birthday}}" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="{{$user->email}}" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" type="text" class="form-control" value="{{$user->phone}}" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" type="text" class="form-control" value="{{$user->address}}" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Region</label>
                        <select class="form-control">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-control" name="department">
                            
                            @foreach($roletypes as $roletype)
                                <optgroup label="{{$roletype->name}}">
                                    @foreach($roles as $role)
                                        @if($role->roletype_id == $roletype->id)
                                        <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" @if($user->delete_is == 1) selected @endif>Active</option>
                            <option value="0" @if($user->delete_is == 0) selected @endif>Deactive</option>
                        </select>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection