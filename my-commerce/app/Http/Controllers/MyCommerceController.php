<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index(){
        return view('website.home.home', [
            'products'=>Product::orderBy('id', 'desc')->take('8')->get()
        ]);
    }

    public function category($id){
//        return Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('website.category.category', [
            'products'=>Product::where('category_id', $id)->orderBy('id', 'desc')->get()
        ]);
    }
    public function details($id){
        return view('website.details.details', [
            'product'=>Product::where('id', $id)->get()
        ]);
    }
}
