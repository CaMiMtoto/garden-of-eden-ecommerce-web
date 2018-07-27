@extends('layouts.app')

@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            @if(\App\Event::where('active',true)->count()>0)
                <div>
                    @foreach(\App\Event::all() as $event)
                        <marquee>
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
                        </marquee>
                    @endforeach
                </div>
            @endif
            <div class="jumbotron text-center flat">
                <h1>Garden of eden produce</h1>
            </div>

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

            @foreach($categories as $category)
                <br>
                <div class="row" style="padding: 10px;">
                    <h4 class="padding-left-20">
                        <a href=""><i class="fa fa-cutlery"></i> {{ $category->name }}</a>
                    </h4>
                @foreach($category->products->take(3) as $product)
                    <!-- shop -->
                        <div class="col-md-4 col-xs-6">
                            <div class="shop">
                                <div class="shop-img" style="overflow-x: hidden">
                                    <img src="{{ asset("uploads/products/" . $product->image) }}" alt=""
                                         style="height: 247px;width: auto!important;">
                                </div>
                                <div class="shop-body">
                                    <h2 style="color: #FFFFFF;">{{ $product->name }}</h2>
                                    <h3>
                                        {{ number_format($product->price,1) }}
                                        <small style="color: white">Rwf</small>
                                        /
                                        <small style="color: white">{{ $product->measure }}</small>
                                    </h3>
                                    <br>

                                    <a href="{{ route('cart.addToCart',['id'=>$product->id]) }}"
                                       class="btn btn-success flat">
                                        <i class="fa fa-shopping-basket"></i>
                                        Add To Basket
                                    </a>
                                    <br>
                                    <br>
                                    <a href="{{ asset("uploads/products/" . $product->image) }}" target="_blank"
                                       class="btn btn-danger flat">
                                        <i class="fa fa-eye"></i>
                                        View full image
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /shop -->
                    @endforeach
                </div>
            @endforeach

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
                                <a href="https://www.facebook.com/MtotoCaMi" target="_blank"><i
                                            class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/JeanByiringiro" target="_blank"><i
                                            class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/jean_paul_camy/" target="_blank"><i
                                            class="fa fa-instagram"></i></a>
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
