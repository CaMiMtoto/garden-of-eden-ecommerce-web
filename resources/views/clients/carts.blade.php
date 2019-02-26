<?php
use \Gloudemans\Shoppingcart\Facades\cart;
?>

@extends('layouts.app')

@section('title')
    Shopping cart
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

                    <div class="panel panel-default flat">
                        <div class="panel-body">
                            <h1 class="color-primary">
                                <i class="fa fa-shopping-bag"></i> My shopping cart
                            </h1>
                            <hr>
                            @if(count($cart))
                                <table class="table table-hover table-condensed table-striped">
                                    <thead>
                                    <tr class="">
                                        <th class="hidden-xs">Image</th>
                                        <th>Product</th>
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
                                            <td class="hidden-xs">
                                                <h4>
                                                    <a href="{{ asset("uploads/products/" .$product->image ) }}">
                                                        <img src="{{ asset("uploads/products/" .$product->image ) }}"
                                                             alt=""
                                                             class="img-responsive img-thumbnail flat"
                                                             style="height: 50px ;">
                                                    </a>
                                                </h4>
                                            </td>
                                            <td>
                                                <h5>{{ $cartItem->name }}</h5>
                                            </td>
                                            <td>
                                                <p>
                                                    {{ number_format($cartItem->price) }}
                                                    <small>Rwf</small>
                                                </p>
                                            </td>
                                            <td>
                                                <form class="form-inline"
                                                      action="{{ route('cart.increment',['id'=>$cartItem->rowId]) }}">
                                                    <div class="form-group form-group-sm">
                                                        <label>
                                                            <input name="qty" placeholder="Quantity" style="width: 80px"
                                                                   value="<?php print (float)$cartItem->qty; ?>"
                                                                   type="text" min="0.5" class="form-control flat">
                                                        </label>

                                                        <button type="submit" class="btn btn-cart btn-sm flat"
                                                                title="Click here to update Quantity."
                                                                data-toggle="tooltip" data-placement="right"><i
                                                                    class="fa fa-refresh"></i></button>
                                                    </div>
                                                </form>

                                            </td>
                                            <td>{{ $product->measure }}</td>
                                            <td>
                                                <p>
                                                    {{ number_format($cartItem->subtotal) }}
                                                    <small>Rwf</small>
                                                </p>
                                            </td>

                                            <td>
                                                <a class="cart-remove-btn"
                                                   title="Click here to remove Item."
                                                   data-toggle="tooltip" data-placement="left"
                                                   href="{{ route('cart.removeItem',['id'=>$cartItem->rowId]) }}">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    <a href="{{ route('getProduct') }}"
                                       class="btn btn-default flat">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        Continue shopping
                                    </a>
                                    <a class="btn btn-danger flat"
                                       href="{{route('cart.removeAll')}}">
                                        <i class="fa fa-remove"></i>
                                        Remove all items</a>

                                    <a href="{{ route('cart.get.checkout') }}"
                                       class="btn btn-success pull-right flat">
                                        <i class="fa fa-shopping-bag"></i>
                                        Check out
                                    </a>
                                </div>

                            @else
                                <div class="alert alert-warning flat text-center">
                                    <h2><i class="fa fa-warning"></i> You have no items in the shopping basket</h2>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <section id="do_action">
                            <div class="container  hidden-xs hidden-sm">
                                <div class="row text-center">
                                    <div class="col-sm-4">
                                        <span class="color-primary" style="font-size: 100px;padding: 50px">
                                            <i class="fa fa-shopping-bag"></i>
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span class="text-success" style="font-size: 100px;padding: 50px">
                                            <i class="fa fa-shopping-basket"></i>
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <span class="color-primary" style="font-size: 100px;padding: 50px">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </section><!--/#do_action-->
                    </div>

                </section>

            </div>
        </div>
    </div>
    <br>
    <br>

    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
@endsection