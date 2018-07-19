<?php
use \Gloudemans\Shoppingcart\Facades\cart;
?>

@extends('layouts.app')

@section('title')
    Home| shopping cart
@endsection
@section('content')

    <br>
    <div class="section">
    <div class="container">
        <div class="row">
            <section class="cart-items col-md-12">
                @if(count($errors)>0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <strong><i class="fa fa-warning"></i> Problem! </strong>
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif

                <div class="">
                    @if(count($cart))
                        <h1>
                            <i class="fa fa-shopping-bag"></i> My shopping basket</h1>

                        <hr>

                        <table class="table table-hover table-condensed">
                            <thead>
                            <tr class="">
                                <th colspan="2">Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Measure</th>
                                {{--<th>Sub Total</th>--}}
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $cartItem)
                                <?php
                                $product = \App\Product::find($cartItem->id);
                                ?>
                                <tr>
                                    <td>
                                        <h4>
                                            <a href="{{ asset("uploads/products/" .$product->image ) }}">
                                                <img src="{{ asset("uploads/products/" .$product->image ) }}" alt=""
                                                     class="img-responsive img-circle" style="height: 50px ;">
                                            </a>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4><a href="">{{ $cartItem->name }}</a></h4>
                                    </td>
                                    <td>
                                        <p>
                                            {{ number_format($cartItem->price) }}
                                            <small>Rwf</small>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm flat"
                                               href="{{ route('cart.increment',['id'=>$cartItem->rowId]) }}">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <a href="" class="btn btn-info btn-sm">
                                                {{ $cartItem->qty}}
                                            </a>
                                            {{--<input type="number"  value="{{ $cartItem->qty}}" name="qty" class="qty form-control" min="1" />--}}
                                            <a class="btn btn-default btn-sm flat"
                                               href="{{ route('cart.decrement',['id'=>$cartItem->rowId]) }}">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $product->measure }}</td>
                                    <td>
                                        <p>
                                            {{ number_format($cartItem->subtotal) }}
                                            <small>Rwf</small>
                                        </p>
                                    </td>

                                    <td>
                                        <a class="cart_quantity_delete"
                                           href="{{ route('cart.removeItem',['id'=>$cartItem->rowId]) }}"><i
                                                    class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="8">
                                    <a class="btn btn-default flat btn-lg"
                                       href="{{route('cart.removeAll')}}">
                                        <i class="fa fa-remove"></i>
                                        Remove all from basket</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <section id="do_action">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="total_area">
                                            <div>
                                                <h3>
                                                    Total amount to pay
                                                    <span class="label label-info">
                                                        {{ Cart::subtotal()  }} Rwf
                                               </span>
                                                </h3>
                                            </div>
                                            <br>
                                            <form action="{{ route('cart.checkOut') }}" class="form-horizontal"
                                                  method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group  {{ $errors->has('clientName')?'has-error':''}} ">
                                                    <div>
                                                        <input type="text" required placeholder="Full name"
                                                               value="{{Request::old('clientName')}}" max="10" min="10"
                                                               class="form-control flat"
                                                               name="clientName" id="clientName">
                                                    </div>
                                                </div>
                                                <div class="form-group  {{ $errors->has('phoneNumber')?'has-error':''}}">
                                                    <div>
                                                        <input type="text" required
                                                               placeholder="Enter your phone number"
                                                               value="{{Request::old('phoneNumber')}}" max="10"
                                                               class="form-control flat"
                                                               name="phoneNumber" id="phoneNumber">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary flat btn-block"
                                                                href="{{route('cart.checkOut')}}">
                                                            <i class="fa fa-thumbs-up"></i>
                                                            Confirm your order
                                                        </button>

                                                    </div>
                                                </div>


                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section><!--/#do_action-->
                    @else
                        <div class="alert alert-warning flat text-center">
                            <h2><i class="fa fa-warning"></i> You have no items in the shopping basket</h2>
                        </div>
                    @endif
                </div>

            </section>

        </div>
    </div>
    </div>
    <br>
    <br>
@endsection