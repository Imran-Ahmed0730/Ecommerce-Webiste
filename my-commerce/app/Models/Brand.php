<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image, $imageUrl, $directory, $imageNewName;
    public static function saveBrand($request){
        if (Brand::find($request->id))
        {
            self::$brand= Brand::find($request->id);
            if ($request->file('image'))
            {
                if (self::$brand->image)
                {
                    if (file_exists(self::$brand->image))
                    {
                        unlink(self::$brand->image);
                        self::$brand->image = self::saveImage($request);
                    }
                }
                else
                {
                    self::$brand->image = self::saveImage($request);
                }
            }
        }
        else
        {
            self::$brand = new Brand();
            self::$brand->image = self::saveImage($request);
        }
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$directory = 'admin/assets/uploaded-images/brand/';
        self::$imageNewName = 'Brand'. '-'. $request->name.rand(). '.'. self::$image->Extension();
        self::$imageUrl = self::$directory. self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imageUrl;
    }

    public static function statusBrand($id){
        self::$brand = Brand::find($id);
        if (self::$brand->status == 1){
            self::$brand->status = 0;
        }
        else{
            self::$brand->status = 1;
        }
        self::$brand->save();
    }

    public static function deleteBrand($request){
        self::$brand = Brand::find($request->id);
        if (file_exists(self::$brand->image)){
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
