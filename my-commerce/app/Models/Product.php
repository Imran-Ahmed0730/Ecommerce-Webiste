<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product, $image, $imageUrl, $directory, $imageNewName;
    protected $fillable = ['name', 'feature_image', 'description', 'status'];
    public static function store($request){
        if (Product::find($request->id))
        {
            self::$product= Product::find($request->id);
            if ($request->file('feature_image'))
            {
                if (self::$product->feature_image)
                {
                    if (file_exists(self::$product->feature_image))
                    {
                        unlink(self::$product->feature_image);
                        self::$product->feature_image = self::saveImage($request);
                    }
                }
                else
                {
                    self::$product->feature_image = self::saveImage($request);
                }
            }
        }
        else
        {
            self::$product = new Product();
            self::$product->feature_image = self::saveImage($request);
        }
        self::$product->category_id = $request->category_id;
        self::$product->subcategory_id = $request->subcategory_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->model = $request->model;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->status = $request->status;
        self::$product->save();

        return self::$product;
    }

    private static function saveImage($request){
        self::$image = $request->file('feature_image');
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

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function otherImages(){
        return $this->hasMany(OtherImage::class);
    }
}
