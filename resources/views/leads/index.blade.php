@extends('layouts.master')
@section('title', 'All Managers')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Leads</h3>
            <a href="leads/create" class="btn btn-md btn-primary pull-right">Add New Lead</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="view-managers" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Need</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i= 0; ?>
                @foreach($leads as $lead)
                    <?php $i++ ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td>{{$lead->fullname}}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->need }}</td>

                    <td>
                        <a href="{{action('LeadsController@show', $lead['id'])}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                        <a href="{{action('LeadsController@edit', $lead['id'])}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                        <form action="{{action('LeadsController@destroy', $lead['id'])}}" method="post">
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
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Need</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection