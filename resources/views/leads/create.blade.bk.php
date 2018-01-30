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
    <div class="row">
        <div class="col-md-8">
            <!-- create manager form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Lead</h3>
                    <a href="{{route('leads.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{url('leads')}}">
                    {{ csrf_field() }}
                <div class="box-body">
                    <h4 class="label label-primary">Primary</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
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
                        <div class="col-xs-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Full name</label>
                                <input name="fullname" type="text" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Product</label>
                                <select name="product" class="form-control">
                                    @foreach(\App\Model\Product::getAllProduct() as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
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
                    <div class="row">
                        {{--<div class="col-sm-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label>Address</label>--}}
                                {{--<input name="address" type="text" class="form-control" placeholder="Enter ...">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea name="notes" class="form-control" placeholder="URGENT - PLEASE CONTACT ASAP" rows="5"></textarea>
                            </div>
                        </div>

                    </div>

                    <hr/>
                    <h4 class="label label-default">General</h4>
                    <hr/>
                    <div class="row">
                        {{--<div class="col-sm-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<label>Birthday</label>--}}
                                {{--<input name="birthday" type="date" class="form-control" placeholder="Enter ...">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-sm-6">
                            <div class="form-group">
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tipster</label>
                                <select name="tipster" class="form-control">
                                    @foreach($tipsters as $tipster)
                                        <option value="{{$tipster->id}}" @if(Auth::user()->id == $tipster->id) selected @endif>{{$tipster->fullname}} - {{$tipster->username}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('leads.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>

        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Assignment Area</h3>
                </div>
                <div class="box-body">
                    <p class="text-center">Please create lead to uses this action at <br/><span class="inline text-bold">Edit Lead Screen</span>.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->


    </div>
@endif
@endsection