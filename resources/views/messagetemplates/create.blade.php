<?php use \App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Create Message Template')
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
        $("#content_vn").wysihtml5();
        $("#content_en").wysihtml5();
        $('.select2').select2();
      });
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('messagetemplates.create') }}
@stop
@section('content')
    @if($createAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
    <div class="row">
        <!-- /.col -->
        <div class="col-md-8">
            <!-- create manager form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <a href="{{route('messagetemplates.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                </div>

                <!-- /.box-header -->
                <form role="form" method="post" action="{{route('messagetemplates.store')}}" enctype = "multipart/form-data">
                    {{ csrf_field() }}
                <div class="box-body">
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Message ID:</label>
                                <input value="{{old('message_id')}}" name="message_id" type="text" placeholder="Ex: thank_you_letter" class="form-control" required autofocus>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu1">Vietname language</a></li>
                        <li><a data-toggle="tab" href="#menu2">English language</a></li>
                    </ul>

                    <div class="tab-content" style="padding-top: 20px">
                        <div id="menu1" class="tab-pane fade active in">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input value="{{old('subject_vn')}}" name="subject_vn" type="text" placeholder="Ex: Thư cảm ơn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="content_vn" id="content_vn" class="form-control" style="height: 300px"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input value="{{old('subject_en')}}" name="subject_en" type="text" placeholder="Ex: Thank you letter" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Content</label>
                                    <textarea name="content_en" id="content_en" class="form-control" style="height: 300px"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="{{route('messagetemplates.index')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </form>
            </div>

            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Variable</h3>
                </div>
                <div class="box-body box-profile">
                    <form>
                        <div class="form-group">
                            <label>Variable 1:</label>
                            <input type="text" name="message_name_variable_1" class="form-control" readonly value="[tipster.name]">
                            <label><small>Display name of tipster.</small></label>
                        </div>
                        <div class="form-group">
                            <label>Variable 2:</label>
                            <input type="text" name="message_name_variable_2" class="form-control" readonly value="[lead.name]">
                            <label><small>Display name of lead.</small></label>
                        </div>
                        <div class="form-group">
                            <label>Variable 3:</label>
                            <input type="text" name="message_name_variable_3" class="form-control" readonly value="[product.name]">
                            <label><small>Display name of product.</small></label>
                        </div>
                        <div class="form-group">
                            <label>Variable 4:</label>
                            <input type="text" name="message_name_variable_4" class="form-control" readonly value="[points.new]">
                            <label><small>Display points are added to tipster.</small></label>
                        </div>
                        <div class="form-group">
                            <label>Variable 5:</label>
                            <input type="text" name="message_name_variable_5" class="form-control" readonly value="[points.current]">
                            <label><small>Display current points of tipster.</small></label>
                        </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
    </div>
@endif
@endsection