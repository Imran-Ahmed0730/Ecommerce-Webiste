<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShoppingCart;
class OrderDetail extends Model
{
    use HasFactory;
    private static $orderDetails;
    public static function newOrderDetails($order_id){
        foreach (ShoppingCart::all() as $item){
            self::$orderDetails = new OrderDetail();
            self::$orderDetails->order_id = $order_id;
            self::$orderDetails->product_id = $item->id;
            self::$orderDetails->product_name = $item->name;
            self::$orderDetails->product_quantity = $item->qty;
            self::$orderDetails->product_price = $item->price;
            self::$orderDetails->save();
            ShoppingCart::remove($item->__raw_id);
        }
    }

    public static function remove($id){
        self::$orderDetails = OrderDetail::where('order_id', $id)->get();
        foreach (self::$orderDetails as $items){
            $items->delete();
        }
    }

}
