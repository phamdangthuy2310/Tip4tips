@extends('layouts.master')
@section('title', 'Create Region')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('regions.create') }}
@stop
@section('content')
    {{--@if($createAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else--}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{route('regions.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 col-sm-push-3">
                    <form role="form" method="post" action="{{route('regions.store')}}" enctype = "multipart/form-data">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @if (count($errors) > 0)
                                    <strong>Whoops!</strong> There were some problems with your input.
                                @endif
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
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Name</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Enter ..." required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label>Code</label>
                            <input name="code" value="{{ old('code') }}" type="text" class="form-control" placeholder="Enter ..." required>
                            @if ($errors->has('code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-action">
                            <a href="{{route('regions.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Create</button>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->

    </div>
{{--@endif--}}
@endsection