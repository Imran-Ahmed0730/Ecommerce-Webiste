<?php

namespace App\Http\Controllers;

use App\Models\OtherImage;
use App\Models\Product;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index(){
        return view('website.home.home', [
            'products'=>Product::orderBy('id', 'desc')->take('8')->get()
        ]);
    }

    public function productCategory($id){
//        return Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('website.category.category', [
            'products'=>Product::where('category_id', $id)->orderBy('id', 'desc')->get(),
        ]);
    }
    public function productSubCategory($id){
//        return Product::where('subcategory_id', $id)->orderBy('id', 'desc')->get();
        return view('website.subcategory.subcategory', [
            'products'=>Product::where('subcategory_id', $id)->orderBy('id', 'desc')->get(),
        ]);
    }
    public function details($id){
        return view('website.details.details', [
            'product'=>Product::find($id),
        ]);
    }
}
