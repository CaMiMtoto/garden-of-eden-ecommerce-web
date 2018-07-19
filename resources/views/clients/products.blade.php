@extends('layouts.app')

@section('title')
    Home| products
@endsection
@section('content')
    <br>
    <div class="section">
        <div class="container">
            <div class="row">
                <section class="col-md-12">
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
                        @foreach($products as $product)
                            <!-- shop -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="shop">
                                        <div class="shop-img">

                                                <img src="{{ asset("uploads/products/" . $product->image) }}" alt="" class="img-responsive" style="width: 371px;height: 247px">
                                        </div>
                                        <div class="shop-body">
                                            <h2 style="color: #FFFFFF;">{{ $product->name }}</h2>
                                            <h5 style="color: #FFFFFF;">{{ $product->category->name }}</h5>
                                            <h5 style="color: #FFFFFF;">
                                                {{ number_format($product->price,1) }}
                                                <small style="color: white">Rwf</small>
                                                /
                                                <small style="color: white">{{ $product->measure }}</small>
                                            </h5>
                                            <a href="{{ route('cart.addToCart',['id'=>$product->id]) }}"
                                               class="btn btn-success flat">
                                                <i class="fa fa-shopping-basket"></i>
                                                Add To Basket
                                            </a>
                                            <br>
                                            <br>
                                            <a href="{{ asset("uploads/products/" . $product->image) }}" target="_blank" class="btn btn-danger flat">
                                                <i class="fa fa-eye"></i>
                                                View full image
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /shop -->
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                        {{ $products->links() }}
                    @endif
                </section>
            </div>
        </div>
    </div>

@endsection