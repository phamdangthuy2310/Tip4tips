@extends('layouts.master')
@section('title', 'List of Product Categories')
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
          'autoWidth'   : true,
          'order': [],
          'columnDefs': [ { orderable: false, targets: [0]}]
        })
      })
    </script>
@stop

@section('content')
    <div class="box box-list">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{ route('giftcategories.create') }}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Category</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <table id="viewList" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Category name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i= 0; ?>
                @foreach($categories as $category)
                    <?php $i++ ?>
                <tr>
                    <td width="40" align="center"><?php echo $i?></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td class="actions text-center" style="width: 80px">
{{--                        <a href="{{action('CategoriesController@show', $category->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>--}}
                        {{--<a href="{{action('CategoriesController@edit', $category->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>--}}
                        <form action="{{action('GiftCategoriesController@destroy', $category->id)}}" method="post">
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
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection