@extends('layouts.master')
@section('title', 'Create product category')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-8 col-md-offset-2">
            <!-- create manager form -->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Product Category</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{url('productcategories')}}">
                    {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Category name</label>
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('productcategories.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection