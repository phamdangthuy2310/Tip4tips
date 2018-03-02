<?php use App\Common\Common;?>
@extends('layouts.master')
@section('title', 'Read Email')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('messages.show') }}
@stop
@section('content')
    <div class="row">
                @include('messages.partials.column-left-mail')
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-message">
                    <!-- /.mail-box-messages --></div>
                    <div class="mailbox-read-info">
                        <h3>{{ $message->title }}</h3>
                        <h5>From: {{ $message->authorMess }}
                            <span class="mailbox-read-time pull-right">{!! Common::dateFormatText($message->created_at)!!}</span></h5>
                    </div>
                    <!-- /.mailbox-read-info -->

                    <div class="mailbox-read-message">
                        {!!html_entity_decode($message->content)!!}
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>

                <div class="box-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                        {{--<button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>--}}
                    </div>
                    <form class="inline" action="{{route('messages.deletetrash', $message->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                    </form>
                    {{--<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>--}}
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection