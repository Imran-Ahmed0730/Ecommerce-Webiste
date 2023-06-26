<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public static $customer;
    public static function newCustomer($request){
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->mobile = $request->phone_number;
        self::$customer->password = bcrypt($request->phone_number);
        self::$customer->save();
        return self::$customer;
    }
}
