@extends('layouts.master')
@section('title', 'List of Assignments')
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

@section('content')
    <div class="box box-list">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            @if($createAction == true)<a href="{{route('assignments.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Assignment</a>@endif
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <table id="viewList" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Consultant</th>
                    <th>Lead</th>
                    <th>Assigner</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i= 0; ?>
                @foreach($assignments as $assignment)
                    <?php $i++ ?>
                <tr>
                    <td width="40" align="center"><?php echo $i?></td>
                    <td>{{App\User::getUserByID($assignment->consultant_id)->username}}</td>
                    <td>{{App\Model\Lead::getLeadByID($assignment->lead_id)->fullname}}</td>
                    <td>{{App\User::getUserByID($assignment->create_by)->username}}</td>
                    <td style="width: 150px">{{$assignment->created_at}}</td>
                    <td class="actions">
{{--                        <a href="{{action('CategoriesController@show', $category->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>--}}
                        @if($editAction == true)<a href="{{route('assignments.edit', $assignment->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>@endif
                        @if($deleteAction == true)<form action="{{route('assignments.destroy', $assignment->id)}}" method="post">
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
                    <th>No.</th>
                    <th>Consultant</th>
                    <th>Lead</th>
                    <th>Assignment</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection