<?php
use App\Common\Utils;
use App\Common\Common;
?>
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
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('leads.edit') }}
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
                        <h3 class="box-title">@yield('title')</h3>
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
                                            <option value="" disabled selected>Please pick a region</option>
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
                                            <option value="" disabled selected>Please pick a product</option>
                                            @foreach($products as $product)
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
                        {{--Block update tipster--}}
                        <div class="block__action">
                            <h5>Tipster reference</h5>
                            <form method="get" action="{{route('leads.updateTipster')}}">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$lead->id}}" name="lead">
                                <div class="form-inline-simple">
                                    <select id="tipsterAnchor" name="tipster" class="form-control">
                                        <option value="" disabled selected>Please pick a tipster</option>
                                        @foreach($tipsters as $tipster)
                                            <option value="{{$tipster->id}}" @if($tipster->id == $lead->tipster_id) selected @endif>{{$tipster->fullname}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary pull-right" title="Update">Update</button>
                                </div>
                            </form>
                        </div>{{--/Block update tipster--}}
                        {{--Block assign--}}
                        <div class="block__action">
                            <h5>Assign to Consultant</h5>
                            <form role="form" method="post" action="{{url('assignments')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="lead" value="{{$lead->id}}">
                                <div class="form-inline-simple">
                                    <select name="consultant" class="form-control">
                                        <option value="" disabled selected>Please pick a consultant</option>
                                        @foreach($consultants as $consultant)
                                            <option value="{{$consultant->id}}"
                                                    @if(!empty(\App\Model\Assignment::getConsultantByLead($lead->id)) && \App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id == $consultant->id) selected @endif>
                                                {{$consultant->fullname}} - {{\App\Model\Role::getInfoRoleByID($consultant->role_id)->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary pull-right">Assign</button>
                                </div>
                            </form>
                        </div>{{--/Block assign--}}
                        {{--Block update status--}}
                        <div class="block__action">
                            <h5>Lead status:</h5>
                            <form method="get" action="{{route('leads.ajaxStatus')}}" id="statusGroup">
                                {{ csrf_field() }}
                                @include('layouts.partials._input_history_user',
                                        ['affectedValue' => Utils::$LOG_AFFECTED_OBJECT_LEAD ,
                                        'actionValue' => Utils::$LOG_ACTION_UPDATE,
                                        'descriptionValue' => 'Update status lead : '.$lead->fullname])
                                <label id="statusAlert" class="label"></label>
                                <input type="hidden" name="lead" value="{{$lead->id}}">
                                <div class="form-inline-simple">
                                    <select name="status" class="form-control">
                                        <option value="" disabled selected>Please pick a status</option>
                                        @for($i=0; $i < 5; $i++)
                                            <option value="{{$i}}" @if($i == $lead->status) selected @endif>{{Common::showNameStatus($i)}}</option>
                                        @endfor
                                    </select>
                                    <button type="button" class="pull-right btn btn-primary" id="statusChange">Update</button>
                                </div>
                            </form>
                        </div>{{--/Block update status--}}

                        {{--Block plus point--}}
                        {{--@if($lead->status == Utils::$lead_process_status_win)--}}
                            <div id="plusPoint" class="block__action @if($lead->status != Utils::$lead_process_status_win) hidden @endif">
                                <h5>Point for tipster</h5>
                                <div id="updatePoint">
                                    <form id="updatePointForm" action="{{route('tipsters.updatePointAjax')}}">
                                        {{ csrf_field() }}
                                        @include('layouts.partials._input_history_user',['nameObjectValue' => $lead->fullname, 'idUpdateValue' => $lead->tipster_id])
                                        <label id="pointAlert" class="label"></label>
                                        <input type="hidden" name="tipster" value="{{$lead->tipster_id}}">
                                        <input type="hidden" name="lead" value="{{$lead->id}}">
                                        <div class="form-inline-simple">
                                            @if($plussed == true )
                                            <input class="form-control" name="point" type="number" value="{{$oldPoint}}" readonly>
                                            <button id="editPointButton" class="btn btn-primary" type="button">Edit</button>
                                            @else
                                                <input class="form-control" name="point" type="number" value="0">
                                                <button id="plusPointButton" class="btn btn-primary" type="button">Plus</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        {{--@endif--}}
                        {{--/Block plus point--}}

                        {{--Block status history--}}
                        <div class="block__action">
                            <h5>Status history</h5>
                            @if(\App\Model\LeadProcess::getStatusByLead($lead->id))
                                <ul class="list-unstyled history-statuses" id="contentHistory">
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
                        </div>{{--Block status history--}}
                    </div>
                </div>

            </div>
            <!-- /.col -->

        </div>
    @endif
@endsection