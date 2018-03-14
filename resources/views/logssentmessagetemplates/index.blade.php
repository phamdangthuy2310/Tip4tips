<?php use App\Common\Common;?>
@extends('layouts.master')
@section('title', 'List of logs sent message templates')
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
          'autoWidth'   : true,
          'order': []
        })
      })
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('logssentmessagetemplates') }}
@stop
@section('content')
    <div class="box box-list">
        <div class="box-header clearfix">
            <h3 class="box-title">@yield('title')</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <div class="table-responsive">
                <table id="viewList" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Message_id</th>
                        <th>Subject</th>
                        <th>Content</th>
                        <th>Date</th>
                        {{--<th>Actions</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{$log->senderName}}</td>
                            <td>{{$log->receiverName}}</td>
                            <td>{{$log->message_id}}</td>
                            <td>{{$log->subject}}</td>
                            <td width="400px">{{$log->content}}</td>
                            <td width="90px">{{Common::dateFormat($log->created_at)}}</td>
                            {{--<td class="actions text-center">--}}
                                {{--<form action="{{route('activities.destroy', $log->id)}}" method="post">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<input name="_method" type="hidden" value="DELETE">--}}
                                    {{--<button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>--}}
                                {{--</form>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Message_id</th>
                        <th>Subject</th>
                        <th>Content</th>
                        <th>Date</th>
                        {{--<th>Actions</th>--}}
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection