@extends('layouts.app')

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

            <div id="hot-deal" class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row home-info">
                        <div class="col-md-12">
                            <h2 class="text-uppercase text-center">Garden of eden produce</h2>
                            <div class="hot-deal">
                                <p style="text-transform: none" class="home-info">
                                    Provides Organic
                                    Rwandan fruit and vegetables at
                                    affordable prices. <br>With more than 25 years
                                    of organic farming experience,
                                    we specialize in high quality,great
                                    tasting produce. <br>We serve and deliver to
                                    residential homes,business
                                    , restaurant and hotels. <br>
                                    Check out our online market
                                    and start enjoying
                                </p>
                                <a class="btn primary-btn cta-btn flat" href="{{ route('getProduct') }}">
                                    Shop now
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            {{--  <div class="container">
                  <div class="row">
                      <div class="col-md-2">
                          <div class="section-title">
                              <h3 class="title">Categories</h3>
                          </div>
                          <div style="margin-top: 44px">
                              <ul class="list-group flat">
                                  @foreach(\App\Category::all() as $category)
                                      <li class="list-group-item flat">
                                          <a href="/getProduct?cat={{ $category->id }}">
                                              {{ $category->name }}
                                              <span class="badge pull-right badge-primary">{{$category->products()->count()}}</span>
                                          </a>
                                      </li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                      <!-- section title -->
                      <div class="col-md-10">

                      </div>
                  </div>
              </div>--}}
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
                                                    <span class="sale">-30%</span>
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
                                                <h4 class="product-price">RF {{ number_format($item->price) }}
                                                    <del class="product-old-price">
                                                        RF {{ number_format($item->price-($item->price*30/100)) }}
                                                    </del>
                                                </h4>
                                            </div>
                                                <div class="add-to-cart">
                                                    <a href="{{ route('cart.addToCart',['id'=>$item->id]) }}"
                                                       class="btn add-to-cart-btn flat">
                                                        <i class="fa fa-shopping-bag"></i> add to basket
                                                    </a>
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
                        <h3 class="title">New Deals</h3>
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
                                            <span class="sale">-10%</span>
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
                                            RWF {{ number_format($item->price) }}
                                            <del class="product-old-price">
                                                RWF {{ number_format($item->price-($item->price*10/100)) }}
                                            </del>
                                        </h4>
                                        <h5>
                                            {{ $item->measure }}
                                        </h5>

                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{ route('cart.addToCart',['id'=>$item->id]) }}"
                                           class="btn add-to-cart-btn flat">
                                            <i class="fa fa-shopping-bag"></i> add to basket
                                        </a>
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
