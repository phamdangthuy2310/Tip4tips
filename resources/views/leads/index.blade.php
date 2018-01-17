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
            <table id="view-managers" class="table table-hover table-striped">
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
                    <td>{{$i}}</td>
                    <td>{{$lead->fullname}}</td>
                    <td>{{ $lead->need }}</td>
                    <td>{{ \App\User::getUserByID( $lead->tipster_id)->fullname }}</td>
                    <td>{{ \Carbon\Carbon::parse($lead->created_at)->format('d F Y') }}</td>
                    <td><span class="label-status {{\App\Model\Lead::showColorStatus($lead->status)}}">{{ \App\Model\Lead::showNameStatus($lead->status) }}</span></td>
                    <td class="actions">
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
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection