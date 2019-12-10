<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{

    private function randomProducts()
    {
        return Product::with('category')
            ->limit(10)
            ->take(10)
            ->get()
            ->shuffle();
    }

    private function newProducts()
    {
        return Product::with('category')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
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
