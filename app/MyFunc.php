<?php
/**
 * Created by PhpStorm.
 * User: CaMi
 * Date: 7/20/2018
 * Time: 4:35 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class MyFunc
{
    public static function format_phone_us($phone)
    {
        // note: making sure we have something
        if (!isset($phone{3})) {
            return '';
        }
        // note: strip out everything but numbers
        $phone = preg_replace("/[^0-9]/", "", $phone);
        $length = strlen($phone);
        switch ($length) {
            case 7:
                return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
                break;
            case 10:
                return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
                break;
            case 11:
                return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
                break;
            default:
                return $phone;
                break;
        }
    }

    static function counts($table)
    {
        return DB::table($table)->count();
    }

    static function countOrdersByStatus($status)
    {
        return DB::table('orders')
            ->where('status', $status)->count();
    }

    static function countOrdersByStatusPercentage($status)
    {
        $totalByStatus = self::countOrdersByStatus($status);
        $totalOrders = self::counts("orders");
        return ($totalByStatus * 100) /( $totalOrders > 0 ? $totalOrders : 1);
    }

    static function recentOrders()
    {
        return Order::with('orderItems')
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
    }

    static function topSellingProducts()
    {
        return DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->select(DB::raw('products.name,count(products.id) AS total'))
            ->where('orders.status', '=', "Delivered")
            ->groupBy('products.id')
            ->groupBy('products.name')
            ->orderByDesc("total")
            ->orderBy("products.name")
            ->limit(6)->get();

    }

    static function totalClients()
    {
        return count(
            DB::table('orders')
//                ->where('status', '=', "Delivered")
                ->select('clientName')
                ->groupBy('clientName')
                ->get()
        );
    }

    static function toMoneyIncome()
    {
        return DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', '=', "Delivered")
            ->sum("order_items.sub_total");

    }
    static function getDefaultSetting(){
        $setting = Setting::orderBy('id', 'asc')->limit(1)->first();
        return $setting;
    }
}