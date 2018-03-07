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
    <a class="btn btn-primary" href="{{route('messagetemplates.sendmail')}}">Send mail</a>
    <!-- /.box -->

@endsection