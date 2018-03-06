<?php
use App\Common\Common;
use App\Common\Utils;
?>
@extends('layouts.master')
@section('title', 'Tipster detail')
@section('javascript')
    <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(function () {
        $('#viewList').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      })
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('tipsters.show') }}
@stop
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-8">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="upload__area-image">
                        <span><img id="imgHandle" src="{{asset(Utils::$PATH__IMAGE)}}/{{$user->avatar}}"></span>
                    </div>
                    <p class="text-muted text-center" title="Username">
                        <strong><i class="fa fa-user margin-r-5"></i> {{$user->username}}</strong>
                    </p>
                    <p class="text-muted text-center tipster__point-total" title="Point total">
                        <span>{{$user->point}}</span><br/>
                        points
                    </p>

                    <hr>

                    <p class="text-center">
                        @if($user->delete_is == 0)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Non active</span>
                        @endif
                    </p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-8 col-md-pull-4">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('tipsters.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                        @if($editAction == true)
                            <a href="{{route('tipsters.edit', $user->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        @endif
                        @if($deleteAction == true)
                            <a data-toggle="modal" data-target="#popup-confirm" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        @endif


                    </span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-globe margin-r-5"></i> Preferred language
                                <span class="text-highlight">{{ Common::showTextLanguage($user->preferred_lang) }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-address-book margin-r-5"></i> Fullname
                                <span class="text-highlight">{{ $user->fullname }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-building margin-r-5"></i> Level
                                <span class="text-highlight">{{$role->name}} - {{$roletype->name}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row box-line">
                        <div class="col-sm-6">

                            <p class="text-muted">
                                <i class="fa fa-calendar margin-r-5"></i> Birthday
                                <span class="text-highlight">{{$user->birthday}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-venus-mars margin-r-5"></i> Gender
                                <span class="text-highlight">{{ $user::showGender($user->gender) }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-envelope margin-r-5"></i> Email
                                <span class="text-highlight">{{$user->email}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-phone margin-r-5"></i> Phone
                                <span class="text-highlight">{{$user->phone}}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row box-line">
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-home margin-r-5"></i> Address
                                <span class="text-highlight">{{$user->address}}</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">
                                <i class="fa fa-map-marker margin-r-5"></i> Location
                                <span class="text-highlight">{{ \App\Model\Region::getNameByID($user->region_id)->name }}</span>
                            </p>
                        </div>
                    </div>
                    {{--<div class="row box-line">--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<p>--}}
                                {{--<i class="fa fa-file-text-o margin-r-5"></i> Notes--}}
                                {{--<span class="text-highlight"></span>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Points History</h3>
                </div>
                <div class="box-body">
                    <table id="viewList" class="table table-striped lead__ref">
                        <thead>
                        <tr>
                            <th>Lead</th>
                            <th>Point of Lead</th>
                            <th>Status</th>
                            <th>Created date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($leads))
                            @foreach($leads as $lead)
                                <tr>
                                    <td class="lead__ref-info">
                                        <a href="{{route('leads.show', $lead->id)}}">
                                            {{$lead->fullname}}
                                            <span>{{$lead->product}}</span>
                                        </a>
                                    </td>
                                    <td class="lead__ref-point" width="110">{{$lead->point}}</td>
                                    <td class="lead__ref-status">
                                        <span class="label-status {{Common::showColorStatus($lead->status)}}">{{$lead->statusLead}}</span>
                                    </td>
                                    <td class="lead__ref-date">{{$lead->create}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Do not have any tipster.</td>
                            </tr>
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Lead</th>
                            <th>Point of Lead</th>
                            <th>Status</th>
                            <th>Created date</th>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    {{--popup confirm--}}
    <div id="popup-confirm" class="modal popup-confirm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you really want to delete tipster "{{$user->fullname}}" ?</p>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                    @if($deleteAction == true)<form class="inline" action="{{action('TipstersController@destroy', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-sm btn-danger" type="submit">Yes</button>
                    </form>@endif
                </div>
            </div>
        </div>
    </div>
@endsection