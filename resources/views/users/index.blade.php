@extends('layouts.master')
@section('title', 'List of Users')

@section('content')
    @if($flag ==false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>{{$alert}}</p>
            </div>
        </div>
    @else
    <div class="box box-list">
        <div class="box-header">
            <h3 class="box-title">List of Users</h3>
            <a href="{{ route('users.create') }}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New User</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
                <div class="table-responsive">
                    <table id="view-managers" class="table table-bordered table-striped">
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
                                <td> {{$user->roletype}} - {{$user->role}}</td>
                                <td>@if($user->delete_is == 1)<label class="label label-success">Active</label>@else <label class="label label-danger">Deactive</label> @endif</td>
                                <td class="actions text-center" style="width: 100px">
                                    <a href="{{action('UsersController@show', $user->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                                    <a href="{{action('UsersController@edit', $user->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <form action="{{action('UsersController@destroy', $user->id)}}" method="post">
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
    @endif
@endsection