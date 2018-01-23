@extends('layouts.master')
@section('title', 'List of Products')

@section('content')
    <div class="box box-list">
        <div class="box-header clearfix">
            <h3 class="box-title">List of Products</h3>
            @if($createAction == true)<a href="{{action('ProductsController@create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Product</a>@endif
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <div class="table-responsive">
                <table id="view-managers" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i= 0; ?>
                    @foreach($products as $product)
                        <?php $i++ ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td>{{$product->name}}</td>
                            <td style="width: 300px;">{{{ strip_tags(str_limit($product->description, 110)) }}}</td>
                            <td>{{$product->category}}</td>
                            <td>Thumbnail</td>
                            <td class="actions text-center" style="width: 100px">
                                <a href="{{action('ProductsController@show', $product->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                                @if($editAction == true)<a href="{{action('ProductsController@edit', $product->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>@endif
                                @if($deleteAction == true)<form action="{{action('ProductsController@destroy', $product->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>@endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection