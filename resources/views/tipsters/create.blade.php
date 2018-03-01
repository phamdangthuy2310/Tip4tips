<?php use \App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Create Tipster')
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
    {{ Breadcrumbs::render('tipsters.create') }}
@stop
@section('content')
    @if($createAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-md-4 col-md-push-8">
            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Actions</h3>
                </div>
                <div class="box-body box-profile">
                    @if ($message = Session::get('success'))
                        <input id="imgAnchorInput" type="hidden" value="{{Session::get('image')}}">

                    @endif
                    <div class="upload__area-image">
                        <span><img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/no_image_available.jpg"></span>
                    </div>
                    <div class="form__upload">
                        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                        <div class="form-inline-simple">
                            {!! Form::file('image', array('class' => 'form-control')) !!}
                            <button type="submit" class="btn btn-info">Upload</button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-8 col-md-pull-4">
            <!-- create manager form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <a href="{{route('tipsters.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                </div>

                <!-- /.box-header -->
                <form role="form" method="post" action="{{route('tipsters.store')}}">
                    {{ csrf_field() }}
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @if (count($errors) > 0)
                                <strong>Whoops!</strong> There were some problems with your input.
                            @endif
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                        <input id="imgHandleInput" name="avatar" type="hidden" value="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" value="{{ old('username') }}" type="text" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password confirm</label>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Full name</label>
                                <input name="fullname" value="{{old('fullname')}}" type="text" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input name="birthday" value="{{old('birthday')}}" type="date" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="width: 100%">Gender</label>
                                <div class="radio-inline">
                                    <label><input type="radio" value="0" name="gender" checked>
                                        Male
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label><input type="radio" value="1" name="gender">
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
                                <input name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" value="{{old('phone')}}" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" value="{{old('address')}}" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Region</label>
                                <select name="region" class="form-control" required>
                                    <option value="" disabled selected>Please pick a region</option>
                                    @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Level</label>
                                <select name="department" class="form-control" required>
                                    <option value="" disabled selected>Please pick a level</option>
                                    @foreach($roletypes as $roletype)
                                        <optgroup label="{{$roletype->name}}">
                                            @foreach($roles as $role)
                                                @if($role->roletype_id == $roletype->id)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('tipsters.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>
@endif
@endsection