<?php use App\Common\Common;?>
@extends('layouts.master')
@section('title', 'List of Leads')

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
    {{ Breadcrumbs::render('leads') }}
@stop

@section('content')
    <div class="box box-list">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            @if($createAction == true)<a href="{{route('leads.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Lead</a>@endif
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="viewList" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Lead</th>
                        <th>Product</th>
                        <th>Tipster</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i= 0; ?>
                    @foreach($leads as $lead)
                        <?php $i++ ?>
                        <tr>
                            <td width="40" align="center">{{$i}}</td>
                            <td>{{$lead->fullname}}</td>
                            <td>{{ $lead->product }}</td>
                            <td>{{ $lead->tipster }}</td>
                            <td>{{ Common::dateFormat($lead->created_at, 'd F Y')}}</td>
                            <td><span class="label-status {{Common::showColorStatus($lead->status)}}">{{ Common::showNameStatus($lead->status) }}</span></td>
                            <td class="actions text-center" style="width: 100px">
                                <a href="{{route('leads.show', $lead->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                                @if($editAction == true)<a href="{{route('leads.edit', $lead->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>@endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Lead</th>
                        <th>Product</th>
                        <th>Tipster</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection