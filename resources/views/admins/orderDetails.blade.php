<style>
    .billing-history tbody > tr > td {
        padding: 10px;
    }

</style>



<div>
    <a target="_blank" href="{{ route('orders.printOrder',['id'=>$order->id]) }}" class="btn btn-primary btn-sm pull-right">
        <i class="fa fa-print"></i>
        Print order
    </a>
</div>

<div id="printOrder">
    <table class="table billing-history">
        <thead class="sr-only">
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
            <span>
                <b>Oder date</b>
            </span>
            </td>
            <td> : {{ date('j M Y h:i a', strtotime($order->created_at)) }}</td>
        </tr>
        <tr>
            <td>
            <span>
                <b>Client name</b>
            </span>
            </td>
            <td> : {{ $order->clientName }}</td>
        </tr>
        <tr>
            <td>
            <span>
            <b>Client phone</b>
            </span>
            </td>
            <td> : {{ \App\MyFunc::format_phone_us($order->clientPhone) }}</td>
        </tr>
        </tbody>
    </table>

    <h4 class="text-info">Products ordered</h4>
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->product->name }}</td>
                <td>{{ number_format($orderItem->price) }}</td>
                <td>{{ $orderItem->qty }}</td>
                <td>{{ number_format($orderItem->sub_total) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <table class="table billing-history">
        <thead class="sr-only">
        <tr>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>
            <span>
                <b>Total amount to Pay</b>
            </span>
            </td>
            <td> : <b>{{ number_format($order->orderItems->sum('sub_total')) }} Rwf</b></td>
        </tr>
        </tbody>
    </table>

</div>

{{ csrf_field() }}
<input type="hidden" value="{{ $order->id }}" name="id">
<div class="form-group">
    <label for="status" class="control-label col-sm-3">Status</label>
    <label for="status" class="control-label col-sm-1">:</label>
    <div class="col-sm-8">
        <select required class="form-control" name="status" id="status">
            <option value="">--mark order as--</option>
            <option value="Pending" {{ $order->status=="Pending"? 'selected':'' }}>Pending</option>
            <option value="Processing" {{ $order->status=="Processing"? 'selected':'' }}>Processing</option>
            <option value="Delivered" {{ $order->status=="Delivered"? 'selected':'' }}>Delivered</option>
        </select>
    </div>
</div>