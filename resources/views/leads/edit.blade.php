@extends('layouts.master')
@section('title', 'Edit Lead')

@section('content')
    @if($editAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
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
            <div class="col-md-8">
                <!-- create manager form -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Lead</h3>
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
                    <form role="form" method="post" action="{{route('leads.update', $lead->id)}}">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="box-body">
                            <h4 class="label label-primary">Primary</h4>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input name="fullname" type="text" class="form-control" value="{{$lead->fullname}}" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control" value="{{$lead->email}}" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" type="text" class="form-control" value="{{$lead->phone}}" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" type="text" class="form-control" value="{{$lead->address}}" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Region</label>
                                        <select name="region" class="form-control">
                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}" @if($region->id == $lead->region_id) selected @endif>{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product</label>
                                        <select name="product" class="form-control">
                                            @foreach(\App\Model\Product::getAllProduct() as $product)
                                                <option value="{{$product->id}}" @if($product->id == $lead->product_id) selected @endif>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <hr/>
                            <h4 class="label label-default">General</h4>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input name="birthday" type="text" class="form-control" value="{{$lead->birthday}}" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="width: 100%">Gender</label>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" value="0" name="gender" @if($lead->gender == 0) checked @endif>
                                                Male
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label>
                                                <input type="radio" value="1" name="gender" @if($lead->gender == 1) checked @endif>
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
                                                <option value="{{$tipster->id}}" @if($tipster->id == $lead->tipster_id) selected @endif>{{$tipster->fullname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="{{route('leads.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assignment Area</h3>
                    </div>
                    <div class="box-body">
                    <!-- /.box-header -->
                        <form role="form" method="post" action="{{url('assignments')}}">
                            {{ csrf_field() }}

                            <input type="hidden" name="lead" value="{{$lead->id}}">
                            <div class="form-group">
                                <label>Assign to Consultant</label>
                                <select name="consultant" class="form-control">
                                    @foreach(\App\User::getAllConsultant() as $consultant)
                                        <option value="{{$consultant->id}}" @if(!empty(\App\Model\Assignment::getConsultantByLead($lead->id)) && \App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id == $consultant->id) selected @endif>{{$consultant->fullname}} - {{\App\Model\Role::getInfoRoleByID($consultant->role_id)->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.box-body -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Assign</button>
                            </div>
                        </form>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status process</h3>
                    </div>
                    <div class="box-body">
                        <form>
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    @for($i=1; $i < 5; $i++)
                                        <option value="{{$i}}" @if($i == $lead->status) selected @endif>{{\App\Model\Lead::showNameStatus($i)}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="pull-right btn btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.col -->

        </div>
    @endif
@endsection