<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{

    public function randomProducts()
    {
        $products= Product::with('category')
            ->limit(4)
            ->get()
            ->shuffle();
        return response($products,200);
    }

    public function newProducts()
    {
        $products= Product::with('category')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        return response($products,200);
    }

    public function products()
    {
        $arrays = array(
            'random' => $this->randomProducts(),
            'new' => $this->newProducts()
        );
        return response($arrays,200);
    }


}
