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

            <li>
                <a href="{{action('MessagesController@index')}}">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green">{{\App\Model\Message::countYetNotRead()}}</small>
                    </span>
                </a>
            </li>

            {{--Sales Manager--}}
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i><span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href='{{action('UsersController@index')}}'>List of Users</a></li>
                    <li><a href='{{action('UsersController@create')}}'>Add Users</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-street-view"></i> <span>Leads</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{action('LeadsController@index')}}">List of Leads</a></li>
                    <li><a href="{{action('LeadsController@create')}}">Add Leads</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-retweet"></i> <span>Assignment Manager</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{action('AssignmentsController@index')}}">List of Assignments</a></li>
                    <li><a href="{{action('AssignmentsController@create')}}">Add Assignments</a></li>
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
                    <li><a href="{{action('ProductsController@index')}}">List of Products</a></li>
                    <li><a href="{{action('ProductsController@create')}}">Add Products</a></li>
                    <li><a href="{{action('CategoriesController@index') }}/products">List of Product Categories</a></li>
                    <li><a href="/categories/products/create">Add Product Categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gift"></i> <span>Gifts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{action('GiftsController@index')}}">List of Gifts</a></li>
                    <li><a href="{{action('GiftsController@create')}}">Add Gifts</a></li>
                    <li><a href="{{action('CategoriesController@index')}}/gifts">List of Gift Categories</a></li>
                    <li><a href="/categories/gifts/create">Add Gift Categories</a></li>
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