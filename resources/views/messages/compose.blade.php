@extends('layouts.master')
@section('title', 'Compose New Message')
@section('styles')
    <!-- Bootstrap WYSIHTML5 -->
    <link href="{{ asset('css/admin/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/select2.min.css') }}" rel="stylesheet" type="text/css">
@stop
@section('javascript')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('js/admin/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('js/admin/select2.full.min.js') }}"></script>
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
        $('.select2').select2();
      });
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('messages.create') }}
@stop
@section('content')
    <div class="row">
        @include('messages.partials.column-left-mail')
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
                <form method="post" action="{{route('messages.store')}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('receivers') ? ' has-error' : '' }}">
                            <select name="receivers[]" class="mdb-select form-control select2" multiple style="width: 100%;" required autofocus>
                                <option value="" selected disabled>To:</option>
                                @foreach($receivers as $receiver)
                                    <option value="{{$receiver->id}}">{{$receiver->username}} - {{$receiver->fullname}}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('receivers'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('receivers') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <input name="title" value="{{old('title')}}" class="form-control" placeholder="Subject:" required autofocus>
                            @if ($errors->has('receivers'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <textarea name="content" id="compose-textarea" class="form-control" style="height: 300px" required autofocus>
                            </textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                            @endif
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<div class="btn btn-default btn-file">--}}
                                {{--<i class="fa fa-paperclip"></i> Attachment--}}
                                {{--<input type="file" name="attachment">--}}
                            {{--</div>--}}
                            {{--<p class="help-block">Max. 32MB</p>--}}
                        {{--</div>--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            {{--<button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>--}}
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                        </div>
                        <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection