<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/avatar2.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Thuy Pham</p>
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
                <a href="admin/">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="mail/">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green">16</small>
                    </span>
                </a>
            </li>
            {{--Sales Manager--}}
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i><span>Managers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href='managers/'>View List</a></li>
                    <li><a href='managers/add'>Add new</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-universal-access"></i><span>Consultants</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">View List</a></li>
                    <li><a href="#">Add new</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-street-view"></i> <span>Leads</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">View List</a></li>
                    <li><a href="#">Assignment</a></li>
                </ul>
            </li>
            {{--End Sales Manager--}}

            {{--Community Manager--}}
            <li class="treeview">
                <a href="#"><i class="fa fa-handshake-o"></i> <span>Tipsters</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">View List</a></li>
                    <li><a href="#">Add new</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gift"></i> <span>Gifts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">View List</a></li>
                    <li><a href="#">Add new</a></li>
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