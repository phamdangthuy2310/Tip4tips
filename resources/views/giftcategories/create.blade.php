@extends('layouts.master')
@section('title', 'Create Gift Category')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-8 col-md-offset-2">
            <!-- create manager form -->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{route('giftcategories.create')}}">
                    {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Category name</label>
                                <input name="name" type="text" class="form-control">
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
                    <a href="{{route('giftcategories.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection