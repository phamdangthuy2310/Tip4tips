<?php use App\Common\Common;?>
@extends('layouts.master')
@section('title', 'List of activities')
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
    {{ Breadcrumbs::render('activities') }}
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
                        <th>User</th>
                        <th>Affected object</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>Create at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logActivities as $logActivity)
                        <tr>
                            <td>{{$logActivity->user_name}}</td>
                            <td>{{$logActivity->affected_object}}</td>
                            <td>{{$logActivity->action}}</td>
                            <td>{{$logActivity->description}}</td>
                            <td>{{Common::dateFormat($logActivity->created_at)}}</td>
                            <td class="actions text-center">
                                @if($deleteAction == true)<form action="{{route('activities.destroy', $logActivity->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>@endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User</th>
                        <th>Affected object</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>Create at</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection