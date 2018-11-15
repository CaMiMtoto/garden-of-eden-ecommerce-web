<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $order
 * @property mixed $product
 * @property int product_id
 * @property double price
 * @property int qty
 * @property double sub_total
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
