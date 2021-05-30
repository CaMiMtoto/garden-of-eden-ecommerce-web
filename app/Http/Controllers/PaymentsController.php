<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessOrder;
use App\MyFunc;
use App\Order;
use App\OrderItem;
use App\Payment;
use Cart;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class PaymentsController extends Controller
{
    /**
     * @throws Throwable
     */
    public function paymentSuccess(Request $request, $orderId): JsonResponse
    {
        $order = Order::find(decryptId($orderId));
        $payment = new Payment();
        $payment->transaction_id = $request->input('transaction_id');
        $payment->tx_ref = $request->input('tx_ref');
        $payment->flw_ref = $request->input('flw_ref');
        $payment->amount = $request->input('amount');
        $payment->currency = $request->input('currency');
        $payment->status = $request->input('status');
        $order->payments()->save($payment);

        return response()->json(['url' => route('order.success', ['id' => encryptId($order->id)])]);
    }

    public function payWithCard($id)
    {
        $order = Order::find(decryptId($id));

        return view('clients.pay_card', compact('order'));

    }
}
