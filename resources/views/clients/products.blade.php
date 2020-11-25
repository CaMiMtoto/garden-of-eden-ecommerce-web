@extends('layouts.app')

@section('title')
    Home| products
@endsection
@section('content')
    <br>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>Categories</h4>
                    <div>
                        <?php
                        $cat = 0;
                        if (isset($_GET['cat'])) {
                            $cat = $_GET['cat'];
                        }
                        ?>
                        <ul class="list-group flat">
                            @foreach(\App\Category::all() as $category)
                                <li class="list-group-item flat {{ $category->id===(int)$cat? 'active1':'' }}">
                                    <a href="/getProduct?cat={{ $category->id }}">
                                        {{ $category->name }}
                                        <span class="badge badge-primary pull-right">{{$category->products()->count()}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <section class="col-md-9">
                    @if(count($products) ==0)
                        <div class="alert alert-info">
                            <p>Your search keyword could not math anything. Try with a different keyword.</p>
                        </div>
                    @else
                        <div>
                            <h4>
                                Showing result of {{ $products->total() }} product(s)
                                <small> currently showing {{ $products->count() }} product(s)</small>
                            </h4>
                            <ul class="list-group">
                                @foreach($products as $product)

                                    <li class="item list-group-item">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-3 container-div">
                                                    <a title="View full size"
                                                       href="{{ route('products.details-view',$product->id) }}">
                                                        <img data-src="{{ asset("uploads/products/" . $product->image) }}"
                                                             alt="" style="width: 100%"
                                                             class="lozad grow img-responsive">
                                                    </a>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="caption">
                                                        <h5 class="pull-right">
                                                            <span class="text-success" style="padding-right: 20px">
                                                                 {{ number_format($product->getRealPrice(),1) }}
                                                            </span>
                                                            @if($product->discount>0)
                                                                <del class="product-old-price text-danger">
                                                                    <span>{{ number_format($product->price) }}</span>
                                                                </del>
                                                            @endif
                                                            <small>Rwf / {{ $product->measure }}</small>
                                                        </h5>
                                                        <h4 class="product-name">
                                                            <span>{{ $product->name }}</span>
                                                        </h4>
                                                        <p class="hidden-xs">
                                                            @if($product->description!=='')
                                                                {{ str_limit($product->description,150) }}
                                                            @else
                                                                <span class="label label-default">
                                                                    No description available
                                                                </span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="ratings margin-left-sm">
                                                        {{--<div class="">{{ $product->qty }} in stock</div>--}}
                                                        {{--<br>--}}
                                                        <div class="pull-left">
                                                            <a href="/getProduct?cat={{ $product->category->id }}">
                                                                {{ $product->category->name }}
                                                            </a>
                                                        </div>
                                                        <div class="pull-right">
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
                                                                            class="btn  btn-cart btn-sm flat" {{ $product->qty <=0 ? 'disabled':'' }}>
                                                                        <i class="fa fa-shopping-basket"></i>
                                                                        Add to cart
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <span class="label label-default">
                                                                <i class="fa fa-info-circle"></i>
                                                                Out Of Stock
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="clearfix"></div>
                                                    </div>
                                                    @if($product->discount>0)
                                                        <h4>
                                                           <span class="label label-danger">
                                                                {{ - $product->getDiscountPercent()}} Rwf ,OFF
                                                           </span>
                                                        </h4>
                                                    @endif
                                                    <a href="{{ route('products.details-view',$product->id) }}"
                                                       class="btn btn-default btn-sm flat text-uppercase">
                                                        More Detail
                                                        <i class="fa fa-chevron-right"></i>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            {{ $products->links() }}
                        </div>
                        <div class="clearfix"></div>
                    @endif
                </section>
            </div>
        </div>
    </div>

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