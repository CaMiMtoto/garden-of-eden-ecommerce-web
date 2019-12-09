<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function randomProducts()
    {
        $products = Product::with('category')
            ->limit(10)
            ->take(10)
            ->get()
            ->shuffle();
        return response($products, 200);
    }

    public function newProducts()
    {
        $products = Product::with('category')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        return response($products, 200);
    }


}
