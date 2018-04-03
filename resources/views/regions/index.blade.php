@extends('layouts.master')
@section('title', 'List of Regions')
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
    {{ Breadcrumbs::render('regions') }}
@stop
@section('content')
    <div class="box box-list">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{route('regions.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Region</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <div class="table-responsive">
                <table id="viewList" class="table table-bordered table-striped tbsty">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{$region->name}}</td>
                            <td>{{$region->code}}</td>
                            <td class="actions text-center" style="width: 100px">
                                <a href="{{route('regions.edit', $region->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
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