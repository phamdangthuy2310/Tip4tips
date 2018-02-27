@extends('layouts.master')
@section('title', 'Create status process')

@section('content')
    <div class="box box-primary col-sm-5">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('title')</h3>
        </div>
        <div class="box-body">
            <form id="statusGroup" method="post" action="{{route('leadsprocesses.store')}}">
                {{ csrf_field() }}
                <input type="hidden" name="lead" value="1">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="" disabled selected>Please pick a status</option>
                        @for($i=1; $i < 5; $i++)
                            <option value="{{$i}}">{{\App\Model\Lead::showNameStatus($i)}}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label id="statusAlert" class="label text-success"></label>
                </div>
                <div class="form-group">
                    <button type="submit" class="pull-right btn btn-primary">Change</button>
                </div>
            </form>
        </div>

    </div>
@endsection