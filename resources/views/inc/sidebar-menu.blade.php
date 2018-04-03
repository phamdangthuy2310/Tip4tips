<?php
use App\Common\Common;
use App\Common\Utils;
$auth = Auth::user();
$authInfo = Common::userInfo($auth->id);
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img @if($auth->avatar) src="{{asset(Utils::$PATH__IMAGE)}}/{{$auth->avatar}}" @else src="{{asset(Utils::$PATH__DEFAULT__AVATAR)}}" @endif class="img-circle" alt="{{$auth->fullname}} Avatar">
            </div>
            <div class="pull-left info">
                <p>@if($auth->fullname) {{ $auth->fullname }} @else {{ $auth->username }} @endif</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-home"></i><span>HOME</span>
                </a>
            </li>
            <li>
                <a href="{{route('leads.index')}}"><i class="fa fa-street-view"></i><span>Leads</span></a>
            </li>
            <li>
                <a href="{{route('tipsters.index')}}"><i class="fa fa-eye"></i><span>Tipsters</span></a>
            </li>
            {{--Manager--}}
            <li class="header">ADMIN</li>

            <li>
                <a href='{{route('users.index')}}'><i class="fa fa-users"></i><span>Users</span></a>
            </li>
            {{--Product--}}
            <li>
                <a href="{{route('products.index')}}"><i class="fa fa-shield"></i><span>Products</span>                </a>
            </li>
            <li>
                <a href="{{route('gifts.index')}}"><i class="fa fa-gift"></i><span>Gifts</span></a>
            </li>
            @if($authInfo->roleCode == 'admin' || $authInfo->roleCode == 'sale')
            <li>
                <a href="{{route('regions.index')}}"><i class="fa fa-globe"></i><span>Regions</span></a>
            </li>
            @endif
            <li>
                <a href="{{route('messages.index')}}">
                    <i class="fa fa-envelope"></i><span>Messages</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green">{{Common::getAmountNewMessage()}}</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('activities.index')}}">
                    <i class="fa fa-file-text"></i><span>Activity</span>
                </a>
            </li>
            <li>
                <a href="{{route('messagetemplates.index')}}">
                    <i class="fa fa-newspaper-o"></i><span>Message Templates</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>