<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product, $image, $imageUrl, $directory, $imageNewName;
    protected $fillable = ['name', 'image', 'description', 'status'];
    public static function store($request){
        if (Product::find($request->id))
        {
            self::$product= Product::find($request->id);
            if ($request->file('image'))
            {
                if (self::$product->image)
                {
                    if (file_exists(self::$product->image))
                    {
                        unlink(self::$product->image);
                        self::$product->image = self::saveImage($request);
                    }
                }
                else
                {
                    self::$product->image = self::saveImage($request);
                }
            }
        }
        else
        {
            self::$product = new Product();
            self::$product->image = self::saveImage($request);
        }
        self::$product->name = $request->name;
        self::$product->description = $request->description;
        self::$product->status = $request->status;
        self::$product->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$directory = 'admin/assets/uploaded-images/Product/';
        self::$imageNewName = 'Product'. '-'. $request->name.rand(). '.'. self::$image->Extension();
        self::$imageUrl = self::$directory. self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imageUrl;
    }

    public static function status($id){
        self::$product = Product::find($id);
        if (self::$product->status == 1){
            self::$product->status = 0;
        }
        else{
            self::$product->status = 1;
        }
        self::$product->save();
    }

    public static function remove($request){
        self::$product = Product::find($request->id);
        if (file_exists(self::$product->image)){
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
}
