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
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="{{action('HomeController@dashboard')}}">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            @if( Auth::user()->role_id == 8)
            <li>
                <a href="{{action('MessagesController@index')}}">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green">16</small>
                    </span>
                </a>
            </li>
            @endif
            {{--Sales Manager--}}
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i><span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href='{{action('UsersController@index')}}'>View List</a></li>
                    <li><a href='{{action('UsersController@create')}}'>Add new</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a><i class="fa fa-street-view"></i> <span>Leads</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{action('LeadsController@index')}}">View List</a></li>
                    <li><a href="{{action('LeadsController@create')}}">Add new</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a><i class="fa fa-retweet"></i> <span>Assignment Manager</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{action('AssignmentsController@index')}}">View List</a></li>
                    <li><a href="{{action('AssignmentsController@create')}}">Add new</a></li>
                </ul>
            </li>

            {{--End Sales Manager--}}


            {{--Community Manager--}}
            <li class="treeview">
                <a href="#"><i class="fa fa-handshake-o"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{action('ProductsController@index')}}">View all products</a></li>
                    <li><a href="{{action('ProductsController@create')}}">Add new product</a></li>
                    <li><a href="{{action('CategoriesController@index')}}">View all categories</a></li>
                    <li><a href="{{action('CategoriesController@create')}}">Add new category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gift"></i> <span>Gifts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{action('GiftsController@index')}}">View List</a></li>
                    <li><a href="{{action('GiftsController@create')}}">Add new</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-star"></i> <span>Rating</span></a>
            </li>
            {{--End Community Manager--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>