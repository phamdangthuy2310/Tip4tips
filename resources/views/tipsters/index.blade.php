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
          'order': []
        })
      })
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('tipsters') }}
@stop
@section('content')
    <div class="box box-list">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            @if($createAction == true)<a href="{{route('tipsters.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Tipster</a>@endif
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="viewList" class="table table-bordered table-striped tbsty">
                    <thead>
                    <tr>
                        <th width="30">No.</th>
                        <th>Tipster</th>
                        <th width="50">Points</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i= 0; ?>
                    @foreach($users as $user)
                        <?php $i++ ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td>{{ $user->username }}<span class="label-small">{{$user->fullname}}</span></td>
                            <td>{{$user->point}}</td>
                            <td>{{ $user->email }}</td>
                            <td> {{--{{\App\Model\RoleType::getNameByID($user->roletype)}} ---}} {{\App\Model\Role::getNameRoleByID($user->role_id)}}</td>
                            <td>@if($user->delete_is == 1)<label class="label label-success">Active</label>@else <label class="label label-danger">Deactive</label> @endif</td>
                            <td class="actions text-center" style="width: 100px">
                                <a href="{{route('tipsters.show', $user->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                                @if($editAction == true)<a href="{{route('tipsters.edit', $user->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>@endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Tipster</th>
                        <th>Points</th>
                        <th>Email</th>
                        <th>Level</th>
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