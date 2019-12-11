<?php

use Illuminate\Support\Facades\Route;


Route::namespace('API')->group(function () {
    Route::get('/home/products', 'HomeController@products');
    Route::get('/categories', 'CategoriesController@index');
    Route::get('/products/category/{category}', 'ProductsController@productsByCategory');
    Route::get('/products', 'ProductsController@searchProduct');
    Route::post('/orders/checkout', 'OrdersController@checkOut');
});