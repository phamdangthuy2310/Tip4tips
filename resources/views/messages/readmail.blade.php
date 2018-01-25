@extends('layouts.master')
@section('title', 'Read Email')

@section('content')
    <div class="row">

                @include('inc/column-left-mail')
                <div class="box-body no-padding">

                    <div class="mailbox-read-message">
                    <!-- /.mail-box-messages --></div>
                    <div class="mailbox-read-info">
                        <h3>{{ $message->title }}</h3>
                        <h5>From: {{ \App\User::getUserByID($message->author)->username }}
                            <span class="mailbox-read-time pull-right">{{ \Carbon\Carbon::parse($message->create_at)->format('d F. Y H:i') }}</span></h5>
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
                        <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                    </div>
                    <form class="inline" action="{{action('MessagesController@destroy', $message['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                    </form>
                    <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection