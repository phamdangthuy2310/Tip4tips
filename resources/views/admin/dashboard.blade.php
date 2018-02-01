<?php use App\Common\Common; ?>
@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
    <!-- Main row -->
    <div class="row">
        <div class="col-md-6">
            <!-- LEADS LIST -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Recent Leads</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <ul class="ul__leads">
                            @foreach($recentleads as $recentlead)
                            <li class="row">
                                <div class="col-sm-8">
                                    <a href="{{route('leads.edit', $recentlead->id)}}"><span class="name">{{$recentlead->fullname}}</span>
                                    <span class="info">{{$recentlead->email}} - {{$recentlead->phone}}</span></a>
                                </div>
                                <div class="col-sm-4">
                                    <span class="date">{{Common::dateFormat($recentlead->created_at, 'd-M-Y')}}</span>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                        {{--<div class="col-md-8">--}}
                            {{--<div class="chart-responsive">--}}
                                {{--<canvas id="pieChart" height="150"></canvas>--}}
                            {{--</div>--}}
                            {{--<!-- ./chart-responsive -->--}}
                        {{--</div>--}}
                        {{--<!-- /.col -->--}}
                        {{--<div class="col-md-4">--}}
                            {{--<ul class="chart-legend clearfix">--}}
                                {{--<li><i class="fa fa-circle-o text-green"></i> Win</li>--}}
                                {{--<li><i class="fa fa-circle-o text-yellow"></i> Quote</li>--}}
                                {{--<li><i class="fa fa-circle-o text-red"></i> Lost</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="box-footer text-center">
                    <a href="{{route('leads.index')}}" class="uppercase">View All Leads</a>
                </div>
            </div>
            <!-- /.box -->
            <!--/.box -->
        </div>
        <div class="col-sm-6">
            <!-- Tipster LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Most active Tipsters</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list ul__users clearfix">
                        <li>
                            <span class="users-list-avatar"><img src="{{asset('images/user1-128x128.jpg') }}" alt="User Image"></span>
                            <span class="users-list-info">
                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                <span class="users-list-date">Today</span>
                            </span>
                        </li>
                        <li>
                            <span class="users-list-avatar"><img src="{{asset('images/user1-128x128.jpg') }}" alt="User Image"></span>
                            <span class="users-list-info">
                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                <span class="users-list-date">Yesterday</span>
                            </span>
                        </li>
                        <li>
                            <span class="users-list-avatar"><img src="{{asset('images/user1-128x128.jpg') }}" alt="User Image"></span>
                            <span class="users-list-info">
                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                <span class="users-list-date">Yesterday</span>
                            </span>
                        </li>
                        <li>
                            <span class="users-list-avatar"><img src="{{asset('images/user1-128x128.jpg') }}" alt="User Image"></span>
                            <span class="users-list-info">
                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                <span class="users-list-date">Yesterday</span>
                            </span>
                        </li>
                        <li>
                            <span class="users-list-avatar"><img src="{{asset('images/user1-128x128.jpg') }}" alt="User Image"></span>
                            <span class="users-list-info">
                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                <span class="users-list-date">Yesterday</span>
                            </span>
                        </li>

                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{route('tipsters.index')}}" class="uppercase">View All Tipster</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <div class="col-sm-12">
            <!-- CONSULTANT LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Activities</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
    </div>
    <!-- /.row -->
@endsection