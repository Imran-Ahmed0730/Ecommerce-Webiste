<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name', 'code', 'description', 'status'];
    private static $unit;
    use HasFactory;
    public static function saveUnit($request){
        if (Unit::find($request->id))
        {
            self::$unit= Unit::find($request->id);
        }
        else
        {
            self::$unit = new Unit();
        }
        self::$unit->name = $request->name;
        self::$unit->code = $request->code;
        self::$unit->description = $request->description;
        self::$unit->status = $request->status;
        self::$unit->save();
    }

    public static function statusUnit($id){
        self::$unit = Unit::find($id);
        if (self::$unit->status == 1){
            self::$unit->status = 0;
        }
        else{
            self::$unit->status = 1;
        }
        self::$unit->save();
    }

    public static function deleteUnit($request){
        self::$unit = Unit::find($request->id);
        if (file_exists(self::$unit->image)){
            unlink(self::$unit->image);
        }
        self::$unit->delete();
    }
}
