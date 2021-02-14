@component('mail::message')
# Order status changed

<br>
@if($order->status==\App\Order::PENDING)
    <p>
        <strong>{{ $user->name }}</strong> : changed your order status
    </p>
@elseif($order->status==\App\Order::PROCESSING)
    <p>
        <strong>{{ $user->name }}</strong> is processing your order
    </p>
@elseif($order->status==\App\Order::SHIPPED)
    <p>
        Order is on its way.
        <strong>{{ $user->name }}</strong> shipped your order.
    </p>
@elseif($order->status==\App\Order::DELIVERED)
    <p>
        Order delivered,
        <strong>{{ $user->name }}</strong> delivered your order.
    </p>
@elseif($order->status==\App\Order::CANCELLED)
    <p>
         Order cancelled.
        <strong>{{ $user->name }}</strong> cancels your order.
    </p>
@endif
<span>{{ $order->updated_at->format('j M Y h:i a') }}</span>
<br>

@component('mail::table')
    <table class="table">
        <tbody>
        <tr><td><span><b>Oder status</b></span></td>
            <td> :
                @if($order->status==\App\Order::PENDING)
                    <span class="label label-info rounded-pill">{{ $order->status }}</span>
                @elseif($order->status==\App\Order::PROCESSING)
                    <span class="label label-info rounded-pill">{{ $order->status }}</span>
                @elseif($order->status==\App\Order::SHIPPED)
                    <span class="label label-primary rounded-pill">{{ $order->status }}</span>
                @elseif($order->status==\App\Order::DELIVERED)
                    <span class="label label-success rounded-pill">{{ $order->status }}</span>
                @elseif($order->status==\App\Order::CANCELLED)
                    <span class="label label-danger rounded-pill">{{ $order->status }}</span>
                @endif
            </td>
        </tr>
        <tr><td><span><b>Oder No</b></span></td><td> : {{ $order->order_no }}</td></tr>
        <tr><td><span><b>Oder date</b></span></td><td> : {{ $order->created_at->format('j M Y h:i a') }}</td></tr>
        <tr>
            <td>
        <span>
        <b>Shipping address</b>
        </span>
            </td>
            <td> : {{ $order->shipping_address}}</td>
        </tr>
        </tbody>
    </table>
@endcomponent

<br>
<br>

@component('mail::button', ['url' => url('/'),'color' => 'success'])
    Place your order again
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent