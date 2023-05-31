<?php

namespace App\Models;

use Faker\Extension\Extension;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $category, $image, $imageUrl, $directory, $imageNewName;
    use HasFactory;
    public static function saveCategory($request){
        if (Category::find($request->id))
        {
            self::$category= Category::find($request->id);
            if ($request->file('image')){
                if (self::$category->image){
                    if (file_exists(self::$category->image)){
                        unlink(self::$category->image);
                        self::$category->image = self::saveImage($request);
                    }
                }
                else{
                    self::$category->image = self::saveImage($request);
                }
            }
        }
        else
        {
            self::$category = new Category();
            self::$category->image = self::saveImage($request);
        }
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;
        self::$category->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$directory = 'admin/assets/uploaded-images/category/';
        self::$imageNewName = 'Category'. '-'. $request->name.rand(). '.'. self::$image->Extension();
        self::$imageUrl = self::$directory. self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imageUrl;
    }

    public static function statusCategory($id){
        self::$category = Category::find($id);
        if (self::$category->status == 1){
            self::$category->status = 0;
        }
        else{
            self::$category->status = 1;
        }
        self::$category->save();
    }

    public static function deleteCategory($request){
        self::$category = Category::find($request->id);
        if (file_exists(self::$category->image)){
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subcategory(){
        return $this->hasMany(SubCategory::class);
    }
}
