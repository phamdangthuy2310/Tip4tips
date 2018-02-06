@extends('layouts.master')
@section('title', 'Create new Assignment')

@section('content')
    @if($createAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
    <div class="row">
        <!-- /.col -->
        <div class="col-md-8 col-md-offset-2">
            <!-- create manager form -->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create new Assignment</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{route('assignments.create')}}">
                    {{ csrf_field() }}

                        <div class="box-body">
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

                            <div class="form-group">
                                <label>Please pick a Lead to assign:</label>
                                <select name="lead" class="form-control">
                                    <option value="" disabled selected>Please pick a lead</option>
                                    @foreach($leads as $lead)
                                        <option value="{{$lead->id}}">{{$lead->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Assign to Consultant</label>
                                <select name="consultant" class="form-control">
                                    <option value="" disabled selected>Please pick a consultant</option>
                                    @foreach($consultants as $consultant)
                                    <option value="{{$consultant->id}}">{{$consultant->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('assignments.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Assign</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>
    @endif

@endsection