@extends('layouts.master')
@section('title', 'Edit Assignment')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit an Assignment</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- /.box-header -->
                <form role="form" method="post" action="{{action('AssignmentsController@update', $id)}}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Please pick a Lead to assign:</label>
                            <select name="lead" class="form-control">
                                @foreach($leads as $lead)
                                    <option value="{{$lead->id}}" @if($lead->id == $assignment->lead_id) selected @endif>{{$lead->fullname}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Assign to Consultant</label>
                            <select name="consultant" class="form-control">
                                @foreach($consultants as $consultant)
                                    <option value="{{$consultant->id}}" @if($consultant->id == $assignment->consultant_id) selected @endif>{{$consultant->fullname}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('assignments.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection