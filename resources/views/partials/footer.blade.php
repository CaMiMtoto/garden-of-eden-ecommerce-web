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
                            Garden of Eden Produce provides Organic Rwandan fruit and vegetables at affordable prices.With more than 25 years of organic farming experience,we specialize in high quality,great tasting produce.We serve and deliver  to residential homes,business,restaurant and hotels. Check out our online market and start enjoying Organic Rwandan produce today!

                        </p>

                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>J.Lynn's Kagugu , Rouge Hotel KG 414</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i> +250 784 929 046</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>frankuwuzuyinema@yahoo.fr</a></li>
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