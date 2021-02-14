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
 * @property string notes
 * @property mixed order_no
 */
class Order extends Model
{
    public static $shippingCharge = 1000;
    const PENDING = 'Pending';
    const PROCESSING = 'Processing';
    const SHIPPED = 'Shipped';
    const DELIVERED = 'Delivered';
    const CANCELLED = 'Cancelled';


    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTotalAmountToPay()
    {
        return $this->orderItems->sum('sub_total') + $this->shipping_amount;
    }

    public static function getStatuses(): array
    {

        return [self::PENDING, self::PROCESSING, self::SHIPPED, self::DELIVERED, self::CANCELLED];
    }

    public function setOrderNo(string $prefix='ORD', $pad_string = '0', int $len = 8)
    {
        $orderNo = $prefix . str_pad($this->id, $len, $pad_string, STR_PAD_LEFT);
        $this->order_no = $orderNo;
        $this->update();
    }
}
