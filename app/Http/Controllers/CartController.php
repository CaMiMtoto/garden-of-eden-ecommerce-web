<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessOrder;
use App\Mail\SendMail;
use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $qty = $request->input('qty');
        if (!$qty) {
            $qty = 1;
        }
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price
        ]);
        $cartItem->associate('Product');

        return redirect()->back();
    }

    public function getShoppingCart()
    {
        $cart = Cart::content();
        return view('clients.carts', ['cart' => $cart]);
    }

    public function getIncrement(Request $request, $id)
    {
        $qty = $request->input('qty');
        if (!$qty) {
            $qty = 1;
        }
        $cartItem = Cart::get($id);
        Cart::update($id, $qty);
        return redirect()->route('cart.shoppingCart');
    }

    public function getDecrement(Request $request, $id)
    {
        $cartItem = Cart::get($id);
        Cart::update($id, $cartItem->qty - 1);
        return redirect()->route('cart.shoppingCart');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRemoveItem($id)
    {
        $cartItem = Cart::get($id);
        if ($cartItem->rowId === $id) {
            Cart::remove($id);
        }
        return redirect()->route('cart.shoppingCart');
    }

    public function getRemoveAll()
    {
        Cart::destroy();
        return redirect()->route('cart.shoppingCart');
    }

    public function checkOut()
    {
        if (Cart::count() == 0) {
            return redirect()->route('cart.shoppingCart');
        }

        return view('clients.check-out');
    }

    public function postCheckOut(Request $request)
    {
        $this->validate($request, [
            'phoneNumber' => 'required| min:10',
            'shipping_address' => 'required'
        ]);


        if (Cart::count() == 0) {
            return redirect()->back();
        }

        $cart = Cart::content();
        $order = new Order();
        $order->clientPhone = $request->input('phoneNumber');
        $order->shipping_address = $request->input('shipping_address');
//        $order->total_paid = Cart::subtotal();
        $order->status = "Pending";
        Auth::user()->orders()->save($order);
//        $order->save();
        foreach ($cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem->id;
            $orderItem->price = $cartItem->price;
            $orderItem->qty = $cartItem->qty;
            $orderItem->sub_total = $cartItem->subtotal;
            $order->orderItems()->save($orderItem);
        }

        //Send email to all users in background
        ProcessOrder::dispatch($order);

        Cart::destroy();
        return redirect()->route('my.orders')->with('message', " You successfully placed orders");
    }
}
