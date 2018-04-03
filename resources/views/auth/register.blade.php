<?php use \App\Model\Region; ?>
@extends('layouts.app')
@section('bodyclass','has-img')
@include('inc.changeImageBody')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-register form__transparent">
                <div class="panel-heading">Tipster Register</div>

                <div class="panel-body">
                    <form class="register__form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username">Username</label>

                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                            <label for="password">Region</label>
                            <select class="form-control" name="region_id" required autofocus>
                                <option value="" selected disabled="disabled">Please select your region</option>
                                @foreach(Region::getAllRegion() as $region )
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('region_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('region_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
