@extends('layouts.master')
@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-8">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatar2.png') }}" alt="User profile picture">
                    <p class="text-muted text-center">Avatar</p>
                    <p class="text-muted text-center"><span class="label-status {{\App\Model\Lead::showColorStatus($lead->status)}}">{{\App\Model\Lead::showNameStatus($lead->status)}}</span></p>
                    <hr/>
                    <p><strong>Be Assigned to:</strong><br/>
                        @if(!empty(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id))
                    {{ \App\User::getUserByID(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id)->fullname }} - {{\App\Model\Role::getNameRoleByID(\App\User::getUserByID(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id)->role_id)}}
                    @else
                            Not assign yet.
                        @endif
                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Status history</h3>
                </div>
                <div class="box-body">
                    @if(\App\Model\LeadProcess::getStatusByLead($lead->id))
                    <ul class="list-unstyled history-statuses">
                        <li class="label-new">
                            <span class="history__time">{{\Carbon\Carbon::parse($lead->created_at)->addHours(7)->format('d M, Y H:i')}}</span>
                            <span class="history__info">New</span>
                        </li>
                        @foreach(\App\Model\LeadProcess::getStatusByLead($lead->id) as $status)
                            <li class="{{\App\Model\Lead::showColorStatus($status->status_id)}}">
                                <span class="history__time">{{\Carbon\Carbon::parse($status->created_at)->addHours(7)->format('d M, Y H:i')}}</span>
                                <span class="history__info">{{\App\Model\Lead::showNameStatus($status->status_id)}}</span>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-8 col-md-pull-4">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About {{$lead->fullname}}</h3>
                    <a href="{{route('leads.edit', $lead->id)}}" class="btn btn-xs btn-info pull-right"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-muted">
                                <i class="fa fa-address-book margin-r-5"></i> Fullname:
                                <span class="text-highlight">{{ $lead->fullname }}</span>
                            </p>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-phone margin-r-5"></i> Phone: <br/>
                                <span class="text-highlight">{{$lead->phone}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                            <i class="fa fa-envelope margin-r-5"></i> Email:<br/>
                                <span class="text-highlight">{{$lead->email}}</span>
                            </p>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted"><i class="fa fa-shield margin-r-5"></i> Product: <br/>
                                <span class="text-highlight"> @if(!empty(\App\Model\Product::getProductByID($lead->product_id))){{\App\Model\Product::getProductByID($lead->product_id)->name}}@endif </span></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-map-marker margin-r-5"></i> Region: <br/>
                                <span class="text-highlight">@if(!empty(\App\Model\Region::getNameByID($lead->region_id)))
                                        {{\App\Model\Region::getNameByID($lead->region_id)->name}}
                                    @endif</span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-muted">
                                <i class="fa fa-home margin-r-5"></i> Address:
                                <span class="text-highlight">{{$lead->address}}</span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-calendar margin-r-5"></i> Birthday: <br/>
                                <span class="text-highlight">{{Carbon\Carbon::parse($lead->birthday)->format('d M Y')}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-venus-mars margin-r-5"></i> Gender: <br/>
                                <span class="text-highlight">{{\App\Model\Lead::showGender($lead->gender)}}</span>
                            </p>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection