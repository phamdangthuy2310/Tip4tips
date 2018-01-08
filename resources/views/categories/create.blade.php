@extends('layouts.master')
@section('title', 'Add new category product')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- create manager form -->

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Create a new category product</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" method="post" action="{{url('categories')}}">
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
                        <div class="box-body">
                            <div class="form-group">
                                <label>Belong to</label>
                                <select name="belong" class="form-control">
                                    <option value="0">Product</option>
                                    <option value="1">Gift</option>
                                </select>
                            </div>
                        </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection