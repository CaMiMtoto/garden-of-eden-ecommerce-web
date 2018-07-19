<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/getProduct', 'ClientController@getProductPage')->name('getProduct');


Route::get('/addToCart/{id}', [
    'uses' => 'CartController@getAddToCart',
    'as' => 'cart.addToCart'
]);
Route::get('/shoppingCart', [
    'uses' => 'CartController@getShoppingCart',
    'as' => 'cart.shoppingCart'
]);

Route::get('/remove/cart/item/{id}', [
    'uses' => 'CartController@getRemoveItem',
    'as' => 'cart.removeItem'
]);
Route::get('/remove/cart', [
    'uses' => 'CartController@getRemoveAll',
    'as' => 'cart.removeAll'
]);

Route::get('/increment/cart/item/{id}', [
    'uses' => 'CartController@getIncrement',
    'as' => 'cart.increment'
]);

Route::get('/decrement/cart/item/{id}', [
    'uses' => 'CartController@getDecrement',
    'as' => 'cart.decrement'
]);

Route::post('/checkOut', [
    'uses' => 'CartController@postCheckOut',
    'as' => 'cart.checkOut'
]);


Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    //categories routes
    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::post('/categories/all', 'CategoryController@all')->name('category.all');
    Route::delete('/categories/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::post('/categories/store', 'CategoryController@store')->name('category.store');
    Route::put('/categories/update', 'CategoryController@update')->name('category.update');
    Route::get('/categories/show/{id}', 'CategoryController@show')->name('category.show');

    //products routes
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::post('/products/all', 'ProductsController@all')->name('products.all');
    Route::delete('/products/destroy/{id}', 'ProductsController@destroy')->name('products.destroy');
    Route::post('/products/store', 'ProductsController@store')->name('products.store');
    Route::post('/products/update', 'ProductsController@update')->name('products.update');
    Route::get('/products/show/{id}', 'ProductsController@show')->name('products.show');

    //orders routes
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
    Route::post('/orders/all', 'OrderController@all')->name('orders.all');
    Route::put('/orders/mark', 'OrderController@mark')->name('orders.mark');
});

