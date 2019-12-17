<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    public function productsByCategory(Category $category)
    {
        $products=Product::with('category')
            ->where('category_id',$category->id)
            ->paginate(10);
        return response($products);
    }

    public function allProducts(Request $request)
    {
        $products=Product::with('category')
            ->paginate(20);
        return response($products);
    }


    public function searchProduct(Request $request)
    {
        if (empty($request->input('q'))) {
            $products = Product::with('category')
                ->orderBy("id", "desc")
                ->paginate(20);
        } else {
            $search = $request->input('q');
            $products = Product::with('category')
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orderBy("id", "desc")
                ->paginate(20);
            $products->appends(['q' => $search]);
        }
        return response($products,200);
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
