<?php use \App\Common\Utils; ?>
@extends('layouts.master')
@section('title', 'Show send message')
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
    {{ Breadcrumbs::render('messagetemplates.showsendmessage') }}
@stop
@section('content')
    @if($editAction == false)
        <div class="box box-danger">
            <div class="box-body text-center">
                <p>You do not access to this screen. Please contact to admin.</p>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Variable</h3>
                </div>
                <div class="box-body box-profile">
                    <form method="post" action="{{route('messagetemplates.sendmail', $template->id)}}" enctype = "multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Variable 1:</label>
                            <input type="text" name="message_name_variable_1" class="form-control" readonly value="[tipster.name]">
                            <label><small>Display name of tipster.</small></label>
                            <select class="form-control" name="tipster_id" required>
                                <option value="" disabled="disabled" selected>Please select a item</option>
                                @foreach($tipsters as $tipster)
                                    <option value="{{$tipster->id}}">{{$tipster->fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Variable 2:</label>
                            <input type="text" name="message_name_variable_2" class="form-control" readonly value="[lead.name]">
                            <label><small>Display name of lead.</small></label>
                            <select class="form-control" name="lead_id">
                                <option value="" disabled="disabled" selected>Please select a item</option>
                                @foreach($leads as $lead)
                                    <option value="{{$lead->id}}">{{$lead->fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Variable 3:</label>
                            <input type="text" name="message_name_variable_3" class="form-control" readonly value="[product.name]">
                            <label><small>Display name of product.</small></label>
                            <select class="form-control" name="product_id">
                                <option value="" disabled="disabled" selected>Please select a item</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Variable 4:</label>
                            <input type="text" name="message_name_variable_4" class="form-control" readonly value="[points.new]">
                            <label><small>Display points of tipster.</small></label>
                            <input name="points_new" type="number" class="form-control" value="0">
                        </div>
                        <div class="form-group">
                            <label>Variable 5:</label>
                            <input type="text" name="message_name_variable_5" class="form-control" readonly value="[points.current]">
                            <label><small>Display current points of tipster.</small></label>
                            <input name="points_current" type="number" class="form-control" value="0">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Send message</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <!-- create manager form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <span class="group__action pull-right">
                        <a href="{{route('messagetemplates.index')}}" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Back to list</a>
                        <a href="{{route('messagetemplates.edit', $template->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                    </span>

                </div>

                <!-- /.box-header -->
                <form role="form" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
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
                                <input readonly value="{{$template->message_id}}" name="message_id" type="text" placeholder="Ex: thank_you_letter" class="form-control" required autofocus>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu1">Vietname language</a></li>
                        <li><a data-toggle="tab" href="#menu2">English language</a></li>
                    </ul>

                    <div class="tab-content" style="padding-top: 20px">
                        <div id="menu1" class="tab-pane fade active in">
                            <span style="display: block" w3-include-html="@include('messagetemplates.emails.example_vn')</span>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <span style="display: block" w3-include-html="@include('messagetemplates.emails.example_en')</span>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

            </form>
            </div>

            <!-- /.box -->
        </div>

    </div>
@endif
@endsection