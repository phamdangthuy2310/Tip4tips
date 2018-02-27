<?php use App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'List of Products')
@section('javascript')
    <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(function () {
        $('#viewList').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      })
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('products') }}
@stop
@section('content')
    <div class="box box-list">
        <div class="box-header clearfix">
            <h3 class="box-title">@yield('title')</h3>
            @if($createAction == true)<a href="{{route('products.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Product</a>@endif
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <div class="table-responsive">
                <table id="viewList" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Thumbnail</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i= 0; ?>
                    @foreach($products as $product)
                        <?php $i++ ?>
                        <tr>
                            <td width="80px"><?php echo $i?></td>
                            <td width="100px">
                                <span class="thumbnail">
                                    @if(!empty($product->thumbnail))
                                        <img src="{{asset(Utils::$PATH__IMAGE)}}/{{$product->thumbnail}}">
                                    @else
                                        <img src="{{asset(Utils::$PATH__IMAGE)}}/no_image_available.jpg" alt="">
                                    @endif
                                </span>
                            </td>
                            <td>{{$product->name}}</td>
                            <td style="width: 300px;">{{{ strip_tags(str_limit($product->description, 110)) }}}</td>
                            <td>{{$product->category}}</td>

                            <td class="actions text-center" style="width: 100px">
                                <a href="{{route('products.show', $product->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                                @if($editAction == true)<a href="{{route('products.edit', $product->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>@endif
                                @if($deleteAction == true)<form action="{{route('products.destroy', $product->id)}}" method="post">
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
                        <th>Thumbnail</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Category</th>
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