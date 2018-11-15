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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('/getProduct', 'ClientController@getProductPage')->name('getProduct');

Route::get('/login', 'UsersController@login')->name('login');
Route::post('/admin/login', 'UsersController@postLogin')->name('post.login');

Route::get('/customer/register', 'ClientController@register')->name('register');
Route::post('/customer/register', 'ClientController@createAccount')->name('client.create');


Route::get('/addToCart/{id}', ['uses' => 'CartController@getAddToCart', 'as' => 'cart.addToCart']);
Route::get('/shoppingCart', ['uses' => 'CartController@getShoppingCart', 'as' => 'cart.shoppingCart']);

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


Route::group(['prefix' => 'customer', 'middleware' => ['auth']], function () {
    Route::get('/profile', 'ClientController@profile')
        ->name('my.profile');
    Route::get('/orders', 'ClientController@orders')
        ->name('my.orders');
    Route::post('/myOrders', 'ClientController@myOrders')
        ->name('myOrders');

    Route::get('/check-out', [
        'uses' => 'CartController@checkOut',
        'as' => 'cart.get.checkout'
    ]);

    Route::post('/check-out', [
        'uses' => 'CartController@postCheckOut',
        'as' => 'cart.checkOut'
    ]);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/', 'HomeController@dashboard')->name('dashboard');

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
    Route::delete('/products/delete_selected', 'ProductsController@deleteSelected')->name('products.delete.selected');
    Route::post('/products/store', 'ProductsController@store')->name('products.store');
    Route::post('/products/update', 'ProductsController@update')->name('products.update');
    Route::get('/products/show/{id}', 'ProductsController@show')->name('products.show');

    //orders routes
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
    Route::get('/orders/print/{id}', 'OrderController@printOrder')->name('orders.printOrder');
    Route::post('/orders/all', 'OrderController@all')->name('orders.all');
    Route::put('/orders/mark', 'OrderController@mark')->name('orders.mark');

    Route::get('/logOut', 'UsersController@logOut')->name('logout');

    //users routes
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::post('/users/all', 'UsersController@all')->name('users.all');
    Route::delete('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');
    Route::post('/users/store', 'UsersController@store')->name('users.store');
    Route::put('/users/update', 'UsersController@update')->name('users.update');
    Route::get('/users/show/{id}', 'UsersController@show')->name('users.show');
    //events routes
    Route::get('/events', 'EventController@index')->name('events.index');
    Route::post('/events/all', 'EventController@all')->name('events.all');

    Route::put('/events/update', 'EventController@update')->name('events.update');
    Route::get('/events/show/{id}', 'EventController@show')->name('events.show');

});

