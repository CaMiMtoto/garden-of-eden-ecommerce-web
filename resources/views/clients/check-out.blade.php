<?php

?>

@extends('layouts.app')

@section('title')
    My-orders
@endsection
@section('content')

    <br>
    <div class="section">
        <div class="container">
            <div class="row">
                <section class="cart-items col-md-12">
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
                </section>
                <div class="col-md-12">
                    <h4>Check out</h4>
                    <div class="total_area">
                        <div>
                            <h3>
                                <i class="fa fa-map-o"></i>
                                Shipping information
                            </h3>
                        </div>
                        <hr>
                        <h4>
                            Total amount to pay:
                            <span class="label label-success">{{ Cart::subtotal()  }} Rwf</span>
                        </h4>
                        <hr>
                        <form action="{{ route('cart.checkOut') }}" class="form-horizontal" method="post">
                            {{ csrf_field() }}

                            <div class="form-group  {{ $errors->has('shipping_address')?'has-error':''}} ">
                                <div>
                                    <input type="text" required placeholder="Shipping address" value="{{Request::old('shipping_address')}}" class="form-control flat" name="shipping_address" id="shipping_address" maxlength="120">
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('phoneNumber')?'has-error':''}}">
                                <div>
                                    <input type="text" required
                                           placeholder="Phone number"
                                           value="{{Request::old('phoneNumber')}}" maxlength="13" class="form-control flat" name="phoneNumber" id="phoneNumber">
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-cart flat btn-block"><i class="fa fa-check-circle"></i> Confirm your order</button>

                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>


@endsection