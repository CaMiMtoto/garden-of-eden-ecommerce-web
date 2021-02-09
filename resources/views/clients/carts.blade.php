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

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="color-primary">
                                <i class="fa fa-shopping-bag"></i> Shopping cart
                            </h3>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>
                                        Items in your shopping cart
                                    </h4>
                                </div>
                                @if(count($cart))
                                    <div class="table-responsive">
                                        <table class="table table-hover table-condensed ">
                                            <thead>
                                            <tr class="">
                                                <th class="hidden-xs">Image</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th style="width: 120px;">Quantity</th>
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
                                                                     class="img-responsive img-thumbnail img-circle"
                                                                     style="height: 50px ;width: 50px;object-fit: cover">
                                                            </a>
                                                        </h4>
                                                    </td>
                                                    <td>
                                                        <h5>{{ $cartItem->name }}</h5>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            {{ number_format($cartItem->price) }}
                                                            <small>Rwf</small> /
                                                            {{ $product->measure }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <form class="form-inline"
                                                              action="{{ route('cart.increment',['id'=>$cartItem->id]) }}">

                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="qty"
                                                                       placeholder="Quantity" min="0.5"
                                                                       value="{{ (float)$cartItem->quantity }}">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-cart text-capitalize"
                                                                            title="Click here to update Quantity."
                                                                            data-toggle="tooltip" data-placement="right"
                                                                            type="submit">
                                                                        <span class="fa fa-refresh"></span>
                                                                    </button>
                                                                  </span>
                                                            </div>
                                                        </form>

                                                    </td>

                                                    <td>
                                                        <p>
                                                            {{ number_format($cartItem->quantity*$cartItem->price) }}
                                                            <small>Rwf</small>
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <a class="cart-remove-btn btn-xs btn-default btn"
                                                           title="Click here to remove Item."
                                                           data-toggle="tooltip" data-placement="left"
                                                           href="{{ route('cart.removeItem',['id'=>$cartItem->id]) }}">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="6">
                                                    <a class="btn btn-default pull-right"
                                                       href="{{route('cart.removeAll')}}">
                                                        <i class="fa fa-remove"></i>
                                                        Remove all items
                                                    </a>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-warning flat text-center">
                                        <h2><i class="fa fa-warning"></i> You have no items in the shopping basket
                                        </h2>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-3">
                            <ul class="list-group">

                                <li class="list-group-item">
                                    Sub total
                                    <span class="badge">
                                        {{ number_format(Cart::getSubTotal()) }} RWF
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    Shipping amount
                                    <span class="pull-right" style=" background: white">
                                        +{{ number_format(1000) }} RWF
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    Total
                                    <span class="pull-right" style=" background: white">
                                        +{{ number_format(Cart::getSubTotal()+1000) }} RWF
                                    </span>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('cart.get.checkout') }}"
                                       class="btn btn-success btn-block center-block">
                                        <i class="fa fa-shopping-bag"></i>
                                        Check out
                                    </a>
                                    <span class="clearfix"></span>
                                </li>
                            </ul>
                        </div>
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
