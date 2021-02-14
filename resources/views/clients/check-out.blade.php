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
                    <h3 class="text-success">
                        <i class="fa fa-check-square"></i>
                        Check out
                    </h3>
                </div>
                <section class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>
                                Order summary
                            </h4>
                        </div>
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
                                                {{ $cartItem->quantity }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                {{ number_format($cartItem->getPriceSum()) }}
                                                <small>Rwf / {{ $cartItem->associatedModel->measure }} </small>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="3">
                                        Sub Total :
                                    </th>
                                    <th>
                                        {{ number_format(Cart::getSubTotal()) }} Rwf
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3">
                                        Shipping:
                                    </th>
                                    <th>
                                        + {{ number_format(1000) }} Rwf
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3">
                                        Total:
                                    </th>
                                    <th>
                                        <span class="label label-success">{{ number_format(Cart::getSubTotal()+1000) }} Rwf</span>
                                    </th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </section>
                <section class="col-md-5">
                    @if(Session::has('message'))
                        <div class="alert alert-success flat">
                            <p>
                                <i class="fa fa-check-circle"></i>
                                {{ Session::get('message') }}
                            </p>
                        </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>
                                <h3>
                                    Shipping information
                                </h3>
                            </div>

                            <h4>
                                Total amount to pay
                                <span class="label label-primary pull-right">
                                        {{ number_format(Cart::getSubTotal()+1000) }} Rwf
                                    </span>
                            </h4>
                            <form action="{{ route('cart.checkOut') }}"
                                  class="" method="post">
                                @csrf

                                <div class="form-group  {{ $errors->has('clientName')?'has-error':''}} ">
                                    <label for="clientName" class="control-label">Name</label>
                                    <input type="text" placeholder="Full name"
                                           value="{{Request::old('clientName')}}"
                                           class="form-control" name="clientName"
                                           id="clientName" maxlength="120">
                                    @if ($errors->has('clientName'))
                                        <span class="help-block">
                                                    {{ $errors->first('clientName') }}
                                                </span>
                                    @endif
                                </div>
                                <div class="form-group  {{ $errors->has('email')?'has-error':''}} ">
                                    <label for="email" class="control-label">Email</label>
                                    <div>
                                        <input type="email" placeholder="Email address"
                                               value="{{Request::old('email')}}"
                                               class="form-control" name="email"
                                               id="email" maxlength="120">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                    {{ $errors->first('email') }}
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group  {{ $errors->has('shipping_address')?'has-error':''}} ">
                                    <label for="shipping_address" class="control-label">Address</label>
                                    <input type="text" placeholder="Shipping address"
                                           value="{{Request::old('shipping_address')}}"
                                           class="form-control" name="shipping_address"
                                           id="shipping_address" maxlength="120">
                                    @if ($errors->has('shipping_address'))
                                        <span class="help-block">
                                                   {{ $errors->first('shipping_address') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group  {{ $errors->has('phoneNumber')?'has-error':''}}">
                                    <label for="phoneNumber" class="control-label">Phone</label>
                                    <input type="text"
                                           placeholder="Phone number"
                                           value="{{Request::old('phoneNumber')}}" maxlength="13"
                                           class="form-control" name="phoneNumber" id="phoneNumber">
                                    @if ($errors->has('phoneNumber'))
                                        <span class="help-block">
                                                  {{ $errors->first('phoneNumber') }}
                                                </span>
                                    @endif
                                </div>
                                <div class="form-group  {{ $errors->has('notes')?'has-error':''}}">
                                    <label for="notes" class="control-label">Note</label>
                                    <textarea rows="5"
                                            style="resize: vertical"
                                            placeholder="Write something extra here.. like notes. (Optional)"
                                            class="form-control " name="notes"
                                            id="notes">{{Request::old('notes')}}</textarea>
                                    @if ($errors->has('notes'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('notes') }}</strong>
                                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                            <i class="fa fa-check-square"></i>
                                            Confirm your order
                                        </button>

                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
