<?php

?>

@extends('layouts.app')

@section('title')
    My-orders
@endsection
@section('content')

    <br>
    <div class="section" style="padding: 5px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="text-success">
                        <i class="fa fa-check-square"></i>
                        Check out
                    </h1>
                </div>
                <section class="col-sm-7">
                    <div class="panel panel-default flat" style="padding: 5px">
                    <h3>
                        Order summary
                    </h3>
                    <hr>
                    <h4>Products</h4>
                    <div class="total_area">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0; ?>
                            @foreach($cart as $cartItem)
                                <?php
                                $product = \App\Product::find($cartItem->id);
                                $total += $cartItem->subtotal;
                                ?>
                                <tr>
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
                                        <p>
                                            <?php print (float)$cartItem->qty; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ number_format($cartItem->subtotal) }}
                                            <small>Rwf / {{ $product->measure }} </small>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th colspan="3">
                                    Sub Total
                                </th>
                                <th>
                                    : {{ Cart::subTotal() }} Rwf
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
                                    Shipping
                                </th>
                                <th>
                                    : {{ number_format(1000) }} Rwf
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
                                    Total
                                </th>
                                <th>
                                    : {{ number_format($total+1000) }} Rwf
                                </th>
                            </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </section>
                <section class="cart-items col-md-5">
                    @if(Session::has('message'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success flat">
                                    <p>
                                        <i class="fa fa-check-circle"></i>
                                        {{ Session::get('message') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="total_area">
                                <div>
                                    <h3>
                                        Shipping information
                                    </h3>
                                </div>
                                <hr>
                                <h4>
                                    Total amount to pay
                                    <span class="label label-primary pull-right">
                                        {{ number_format($total+1000) }} Rwf
                                    </span>
                                </h4>
                                <form action="{{ route('cart.checkOut') }}" class="form-horizontal" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group  {{ $errors->has('clientName')?'has-error':''}} ">
                                        <div>
                                            <input type="text" placeholder="Full name"
                                                   value="{{Request::old('clientName')}}"
                                                   class="form-control flat" name="clientName"
                                                   id="clientName" maxlength="120">
                                        </div>
                                    </div>
                                    <div class="form-group  {{ $errors->has('email')?'has-error':''}} ">
                                        <div>
                                            <input type="email" placeholder="Email address"
                                                   value="{{Request::old('email')}}"
                                                   class="form-control flat" name="email"
                                                   id="email" maxlength="120">
                                        </div>
                                    </div>

                                    <div class="form-group  {{ $errors->has('shipping_address')?'has-error':''}} ">
                                        <div>
                                            <input type="text" placeholder="Shipping address"
                                                   value="{{Request::old('shipping_address')}}"
                                                   class="form-control flat" name="shipping_address"
                                                   id="shipping_address" maxlength="120">
                                        </div>
                                    </div>
                                    <div class="form-group  {{ $errors->has('phoneNumber')?'has-error':''}}">
                                        <div>
                                            <input type="text"
                                                   placeholder="Phone number"
                                                   value="{{Request::old('phoneNumber')}}" maxlength="13"
                                                   class="form-control flat" name="phoneNumber" id="phoneNumber">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary flat btn-block"><i
                                                        class="fa fa-check-square"></i>
                                                Confirm your order
                                            </button>

                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <br>
    <br>
@endsection