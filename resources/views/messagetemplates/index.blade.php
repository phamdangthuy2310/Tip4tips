<?php use \App\Model\Role;?>
@extends('layouts.master')
@section('title', 'List of Tipsters')
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
          'order': [],
          'columnDefs': [ { orderable: false, targets: [0]}]
        })
      })
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('tipsters') }}
@stop
@section('content')
    <p>
    <a class="btn btn-primary" href="{{route('messagetemplates.sendmail')}}">Send mail</a>
    <a class="btn btn-primary" href="{{route('messagetemplates.create')}}">Create template</a>
    </p>
    @foreach($templates as $messagetemplate)
    <p>{{$messagetemplate->message_id}} <a class="btn btn-primary" href="{{route('messagetemplates.edit', $messagetemplate)}}">Edit</a></p>
    @endforeach
    <!-- /.box -->

@endsection