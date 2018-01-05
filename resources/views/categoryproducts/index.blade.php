@extends('layouts.master')
@section('title', 'All Managers')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Category Products</h3>
            <a href="{{action('CategoryProductsController@create')}}" class="btn btn-md btn-primary pull-right">Add New Category</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="view-managers" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Category name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i= 0; ?>
                @foreach($categories as $category)
                    <?php $i++ ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{action('CategoryProductsController@show', $category->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                        <a href="{{action('CategoryProductsController@edit', $category->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                        <form action="{{action('CategoryProductsController@destroy', $category->id)}}" method="post">
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
                    <th>Category name</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection