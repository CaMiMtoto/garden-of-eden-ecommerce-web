<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $order_items
 * @property mixed $category
 */
class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
}
