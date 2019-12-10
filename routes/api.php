<?php

use Illuminate\Support\Facades\Route;


Route::namespace('API')->group(function () {
    Route::get('/home/products', 'HomeController@products');
});