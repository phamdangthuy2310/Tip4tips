<?php use App\Common\Common;?>
@extends('layouts.master')
@section('title', 'Sent')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('messages.sent') }}
@stop
@section('content')
    <div class="row">
        @include('messages.partials.column-left-mail')
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Mail">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            {{--<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>--}}
                            {{--<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>--}}
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh" onClick="window.location.reload()"></i></button>
                        <div class="pull-right">
                        {{$messages->links('messages.partials.paging')}}
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td class="mailbox-name">To: <a href="{{route('messages.showsent', $message->id)}}">{{ \App\User::getUserByID($message->receiver)->username }}</a></td>
                                    <td class="mailbox-subject" width="70%"><a href="{{route('messages.showsent', $message->id)}}">
                                            <b>{{$message->title}}</b>
                                            -
                                            {{{ strip_tags(str_limit($message->content, 90)) }}}
                                        </a></td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date" align="right">{!! Common::dateFormatText($message->created_at)!!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" onClick="window.location.reload()"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            {{$messages->links('messages.partials.paging')}}
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection