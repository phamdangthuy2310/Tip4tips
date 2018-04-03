<?php
use \App\Common\Utils;
use \App\Common\Common;
use \App\User;
use Illuminate\Support\Facades\Auth;
$auth = Auth::user();
$infoUser = User::getUserByID($auth->id);
?>
@extends('layouts.master')
@section('title', 'Change Password')
@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- create manager form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <a href="@if($infoUser->roletypeCode == 'tipster'){{route('tipsters.show', $auth->id)}}@else{{route('users.show', $auth->id)}} @endif" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to profile</a>
                </div>

                <!-- /.box-header -->
                <div class="form__password-change">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label>Current Password*</label>
                            <input class="form-control" type="password" name="current_password" required autofocus>
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label>New Password*</label>
                            <input class="form-control" type="password" name="new_password" required autofocus>
                            @if ($errors->has('new_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>New Password Confirm*</label>
                            <input class="form-control" type="password" name="new_password_confirmation" required autofocus>
                        </div>
                        <div class="form-action">
                            <a href="{{route('dashboard')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.box -->
        </div>
    </div>
@endsection