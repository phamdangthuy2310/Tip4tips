@extends('layouts.master')
@section('title', 'List of Users')
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
    {{ Breadcrumbs::render('users') }}
@stop

@section('content')
    <div class="box box-list">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            @if($createAction == true)<a href="{{ route('users.create') }}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New User</a>@endif
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
                <div class="table-responsive">
                    <table id="viewList" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Department</th>
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
                                <td>{{ $user->username }}</td>
                                <td>{{$user->fullname}}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if(!empty($user->role) && !empty($user->roletype))
                                 {{$user->role}}-{{$user->roletype}}
                                    @endif
                                </td>
                                <td>@if($user->delete_is == 0)<label class="label label-success">Active</label>@else <label class="label label-danger">Non active</label> @endif</td>
                                <td class="actions text-center" style="width: 100px">
                                    <a href="{{route('users.show', $user->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                                    @if($editAction == true)<a href="{{route('users.edit', $user->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>@endif
                                    {{--@if($deleteAction == true && $user->delete_is==1)<form action="{{route('users.destroy', $user->id)}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input name="_method" type="hidden" value="DELETE">--}}
                                        {{--<button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>--}}
                                    {{--</form>@endif--}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Department</th>
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

    {{--popup confirm--}}
    <div id="popup-confirm" class="modal popup-confirm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you really want to delete?</p>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                    @if($deleteAction == true)<form class="inline" action="{{route('users.destroy', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Yes</button>
                    </form>@endif
                </div>
            </div>
        </div>
    </div>

@endsection