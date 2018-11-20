<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $order_items
 * @property mixed $user
 * @property array|null|string clientPhone
 * @property array|null|string shipping_address
 * @property string status
 * @property array|null|string clientName
 * @property double shipping_amount
 * @property array|null|string email
 */
class Order extends Model
{
    public static $shippingCharge=1000;
    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getTotalAmountToPay(){
        return $this->orderItems->sum('sub_total')+$this->shipping_amount;
    }
}
