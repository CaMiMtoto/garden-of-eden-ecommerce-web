<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessOrder;
use App\Order;
use App\OrderItem;
use App\Payment;
use Cart;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class PaymentsController extends Controller
{
    /**
     * @throws Throwable
     */
    public function paymentSuccess(Request $request): JsonResponse
    {
        DB::beginTransaction();
        $order = new Order();
        $order->clientPhone = $request->input('customer.phone_number');
        $order->email = $request->input('customer.email');
        $order->shipping_address = $request->input('customer.shipping_address');
        $order->clientName = $request->input('customer.name');
        $order->shipping_amount = 1000;
        $order->status = "Pending";
        $order->payment_type = $request->input('customer.payment_type');
        $order->notes = $request->input('customer.notes');
        $order->save();

        $cart = Cart::getContent();
        foreach ($cart as $cartItem)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem->id;
            $orderItem->price = $cartItem->price;
            $orderItem->qty = $cartItem->quantity;
            $orderItem->sub_total = $cartItem->getPriceSum();
            $order->orderItems()->save($orderItem);
        }

        $order->setOrderNo('ORD');

        $payment = new Payment();
        $payment->transaction_id = $request->input('transaction_id');
        $payment->tx_ref = $request->input('tx_ref');
        $payment->flw_ref = $request->input('flw_ref');
        $payment->amount = $request->input('amount');
        $payment->currency = $request->input('currency');
        $payment->status = $request->input('status');
        $order->payments()->save($payment);

        DB::commit();

        ProcessOrder::dispatch($order);

        Cart::clear();
        return response()->json(['url' => route('order.success', ['id' => $order->id])]);

    }
}
