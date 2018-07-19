<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
        <span class="sr-only">Toggle Fullwidth</span>
        <i class="fa fa-angle-left"></i>
    </button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('img/user.png') }}" class="img-responsive img-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong>CaMi</strong> <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="nav-categories">
                    <a href="{{ route('category.index') }}">
                        <i class="fa fa-list-ol"></i> <span>Categories</span>
                    </a>
                </li>
                <li class="nav-products">
                    <a href="{{ route('products.index') }}">
                        <i class="fa fa-list-ul"></i> <span>Products</span>
                    </a>
                </li>
                <li class="nav-orders">
                    <a href="{{ route('orders.index') }}">
                        <i class="fa fa-shopping-bag"></i> <span>Orders</span>
                    </a>
                </li>
                <li class="nav-users">
                    <a href="{{ route('category.index') }}">
                        <i class="fa fa-cog"></i> <span>Users</span>
                    </a>
                </li>
                <li class="nav-reports">
                    <a href="{{ route('category.index') }}">
                        <i class="fa fa-print"></i> <span>Reports</span>
                    </a>
                </li>
                <li class="nav-settings">
                    <a href="{{ route('category.index') }}">
                        <i class="fa fa-wrench"></i> <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>