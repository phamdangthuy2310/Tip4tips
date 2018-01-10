@extends('layouts.master')
@section('title', 'All Assignments')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Category Products</h3>
            <a href="{{action('AssignmentsController@create')}}" class="btn btn-md btn-primary pull-right">Add New Assignment</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <table id="view-managers" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Consultant</th>
                    <th>Lead</th>
                    <th>Assigner</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i= 0; ?>
                @foreach($assignments as $assignment)
                    <?php $i++ ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td>{{App\User::getUserByID($assignment->consultant_id)->username}}</td>
                    <td>{{App\Model\Lead::getLeadByID($assignment->lead_id)->fullname}}</td>
                    <td>{{App\User::getUserByID($assignment->create_by)->username}}</td>
                    <td class="actions">
{{--                        <a href="{{action('CategoriesController@show', $category->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>--}}
                        <a href="{{action('AssignmentsController@edit', $assignment->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                        <form action="{{action('AssignmentsController@destroy', $assignment->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
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
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection