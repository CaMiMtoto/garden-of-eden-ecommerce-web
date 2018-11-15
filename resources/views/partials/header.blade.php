<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                {{--<li><a href="tel:+250784929046"><i class="fa fa-phone"></i>{{ \App\MyFunc::format_phone_us("0 784 929 046") }}</a></li>--}}
                <li><a href="tel:+250728177613"><i
                                class="fa fa-whatsapp"></i>{{ \App\MyFunc::format_phone_us("0728177613") }}</a></li>
                <li><a href="mailto:frankuwuzuyinema@yahoo.fr">
                        <i class="fa fa-envelope-o"></i>frankuwuzuyinema@yahoo.fr</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>J.Lynn's Kagugu , Rouge Hotel KG 414</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="javascript:void(0);">RWF</a></li>
                @if(Auth::user())
                    @if(Auth::user()->role==='Admin')

                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-user-o"></i>
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul style="min-width: 135px" class="dropdown-menu flat" aria-labelledby="dropdownMenu1">
                                <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Admin</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}">
                                        <i class="fa fa-sign-out"></i> Log out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-user-o"></i>
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul style="min-width: 135px"  class="dropdown-menu flat" aria-labelledby="dropdownMenu1">
                                <li><a href="{{ route('my.profile') }}"><i class="fa fa-user"></i> My Profile</a></li>
                                <li><a href="{{ route('my.orders') }}"><i class="fa fa-shopping-cart"></i> My orders</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}">
                                        <i class="fa fa-sign-out"></i> Log out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="fa fa-lock"></i> Register</a></li>
                @endif

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ route('home') }}" class="logo" style="color: #F0FFDF;">
                            <img src="{{ asset('img/GARDEN_LOGO.png') }}" alt="Garden Of Eden Produce"
                                 style="width: 50px">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ route('getProduct') }}">
                            <input class="input" type="search" placeholder="Search here" name="search">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn" style="float: left">
                        <!-- Cart -->
                        <div>
                            <a href="{{ route('cart.shoppingCart') }}">
                                <i class="fa fa-shopping-basket"></i>
                                <span>My Basket</span>
                                <div class="qty">
                                    {{ Cart::count()}}
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                    {{--       <div class="menu-toggle">
                               <a href="#">
                                   <i class="fa fa-bars"></i>
                                   <span>Menu</span>
                               </a>
                           </div>--}}
                    <!-- /Menu Toogle -->
                    </div>
                    <div class="clearfix"></div>
                </div>

                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>