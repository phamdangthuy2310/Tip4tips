<?php
use App\Common\Common;
use App\Common\Utils;
use App\Model\Role;
use \Carbon\Carbon;
use \App\User;
$auth = Auth::user();
$infoUser = User::getUserByID($auth->id);
$newmessages = Common::getAllNewMessage();
?>
<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>T4T</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>Tip4Tips</span>
    </a>

    <!-- Header Navbar -->
    <!-- Right Side Of Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{Common::getAmountNewMessage()}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{Common::getAmountNewMessage()}} new messages</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                @if(!empty($newmessages))
                                    @foreach($newmessages as $newmessage)
                                        <li><!-- start message -->
                                    <a href="{{route('messages.show', $newmessage->id)}}">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="@if($newmessage->senderAvatar){{asset(Utils::$PATH__IMAGE)}}/{{$newmessage->senderAvatar}}@else{{ asset(Utils::$PATH__DEFAULT__AVATAR) }}@endif" class="img-circle" alt="{{$newmessage->sender}}">
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            {{$newmessage->senderUsername}}
                                            <small><i class="fa fa-clock-o"></i> {!! Common::dateFormatText($newmessage->created_at)!!}</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>{{{ strip_tags(str_limit($newmessage->content, 30)) }}}</p>
                                    </a>
                                </li>
                                    @endforeach
                                <!-- end message -->
                                @else
                                    <li>No messages.</li>
                                @endif
                            </ul>
                            <!-- /.menu -->
                        </li>
                        <li class="footer"><a href="{{route('messages.index')}}">See All Messages</a></li>
                    </ul>
                </li>
                <!-- /.messages-menu -->

                <!-- Notifications Menu -->
                {{--<li class="dropdown notifications-menu">--}}
                    {{--<!-- Menu toggle button -->--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-bell-o"></i>--}}
                        {{--<span class="label label-warning">10</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">You have 10 notifications</li>--}}
                        {{--<li>--}}
                            {{--<!-- Inner Menu: contains the notifications -->--}}
                            {{--<ul class="menu">--}}
                                {{--<li><!-- start notification -->--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<!-- end notification -->--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="footer"><a href="#">View all</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="@if($auth->avatar){{ asset(Utils::$PATH__IMAGE) }}/{{$auth->avatar}}@else{{ asset(Utils::$PATH__DEFAULT__AVATAR) }}@endif" class="user-image" alt="{{$auth->fullname}}">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">@if($auth->fullname) {{ $auth->fullname }} @else {{ $auth->username }} @endif</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="@if($auth->avatar){{ asset(Utils::$PATH__IMAGE) }}/{{$auth->avatar}}@else{{asset(Utils::$PATH__DEFAULT__AVATAR)}}@endif" class="img-circle" alt="User Image">

                            <p>
                                @if($auth->fullname) {{ $auth->fullname }} @else {{ $auth->username }} @endif - {{Role::getNameRoleByID($auth->role_id)}}
                                <small>Member since {{ Carbon::parse($auth->create_at)->format('F. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="@if($infoUser->roletypeCode == 'tipster'){{route('tipsters.show', $auth->id)}}@else{{route('users.show', $auth->id)}} @endif" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                    @endguest
            </ul>
        </div>
    </nav>
</header>