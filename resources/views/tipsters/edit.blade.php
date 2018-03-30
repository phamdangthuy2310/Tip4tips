<?php use App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Edit Tipster')
@section('javascript')
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
                <div class="box-header with-border">
                    <h3 class="box-title">Actions</h3>
                </div>
                <div class="box-body box-profile">

                    <div class="upload__area-image">
                        <span>
                            <img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/no_image_available.jpg">
                            <label for="imgAnchorInput">Upload image</label>
                        </span>
                        <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                        <h4>Avatar</h4>
                    </div>
                    <div class="form__upload">
                        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                        <div class="form-inline-simple">
                            {!! Form::file('image', array('class' => 'form-control', 'id' => 'imgAnchorInput', 'onchange' =>'loadFile(event)')) !!}
                        </div>
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('imgHandle');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            document.getElementById('imgHandleInput').files = event.target.files;
                          };
                        </script>
                        {!! Form::close() !!}

                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-body box-points">
                    <h4>Points total: <span>{{$user->point}}</span> points</h4>
                    <p><a data-toggle="modal" data-target="#pointsAction" class="btn btn-primary">Update points</a></p>
                </div>
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-8 col-md-pull-4">
            <!-- create manager form -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <a href="{{route('tipsters.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
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
                <form role="form" method="post" action="{{route('tipsters.update', $id)}}" enctype = "multipart/form-data">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
                    <input id="imgHandleInput" name="avatar" type="file" value="{{$user->avatar}}">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="width: 100%">Preferred language</label>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="vn" name="preferred_lang" @if($user->preferred_lang == 'vn') checked @endif>
                                            Vietnam
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="en" name="preferred_lang" @if($user->preferred_lang == 'en') checked @endif>
                                            English
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="width: 100%">Status</label>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="0" name="status" @if($user->delete_is == 0) checked @endif>
                                            Active
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="1" name="status" @if($user->delete_is == 1) checked @endif>
                                            Non Active
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label>Username</label>
                                    <input name="username" type="text" class="form-control" value="{{$user->username}}">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                    <label>Full name</label>
                                    <input name="fullname" type="text" class="form-control" value="{{$user->fullname}}" placeholder="Enter ...">
                                    @if ($errors->has('fullname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input name="birthday" type="date" class="form-control" value="{{$user->birthday}}" placeholder="Enter ...">
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
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" value="{{$user->email}}" placeholder="Enter ...">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
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
                                    <textarea name="address" class="form-control" placeholder="Enter ..." rows="4">{{$user->address}}</textarea>
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
                                    <label>Level</label>
                                    <select class="form-control" name="department">
                                        <option value="" disabled selected>Please pick a level</option>
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
                                    <label>Points</label>
                                    <input class="form-control" type="number" value="{{$user->point}}" name="point" @if($editPoints == false) readonly @endif>
                                </div>
                            </div>

                        </div>




                    </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('tipsters.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
        <div id="pointsAction" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Points Action</h4>
                    </div>
                    <div class="modal-body">
                        <form method="get" class="form-horizontal form-horizontal-custom" action="{{route('tipsters.updatePointSendMail', $user->id)}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="frmTipster">Tipster:</label>
                                <div class="control-input">
                                    <input id="frmTipster" type="text" readonly class="form-control" placeholder="{{$user->username}}-{{$user->fullname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="frmAction">Action:</label>
                                <div class="control-input">
                                    <select id="frmAction" class="form-control" name="action" required autofocus>
                                        <option value="{{Utils::$lead_process_status_call}}">Call</option>
                                        <option value="{{Utils::$lead_process_status_quote}}">Quote</option>
                                        <option value="{{Utils::$lead_process_status_win}}">Win</option>
                                        <option value="{{Utils::$lead_process_status_lost}}">Lost</option>
                                        <option value="{{Utils::$tipster_process_bonus}}">Bonus</option>
                                        <option value="{{Utils::$tipster_process_buy_gift}}">Buy Gift</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="frmActionType">Points:</label>
                                <div class="control-input control-inline">
                                    <select id="frmActionType" class="form-control" name="actionType" style="width: 60px; margin-right: 10px">
                                        <option value="plus" selected>+</option>
                                        <option value="minus">-</option>
                                    </select>
                                    <input name="pointsUpdate" type="number" class="form-control" required autofocus style="width: calc(100% - 70px)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="frmComment" style="vertical-align: top;">Comment:</label>
                                <div class="control-input">
                                    <textarea id="frmComment" name="comment" class="form-control" rows="5" ></textarea>
                                </div>
                            </div>
                            <div class="form-action">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary pull-right">Update points</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endif
@endsection