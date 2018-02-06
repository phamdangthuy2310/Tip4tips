<?php use App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Create Lead')

@section('content')
    @if($createAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
        <form role="form" method="post" action="{{route('leads.create')}}">
            {{ csrf_field() }}
            {{--@include('layouts.partials._input_history_user',--}}
                        {{--['affectedValue' => Utils::$LOG_AFFECTED_OBJECT_LEAD ,--}}
                        {{--'actionValue' => Utils::$LOG_ACTION_CREATE,--}}
                        {{--'nameObjectValue' => 'fullname'])--}}
            <div class="row">
                <div class="col-md-8">
                    <!-- create manager form -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create Lead</h3>
                            <a href="{{route('leads.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
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
                            <div class="row">
                                <div class="col-xs-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input name="fullname" type="text" class="form-control" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group group__gender">
                                        <label style="width: 100%">Gender</label>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" value="0" name="gender" checked>
                                                Male
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" value="1" name="gender">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Region</label>
                                        <select name="region" class="form-control">
                                            <option value="" disabled selected>Please pick a region</option>
                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Product</label>
                                        <select name="product" class="form-control">
                                            <option value="" disabled selected>Please pick a product</option>
                                            @foreach(\App\Model\Product::getAllProduct() as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea name="notes" class="form-control" placeholder="URGENT - PLEASE CONTACT ASAP" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{route('leads.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Create</button>
                        </div>
                    </div>

                    <!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Actions</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tipster reference</label>
                                <select name="tipster" class="form-control">
                                    <option  value="" disabled selected>Please pick a tipster</option>
                                    @foreach($tipsters as $tipster)
                                        <option value="{{$tipster->id}}" @if(Auth::user()->id == $tipster->id) selected @endif>{{$tipster->fullname}} - {{$tipster->username}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

            </div>
        </form>
@endif
@endsection