<?php
$mail = \App\MyFunc::getDefaultSetting()->email1;
$whatsapp = \App\MyFunc::format_phone_us(\App\MyFunc::getDefaultSetting()->whatsapp);
$phone = \App\MyFunc::format_phone_us(\App\MyFunc::getDefaultSetting()->phoneNumber1);
$phone2 = \App\MyFunc::format_phone_us(\App\MyFunc::getDefaultSetting()->phoneNumber2);
$address = \App\MyFunc::getDefaultSetting()->address;
$about = \App\MyFunc::getDefaultSetting()->about;
?>

<!-- top footer -->
<footer id="footer">
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>
                            {{ $about }}
                        </p>

                        <ul class="footer-links">
                            <li>
                                <a href="">
                                    <i class="fa fa-map-marker"></i>
                                    {{ $address }}
                                </a>
                            </li>
                            <li><a href="tel:{{ $phone2 }}"><i class="fa fa-phone"></i> {{ $phone2 }}</a></li>
                            <li><a href="mailto:{{ $mail }}"><i class="fa fa-envelope-o"></i>
                                    {{ $mail }}
                                </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            @foreach(\App\Category::limit(10)->get() as $item)
                                @if($item->products->count() > 0)
                                    <li>
                                        <a href="/getProduct?cat={{ $item->id }}">{{ $item->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="{{ route('cart.shoppingCart') }}">View Basket</a></li>
                            <li><a href="javascript:void(0)">Contact Us</a></li>
                            <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /container -->
    <!-- bottom footer -->
    <div id="bottom-footer">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="copyright">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This website made by
                        <a style="color: whitesmoke"
                           href="mailto:jeanpaulbyiringiro9764@gmail.com">Jean Paul Byiringiro</a>
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>