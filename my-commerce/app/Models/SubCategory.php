<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subcategory, $image, $imageUrl, $directory, $imageNewName;
    use HasFactory;
    public static function saveSubCategory($request){
        if (subcategory::find($request->id))
        {
            self::$subcategory= SubCategory::find($request->id);
            if ($request->file('image')){
                if (self::$subcategory->image){
                    if (file_exists(self::$subcategory->image)){
                        unlink(self::$subcategory->image);
                        self::$subcategory->image = self::saveImage($request);
                    }
                }
                else{
                    self::$subcategory->image = self::saveImage($request);
                }
            }
        }
        else
        {
            self::$subcategory = new SubCategory();
            self::$subcategory->image = self::saveImage($request);
        }
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;
        self::$subcategory->status = $request->status;
        self::$subcategory->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$directory = 'admin/assets/uploaded-images/subcategory/';
        self::$imageNewName = 'subcategory'. '-'. $request->name.rand(). '.'. self::$image->Extension();
        self::$imageUrl = self::$directory. self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imageUrl;
    }

    public static function statusSubCategory($id){
        self::$subcategory = SubCategory::find($id);
        if (self::$subcategory->status == 1){
            self::$subcategory->status = 0;
        }
        else{
            self::$subcategory->status = 1;
        }
        self::$subcategory->save();
    }

    public static function deleteSubCategory($request){
        self::$subcategory = SubCategory::find($request->id);
        if (file_exists(self::$subcategory->image)){
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();
    }
}
