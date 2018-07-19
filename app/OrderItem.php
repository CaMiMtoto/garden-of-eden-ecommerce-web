<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $order
 * @property mixed $product
 */
class OrderItem extends Model
{
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
