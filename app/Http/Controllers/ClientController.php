<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function getProductPage(Request $request)
    {

        if (isset($_GET['cat'])) {
            $products = Product::with('category')
                ->orWhere('category_id', '=', $_GET['cat'])
                ->orderBy("id", "desc")
                ->paginate(10);
        } else {
            if (empty($request->input('search'))) {
                $products = Product::orderBy("id", "desc")->paginate(10);
            } else {
                $search = $request->input('search');
                $products = Product::with('category')
                    ->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('price', 'LIKE', "%{$search}%")
                    ->orWhere('category_id', '=', $search)
                    ->orderBy("id", "desc")
                    ->paginate(10);
            }
        }

//        $products=Product::paginate(2);
        return view('clients.products', ['products' => $products]);
    }

}