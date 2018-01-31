@extends('layouts.master')
@section('title', 'Profile')

@section('content')
    <div class="row">

        <div class="col-md-8">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Profile</h3>
                    <span class="group__action pull-right">
                                <a href="{{route('leads.edit', $lead->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        @if($deleteAction == true)<form class="inline" action="{{action('LeadsController@destroy', $lead->id)}}" method="post">
                                {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                                <button title="Delete this user" class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>@endif
                            </span>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="block__profile">
                        <h3 class="profile__name">@if($lead->gender == 0) Mr. @else Mrs/Miss. @endif {{ $lead->fullname }}</h3>

                        @if($lead->phone)<p class="text-muted">
                            <span class="text-label"><i class="fa fa-phone margin-r-5"></i> Phone</span>
                            <span class="text-highlight">{{$lead->phone}}</span>
                        </p>@endif

                        @if($lead->email)<p class="text-muted">
                        <span class="text-label"><i class="fa fa-envelope margin-r-5"></i> Email</span>
                        <span class="text-highlight">{{$lead->email}}</span>
                        </p>@endif
                        <p class="text-muted">
                        <span class="text-label"><i class="fa fa-map-marker margin-r-5"></i> Region</span>
                        <span class="text-highlight">@if(!empty(\App\Model\Region::getNameByID($lead->region_id)))
                        {{\App\Model\Region::getNameByID($lead->region_id)->name}}
                        @endif</span>
                        </p>
                        <p class="text-muted">
                        <span class="text-label"><i class="fa fa-shield margin-r-5"></i> Product</span>
                        <span class="text-highlight"> @if(!empty(\App\Model\Product::getProductByID($lead->product_id))){{\App\Model\Product::getProductByID($lead->product_id)->name}}@endif </span>
                        </p>
                        @if($lead->notes)<p class="text-muted">
                        <span class="text-label"><i class="fa fa-file-text-o margin-r-5"></i> Notes</span>
                        <span class="text-highlight">{{$lead->notes}}</span>
                        </p>@endif
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Advanced information</h3>
                </div>
                <div class="box-body">
                    <div class="block__action">
                        <p>Tipster reference:
                            <span class="text-highlight">{{\App\User::getUserByID($lead->tipster_id)->fullname}}</span></p>
                    </div>
                    <div class="block__action">
                        <p>Be Assigned to:<br/>
                            @if(!empty(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id))
                                <span class="text-highlight">{{ \App\User::getUserByID(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id)->fullname }} - {{\App\Model\Role::getNameRoleByID(\App\User::getUserByID(\App\Model\Assignment::getConsultantByLead($lead->id)->consultant_id)->role_id)}}</span>
                            @else
                                Not assign yet.
                            @endif
                        </p>
                    </div>
                    <div class="block__action">
                        <p>Status history</p>
                        @if(\App\Model\LeadProcess::getStatusByLead($lead->id))
                            <ul class="list-unstyled history-statuses">
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
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection