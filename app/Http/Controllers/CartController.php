<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{

    public function getAddToCart($id)
    {
        $product = Product::find($id);
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price
        ]);
        $cartItem->associate('Product');
//        dd($cartItem);
        return redirect()->back();
    }

    public function getShoppingCart()
    {
        $cart = Cart::content();
        return view('clients.carts', ['cart' => $cart]);
    }

    public function getIncrement($id)
    {
        $cartItem = Cart::get($id);
        Cart::update($id, $cartItem->qty + 1);
        return redirect()->route('cart.shoppingCart');
    }

    public function getDecrement($id)
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


    public function postCheckOut(Request $request)
    {
        $this->validate($request, [
            'phoneNumber' => 'required| min:10',
            'clientName' => 'required'
        ]);

        if (Cart::count() == 0) {
            return redirect()->back();
        }

        $cart = Cart::content();
        $order = new Order();
        $order->clientPhone = $request->input('phoneNumber');
        $order->clientName = $request->input('clientName');
//        $order->total_paid = Cart::subtotal();
        $order->status = "Pending";
        $order->save();
        foreach ($cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem->id;
            $orderItem->price = $cartItem->price;
            $orderItem->qty = $cartItem->qty;
            $orderItem->sub_total = $cartItem->subtotal;
            $order->orderItems()->save($orderItem);
        }

        $data = ['message' => $order];
        $users = User::all()->each(function ($user) {
            return $user->email;
        });
        Mail::to($users)->send(new SendMail($data));

        Cart::destroy();
        return redirect()->route('home')->with('message', " You successfully placed orders");
    }
}
