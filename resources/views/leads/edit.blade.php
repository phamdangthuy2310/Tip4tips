@extends('layouts.master')
@section('title', 'Edit Lead')
@section('javascript')
    <script src="{{ asset('js/admin/lead.js') }}"></script>
    <script>
        $(document).ready(function () {
          $("#tipsterAnchor").change(function() {
            $("#tipsterHandle").val($(this).val());
          }).change();

          $('#clickHistory').on('click', function () {
            $('#showHistory').slideToggle(300);
          })
        })
    </script>
@stop
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
                        <a href="{{route('leads.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                    </div>
                    @if ($errors->any())
                    <div class="box-body">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- /.box-header -->
                    <form role="form" method="post" action="{{route('leads.update', $lead->id)}}">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <input id="tipsterHandle" name="tipster" type="hidden">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input name="fullname" type="text" class="form-control" value="{{$lead->fullname}}" placeholder="Enter ...">
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
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" type="text" class="form-control" value="{{$lead->phone}}" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control" value="{{$lead->email}}" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea name="notes" class="form-control" placeholder="URGENT - PLEASE CONTACT ASAP" rows="5">{{$lead->notes}}</textarea>
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
                        <h3 class="box-title">Actions</h3>
                    </div>
                    <div class="box-body">
                        <div class="block__action">
                            <label>Update tipster</label>
                            <div class="form-group tipster__update">
                                <select id="tipsterAnchor" name="tipster" class="form-control">
                                    @foreach($tipsters as $tipster)
                                        <option value="{{$tipster->id}}" @if($tipster->id == $lead->tipster_id) selected @endif>{{$tipster->fullname}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary pull-right" title="Update"><i class="fa fa-wrench"></i></button>
                            </div>
                        </div>
                        <div class="block__action">
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
                        <div class="block__action">
                            <form id="statusGroup" action="{{route('leads.ajaxStatus')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="lead" value="{{$lead->id}}">
                                <div class="form-group">
                                    <label>Change status lead:</label>
                                    <select name="status" class="form-control">
                                        @for($i=0; $i < 5; $i++)
                                            <option value="{{$i}}" @if($i == $lead->status) selected @endif>{{\App\Model\Lead::showNameStatus($i)}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label id="statusAlert" class="label label-success"></label>
                                </div>
                                <div class="form-group">
                                    <button type="button" id="statusChange" class="pull-right btn btn-primary">Change</button>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                            {{--<div id="pointArea"></div>--}}
                            <p>Point for tipster</p>
                            <div id="updatePoint" class="form-inline-simple">
                                <input class="form-control" name="point" type="number" placeholder="0">
                                <button class="btn btn-primary" type="button" title="Plus Point"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="block__action">
                            <p><a id="clickHistory" class="pull-left">View status history</a></p>
                            @if(\App\Model\LeadProcess::getStatusByLead($lead->id))
                                <ul id="showHistory" class="list-unstyled history-statuses">
                                    @foreach(\App\Model\LeadProcess::getStatusByLead($lead->id) as $status)
                                        <li class="{{\App\Model\Lead::showColorStatus($status->status_id)}}">
                                            <span class="history__time">{{\Carbon\Carbon::parse($status->created_at)->addHours(7)->format('d-M-Y H:i')}}</span>
                                            <span class="history__info">{{\App\Model\Lead::showNameStatus($status->status_id)}}</span>
                                        </li>
                                    @endforeach
                                    <li class="label-new">
                                        <span class="history__time">{{\Carbon\Carbon::parse($lead->created_at)->addHours(7)->format('d-M-Y H:i')}}</span>
                                        <span class="history__info">New</span>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col -->

        </div>
    @endif
@endsection