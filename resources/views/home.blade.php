@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
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
                        <div class="col-md-6">
                            <div class="carousel-image div-hide">
                                <div>
                                    <img src="{{ asset('carousel/1533157040.jpg') }}" alt="First slide"
                                         style="max-height: 350px;">
                                </div>
                                <div>
                                    <img src="{{ asset('carousel/1533153168.jpg') }}" alt="First slide"
                                         style="max-height: 350px;">
                                </div>
                                <div>
                                    <img src="{{ asset('carousel/1541062003.jpg') }}" alt="First slide"
                                         style="max-height: 350px;">
                                </div>
                                <div>
                                    <img src="{{ asset('carousel/WhatsApp Image 2018-11-19 at 12.16.59 PM (1).jpeg') }}"
                                         alt="Second slide" style="max-height: 350px;">
                                </div>
                                <div>
                                    <img src="{{ asset('carousel/WhatsApp Image 2018-11-19 at 12.16.58 PM (1).jpeg') }}"
                                         alt="Third slide" style="max-height: 350px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="padding-30-not-sm">
                                <h3 class="text-uppercase text-center header">Garden Of Eden Produce</h3>
                                <div class="h2 text-left animate">
                                    <div class="your-class div-hide">
                                        <div>
                                            Garden of Eden Produce provides Organic Rwandan fruit and vegetables at affordable prices.
                                        </div>
                                        <div>
                                            With more than 26 years of organic farming experience,we specialize in high quality,great tasting produce.
                                        </div>
                                        <div>
                                            We serve and deliver to residential homes,business,restaurant and hotels.
                                        </div>
                                        <div>
                                            Check out our online market and start enjoying Organic Rwandan produce today.
                                        </div>
                                    </div>
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
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Card accepted</h3>
                    <div class="center" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
                        <div class="card-container">
                            <img src="{{ asset('Cards/visa-2623015_960_720.png') }}" class="img-responsive " alt="">
                        </div>
                        <div class="card-container">
                            <img src="{{ asset('Cards/1280px-UnionPay_logo.svg.png') }}" class="img-responsive " alt="">
                        </div>
                        <div class="card-container">
                            <img src="{{ asset('Cards/2000px-Mastercard-logo.png') }}" class="img-responsive " alt="">
                        </div>

                        <div class="card-container">
                            <img src="{{ asset('Cards/Diners_Club_Logo3.svg.png') }}" class="img-responsive " alt="">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <h3>Get in touch with us</h3>

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
    <script src="{{ asset('js/my-animation.min.js') }}"></script>
    <script>
        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            autoplay:true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endsection
