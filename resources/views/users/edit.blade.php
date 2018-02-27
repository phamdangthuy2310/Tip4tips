<?php
use App\Common\Common;
use App\Common\Utils;
?>
@extends('layouts.master')
@section('title', 'Edit User')
@section('javascript')
    <script>
      $(document).ready(function () {
        var src = '{{asset(Utils::$PATH__IMAGE)}}/';
        $("#imgAnchorInput").change(function() {
          $("#imgHandleInput").val($(this).val());
          src += $(this).val();
          console.log(src, $(this).val());
          $("#imgHandle").attr('src', src);
        }).change();
      })
    </script>
@endsection
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('users.edit') }}
@stop

@section('content')
    @if($editAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-4 col-md-push-8">

                <!-- Profile Image -->
                <div class="box box-warning">
                    <div class="box-body box-profile">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            <input id="imgAnchorInput" type="hidden" value="{{Session::get('image')}}">

                        @endif
                        <div class="upload__area-image">
                            <span><img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/{{$user->avatar}}"></span>
                        </div>
                        <div class="form__upload">
                            {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                            <div class="form-inline-simple">
                                {!! Form::file('image', array('class' => 'form-control')) !!}
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>

                            {!! Form::close() !!}

                        </div>

                        {{--<h3 class="profile-username text-center">@if($user->fullname) {{ $user->fullname }} @else {{ $user->username }} @endif </h3>--}}

                        {{--<p class="text-muted text-center">{{\App\Model\Role::getNameRoleByID($user->role_id)}}</p>--}}
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
                        <h3 class="box-title">@yield('title')</h3>
                        <span class="group__action pull-right">
                            <a href="{{route('users.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                        </span>

                    </div>
                    @if ($errors->any())
                        <div class="box-body">
                            <div class="alert alert-danger">
                                @if (count($errors) > 0)
                                    <strong>Whoops!</strong> There were some problems with your input.
                                @endif
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>@endif
                    <!-- /.box-header -->
                    <form role="form" method="post" action="{{route('users.update', $id)}}">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <input id="imgHandleInput" name="avatar" type="hidden" value="">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" type="text" class="form-control" value="{{$user->username}}" disabled="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input name="fullname" type="text" class="form-control" value="{{$user->fullname}}" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input name="birthday" type="text" class="form-control" value="{{$user->birthday}}" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="width: 100%">Gender</label>
                                    <div class="radio-inline">
                                        <label><input type="radio" value="0" name="gender" @if($user->gender == 0) checked @endif>
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" value="1" name="gender" @if($user->gender == 1) checked @endif>
                                            Female
                                        </label>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" value="{{$user->email}}" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" type="text" class="form-control" value="{{$user->phone}}" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control" value="{{$user->address}}" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Region</label>
                                    <select name="region" class="form-control">
                                        <option value="" disabled selected>Please pick a region</option>
                                        @foreach($regions as $region)
                                            <option value="{{$region->id}}" @if($region->id == $user->region_id) selected @endif>{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="department">
                                        <option value="" disabled selected>Please pick a department</option>
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
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="" disabled selected>Please pick a status</option>
                                        <option value="1" @if($user->delete_is == 1) selected @endif>Active</option>
                                        <option value="0" @if($user->delete_is == 0) selected @endif>Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{route('users.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    @endif
@endsection