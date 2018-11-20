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
                <li><a href="{{ route('dashboard') }}" target="_blank">ADMIN</a></li>
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