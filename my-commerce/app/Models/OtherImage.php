<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $other_image, $other_images, $imageUrl, $directory, $imageNewName;
    public static function newOtherImage($images, $id){
        foreach ($images as $image){
            self::$other_image = new OtherImage();
            self::$other_image->product_id = $id;
            self::$other_image->image =  self::saveImage($image);
            self::$other_image->save();
        }
    }
    private static function saveImage($image){
        self::$imageNewName = 'Product'. '-'.rand(). '.'. $image->Extension();
        self::$directory = 'admin/assets/uploaded-images/Product/Other_Images/';
        self::$imageUrl = self::$directory. self::$imageNewName;
        $image->move(self::$directory, self::$imageNewName);
        return self::$imageUrl;
    }

    public static function UpdateOtherImages($images, $id){
        self::deleteOtherImage($id);
        self::newOtherImage($images, $id) ;
    }

    public static function deleteOtherImage($id){
        self::$other_images = OtherImage::where('product_id', $id)->get();
        foreach (self::$other_images  as $items){
            if (file_exists($items->image)){
                unlink($items->image);
            }
            $items->delete();
        }
    }
}
