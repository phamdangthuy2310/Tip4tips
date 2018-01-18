@extends('layouts.master')
@section('title', 'List of gifts')

@section('content')
    <div class="box box-list">
        <div class="box-header clearfix">
            <h3 class="box-title">List of gifts</h3>
            <a href="{{action('GiftsController@create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Gift</a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <table id="view-managers" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Gift name</th>
                    <th>Point</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i= 0; ?>
                @foreach($gifts as $gift)
                    <?php $i++ ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td>{{$gift->name}}</td>
                        <td>{{$gift->point}}</td>
                        <td>{{$gift->category}}</td>
                        <td class="actions">
                            <a href="{{action('GiftsController@show', $gift->id)}}" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                            <a href="{{action('GiftsController@edit', $gift->id)}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                            <form action="{{action('GiftsController@destroy', $gift->id)}}" method="post">
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
                    <th>Gift name</th>
                    <th>Point</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection