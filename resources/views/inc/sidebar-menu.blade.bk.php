<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/avatar2.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>@if(Auth::user()->fullname) {{ Auth::user()->fullname }} @else {{ Auth::user()->username }} @endif</p>
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
            <li class="treeview">
                <a href="#"><i class="fa fa-street-view"></i><span>Leads</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('leads.index')}}">List of Leads</a></li>
                    <li><a href="{{route('leads.create')}}">Add Leads</a></li>
                </ul>
            </li>
            {{--Tipster--}}
            <li class="treeview">
                <a href="#"><i class="fa fa-eye"></i><span>Tipsters</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href='{{route('tipsters.index')}}'>List of Tipsters</a></li>
                    <li><a href='{{route('tipsters.create')}}'>Add Tipsters</a></li>
                </ul>
            </li>
            {{--Manager--}}
            <li class="header">MANAGER</li>

            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i><span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href='{{route('users.index')}}'>List of Users</a></li>
                    <li><a href='{{route('users.create')}}'>Add Users</a></li>
                </ul>
            </li>
            {{--Product--}}
            <li class="treeview">
                <a href="#"><i class="fa fa-shield"></i><span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('products.index')}}">{{ trans('menu.product') }}</a></li>
                    <li><a href="{{route('products.create')}}">Add Products</a></li>
                    <li><a href="{{ route('productcategories.index') }}">List of Product Categories</a></li>
                    <li><a href="{{ route('productcategories.create') }}">Add Product Categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gift"></i><span>Gifts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('gifts.index')}}">List of Gifts</a></li>
                    <li><a href="{{route('gifts.create')}}">Add Gifts</a></li>
                    <li><a href="{{ route('giftcategories.index') }}">List of Gift Categories</a></li>
                    <li><a href="{{route('giftcategories.create')}}">Add Gift Categories</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('messages.index')}}">
                    <i class="fa fa-envelope"></i><span>Messages</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green">{{\App\Model\Message::countYetNotRead()}}</small>
                    </span>
                </a>
            </li>



            {{--<li class="treeview">--}}
                {{--<a href="#"><i class="fa fa-retweet"></i> <span>Assignment Manager</span>--}}
                    {{--<span class="pull-right-container">--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{route('assignments.index')}}">List of Assignments</a></li>--}}
                    {{--<li><a href="{{route('assignments.create')}}">Add Assignments</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--End Manager--}}

            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-star"></i> <span>Rating</span></a>--}}
            {{--</li>--}}
            {{--End Community Manager--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>