<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $order_items
 * @property mixed $category
 * @property string image
 * @property mixed status
 * @property mixed description
 * @property mixed minStock
 * @property mixed measure
 * @property mixed qty
 * @property mixed price
 * @property mixed name
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed discount
 */
class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }


    public function getRealPrice()
    {
        if ($this->discount > 0) {
            return $this->price - $this->getDiscountPercent();
        }
        return $this->price;
    }

    public function getDiscountPercent()
    {
        return ($this->price * $this->discount) / 100;
    }
    public function getDescriptionAttribute($value){
        return trim($value);
    }
}
