@extends('layouts.master')
@section('title', 'Add new manager')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-warning">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/avatar2.png') }}" alt="User profile picture">

                    <h3 class="profile-username text-center">Thuy Pham</h3>

                    <p class="text-muted text-center">Admin</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- create manager form -->
            <form role="form" method="post" action="<?=Request::root()?>/users/create">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Create a new manager</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    {{ csrf_field() }}
                        <!-- text input -->
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Password confirm</label>
                            <input name="passwordconfirm" type="password" class="form-control" placeholder="Enter ...">
                        </div>

                        <div class="form-group">
                            <label>Full name</label>
                            <input name="fullname" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <select name="region" class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>User type</label>
                            <select name="role_id" class="form-control">
                                <option value="1">Community</option>
                                <option value="2">Sales</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <select name="role_id" class="form-control">
                                <option value="1">Community</option>
                                <option value="2">Sales</option>
                            </select>
                        </div>



                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
            </div>
            </form>
            <!-- /.box -->
        </div>
    </div>

@endsection