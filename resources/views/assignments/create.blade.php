@extends('layouts.master')
@section('title', 'Add new gift')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Create a new assignment</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                @endif
                <!-- /.box-header -->
                <form role="form" method="post" action="{{url('assignments')}}">
                    {{ csrf_field() }}

                        <div class="box-body">
                            <div class="form-group">
                                <label>Please pick a Lead to assign:</label>
                                <select name="lead" class="form-control">
                                    @foreach($leads as $lead)
                                        <option value="{{$lead->id}}">{{$lead->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Assign to Consultant</label>
                                <select name="consultant" class="form-control">
                                    @foreach($consultants as $consultant)
                                    <option value="{{$consultant->id}}">{{$consultant->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Assign</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection