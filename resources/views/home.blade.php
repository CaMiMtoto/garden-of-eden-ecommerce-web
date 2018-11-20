@extends('layouts.app')
@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/home-carousel.css') }}"/>
@endsection
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    @if(\App\Event::where('active',true)->count()>0)
                        <div>
                            @foreach(\App\Event::all() as $event)
                                <div class="alert alert-info alert-dismissible flat" role="alert">
                                    <h4><i class="fa fa-info-circle"></i> {{ $event->name }}</h4>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        {{--<span aria-hidden="true">×</span>--}}
                                    </button>
                                    <p>
                                        {{ $event->description }}
                                        <br>
                                        <span>This will start on </span><strong>{{ date('D j M Y', strtotime($event->date))  }}</strong>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(Session::has('message'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success flat">
                                    <p>
                                        <i class="fa fa-check-circle"></i>
                                        {{ Session::get('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            <div class="section">
                <!-- container -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Carousel -->
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <div style="padding: 0px">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0"
                                            class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner text-center">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <img src="{{ asset('carousel/carousel1.jpeg') }}" alt="First slide"
                                                         style="max-height: 350px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <img src="{{ asset('carousel/WhatsApp Image 2018-11-19 at 12.16.59 PM (1).jpeg') }}"
                                                         alt="Second slide" style="max-height: 350px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <img src="{{ asset('carousel/WhatsApp Image 2018-11-19 at 12.16.58 PM (1).jpeg') }}"
                                                         alt="Third slide" style="max-height: 350px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="ti-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="ti-angle-right"></span>
                                </a>
                            </div>
                            <!-- /carousel -->
                        </div>
                        <div class="col-sm-6">
                            <div class="padding-30-not-sm">
                                <h3 class="text-uppercase text-center header">Garden Of Eden Produce</h3>
                                <div class="h2 text-left animate">
                                    <p  class="typewrite" data-period="2000"
                                       data-type='[ "Garden of Eden Produce provides Organic Rwandan fruit and vegetables at affordable prices.",
                                       "With more than 25 years of organic farming experience,we specialize in high quality,great tasting produce.", "We serve and deliver to residential homes,business,restaurant and hotels.", "Check out our online market and start enjoying Organic Rwandan produce today." ]'>
                                        <span class="wrap"></span>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /container -->
            </div>

        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Products</h3>
                        <div class="section-nav">
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                @foreach(\App\Product::limit(10)->get()->shuffle()->take(10) as $item)
                                    <!-- product -->
                                        <div class="product">
                                            <?php
                                            $path = 'uploads/products/' . $item->image;
                                            if (!file_exists($path)) {
                                                $path = 'img/no_image.png';
                                            }
                                            ?>
                                            <div class="product-img">
                                                <div style="height: 232px;overflow: hidden">
                                                    <img style="width: 100%" src="{{ $path }}" alt="">
                                                </div>
                                                <div class="product-label">
                                                    @if($item->discount>0)
                                                        <span class="sale">
                                                            -{{ $item->discount }}%
                                                        </span>
                                                    @endif
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">
                                                    {{$item->category->name}}
                                                </p>
                                                <h3 class="product-name">
                                                    <a href="#">
                                                        {{ $item->name }}
                                                    </a>
                                                </h3>
                                                <h4 class="product-price">
                                                    RF {{ number_format($item->getRealPrice()) }}
                                                    @if($item->discount>0)
                                                        <del class="product-old-price">
                                                            RF {{ number_format($item->price) }}
                                                        </del>
                                                    @endif
                                                </h4>
                                                <h5>
                                                    {{ $item->measure }}
                                                </h5>
                                            </div>
                                            <div class="add-to-cart">
                                                @if($item->status==='Available')
                                                    <a href="{{ route('cart.addToCart',['id'=>$item->id]) }}"
                                                       class="btn add-to-cart-btn flat">
                                                        <i class="fa fa-shopping-bag"></i> add to basket
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                       class="btn add-to-cart-btn flat" disabled="">
                                                        <i class="fa fa-ban"></i>
                                                        Out of stock
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                    </div>
                    <div class="row">
                        <!-- /section title -->
                        <!-- Products tab & slick -->
                        @foreach(\App\Product::orderBy('id','desc')->limit(4)->get() as $item)
                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="product-img">
                                        <div style="height: 232px;overflow: hidden">
                                            <img style="width: 100%"
                                                 src="{{ asset('uploads/products/'.$item->image) }}" alt="">
                                        </div>

                                        <div class="product-label">
                                            @if($item->discount>0)
                                                <span class="sale">
                                                            -{{ $item->discount }}%
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $item->category->name }}</p>
                                        <h3 class="product-name">
                                            <a href="javascript:void(0);">
                                                {{ $item->name }}
                                            </a>
                                        </h3>
                                        <h4 class="product-price">
                                            RF {{ number_format($item->getRealPrice()) }}
                                            @if($item->discount>0)
                                                <del class="product-old-price">
                                                    RF {{ number_format($item->price) }}
                                                </del>
                                            @endif
                                        </h4>
                                        <h5>
                                            {{ $item->measure }}
                                        </h5>

                                    </div>
                                    <div class="add-to-cart">
                                        @if($item->status==='Available')
                                            <a href="{{ route('cart.addToCart',['id'=>$item->id]) }}"
                                               class="btn add-to-cart-btn flat">
                                                <i class="fa fa-shopping-bag"></i> add to basket
                                            </a>
                                        @else
                                            <a href="javascript:void(0);"
                                               class="btn add-to-cart-btn flat" disabled="">
                                                <i class="fa fa-ban"></i>
                                                Out of stock
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Products tab & slick -->
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <?php
                $i = 0;
                ?>
                @foreach($categories as $category)
                    @if($category->products->count()>=4)
                        <?php $i++; ?>
                        <div class="col-md-4 col-xs-6">
                            <div class="section-title">
                                <h4 class="title">{{ $category->name }}
                                </h4>
                                <div class="section-nav">
                                    <div id="slick-nav-3" class="products-slick-nav"></div>
                                    <span class="pull-right">
                                        <a href="/getProduct?cat={{ $category->id }}">
                                            More
                                        <i class="fa fa-arrow-circle-o-right"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <div class="products-widget-slick category-info" data-nav="#slick-nav-3">
                                <div>
                                @foreach($category->products->take(4) as $product)
                                    <?php
                                    $path = 'uploads/products/' . $product->image;
                                    if (!file_exists($path)) {
                                        $path = 'img/noimage.jpg';
                                    }
                                    ?>
                                    <!-- product widget -->
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset($path) }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $product->category->name }}</p>
                                                <h6>
                                                    <a href="#">{{ $product->name }}</a>
                                                </h6>
                                                <h6>
                                                    <span class="pull-left">
                                                        RF
                                                        {{ number_format($product->price) }}
                                                    </span>
                                                    <span class="pull-right">
                                                        <a href="{{ route('cart.addToCart',['id'=>$product->id]) }}"
                                                           class="btn btn-cart btn-xs flat">
                                                        <i class="fa fa-shopping-bag"></i>
                                                        Basket
                                                    </a>
                                                    </span>
                                                </h6>
                                            </div>
                                            <hr>
                                        </div>
                                        <!-- /product widget -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{--<div class="clearfix visible-sm visible-xs"></div>--}}
                        <?php
                        if ($i == 3) {
                            goto label;
                        }
                        ?>
                    @endif
                @endforeach
                <?php
                label:
                ?>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Tell others</p>

                        <ul class="newsletter-follow">
                            <li>
                                <a href="https://www.facebook.com/EdenofGardenProducer" target="_blank"><i
                                            class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank"><i
                                            class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/garden_of_eden_produce/" target="_blank"><i
                                            class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/" target="_blank"><i
                                            class="fa fa-youtube-play"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
@endsection

@section('scripts')
    <script>
        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) { delta /= 2; }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i=0; i<elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };

        $('.carousel').carousel({
            interval: 10000,
            pause: false
        })
    </script>
@endsection
