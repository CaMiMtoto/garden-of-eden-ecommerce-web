
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="tel:+250780661813"><i class="fa fa-phone"></i> +250780661813</a></li>
                <li><a href="mailto:jeanpaulcami@live.com">
                        <i class="fa fa-envelope-o"></i>jeanpaulcami@live.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="javascript:void(0);">RWF</a></li>
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
                            {{--<img src="./img/logo.png" alt="">--}}
                           <b> FShop</b>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ route('getProduct') }}">
                            <input class="input" type="search" placeholder="Search here" name="search">
                            <button class="search-btn"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">

                        <!-- Cart -->
                        <div class="">
                            <a href="{{ route('cart.shoppingCart') }}">
                                <i class="fa fa-shopping-basket"></i>
                                <span>My Basket</span>
                                <div class="qty">
                                    {{ Cart::count()}}
                                </div>
                            </a>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>