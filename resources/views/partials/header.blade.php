
<?php
$mail = \App\MyFunc::getDefaultSetting()->email1;
$whatsapp = \App\MyFunc::format_phone_us(\App\MyFunc::getDefaultSetting()->whatsapp);
$email2 = \App\MyFunc::getDefaultSetting()->email2;
$phone = \App\MyFunc::format_phone_us(\App\MyFunc::getDefaultSetting()->phoneNumber1);
$phone2 = \App\MyFunc::format_phone_us(\App\MyFunc::getDefaultSetting()->phoneNumber2);
$phone1 = \App\MyFunc::format_phone_us(\App\MyFunc::getDefaultSetting()->phoneNumber1);
$address = \App\MyFunc::getDefaultSetting()->address;
?>

<header>
<!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li>
                    <a href="tel:{{$whatsapp }}">
                        <i class="fa fa-whatsapp"></i>{{$whatsapp }}
                    </a>
                </li>
                <li>
                    <a href="tel:{{$phone1 }}">
                        <i class="fa fa-mobile-phone"></i>{{$phone1 }}
                    </a>
                </li>
                <li>
                    <a href="tel:{{$phone2 }}">
                        <i class="fa fa-phone"></i>{{$phone2 }}
                    </a>
                </li>
                <li>

                    <a href="mailto:{{ $mail }}">
                        <i class="fa fa-envelope-o"></i>
                        {{ $mail }}
                    </a>
                </li>
                <li>

                    <a href="mailto:{{ $email2 }}">
                        <i class="fa fa-envelope-o"></i>
                        <?php print $email2;?>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="fa fa-map-marker"></i>
                        {{ $address }}
                    </a>
                </li>
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
                            <img src="{{ asset('img/GARDEN_LOGO.png') }}" class="img-responsive img-circle" alt="Garden Of Eden Produce"
                                 style="width: 80px;background-color: whitesmoke">
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