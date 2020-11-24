@extends('layouts.app')
@section('styles')
    <style>
        html, body {
            background-color: #FCFCFC;
        }

        .container-div {
            max-height: 200px;
            overflow-y: hidden
        }

        .ratings {
            color: grey;
        }

        .grow {
            transition: all .2s ease-in-out;
        }

        .product-name {
            color: #449D44;
        }

        .grow:hover {
            transform: scale(1.1);
        }

        .item.list-group-item {
            width: 100%;
            background-color: #fff;
            margin-bottom: 10px;
        }


    </style>
@endsection
@section('title')
    Product
@endsection
@section('content')
    <br>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="panel panel-body" style="padding: 0">
                            <img class="img-responsive"
                                 src="{{ $product->image_url }}" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="">
                        <h3>{{ $product->name }}</h3>
                        <div class="h2">
                            RWF {{ number_format($product->getRealPrice(),1) }}
                            @if($product->discount>0)
                                <del class="product-old-price text-danger">
                                    <span>{{ number_format($product->price) }}</span>
                                </del>
                            @endif
                            <small>{{ $product->measure }}</small>
                        </div>
                        <div style="padding: 20px 0">
                            @if($product->status==='Available')
                                <form action="{{ route('cart.addToCart',['id'=>$product->id]) }}"
                                      class="form-inline">
                                    <div class="form-group form-group-sm">
                                        <label for="qty{{$product->id}}"></label>
                                        <input style="width: 60px" min="0.5" size="10"
                                               value="1" type="text"
                                               max="{{ $product->qty }}" name="qty"
                                               class="form-control flat"
                                               placeholder="Qty"
                                               id="qty{{$product->id}}">
                                    </div>
                                    <button type="submit"
                                            class="btn btn-cart text-uppercase btn-sm flat" {{ $product->qty <=0 ? 'disabled':'' }}>
                                        <i class="ti ti-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                            @else
                                <span class="label label-default"><i class="fa fa-info-circle"></i>Out Of Stock</span>
                            @endif
                        </div>
                        <div>
                            <p>
                                {{$product->description}}
                                Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                vel, ullamcorper sit amet ligula. Proin eget tortor risus
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="strong bold text-center text-uppercase">
                        <span>People also buy these together</span>
                    </h4>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product">
                        <div class="product-img">
                            <div style="height: 232px;overflow: hidden">
                                <img style="width: 100%"
                                     class="lozad" data-src="{{ asset('uploads/products/'.$product->image) }}"
                                     alt="" src="">
                            </div>

                            <div class="product-label">
                                @if($product->discount>0)
                                    <span class="sale">
                                                            -{{ $product->discount }}%
                                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $product->category->name }}</p>
                            <h3 class="product-name">
                                <a href="javascript:void(0);">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <h4 class="product-price">
                                RF {{ number_format($product->getRealPrice()) }}
                                @if($product->discount>0)
                                    <del class="product-old-price">
                                        RF {{ number_format($product->price) }}
                                    </del>
                                @endif
                            </h4>
                            <h5>
                                {{ $product->measure }}
                            </h5>

                        </div>
                        <div class="add-to-cart">
                            @if($product->status==='Available')
                                <a href="{{ route('cart.addToCart',['id'=>$product->id]) }}"
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
            </div>
        </div>
    </div>



@endsection