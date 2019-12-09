<?php

use Illuminate\Support\Facades\Route;


Route::namespace('API')->group(function () {
    Route::get('/products/random', 'HomeController@randomProducts');
    Route::get('/products/new', 'HomeController@newProducts');
});