<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.add-Product',[
            'categories'=>Category::all(),
            'subcategories'=>SubCategory::all(),
            'brands'=>Brand::all(),
            'units'=>Unit::all()
        ]);
    }

    public function getSubCategoryByCategory(){
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function new(Request $request){
        Product::store($request);
        return redirect('/product/manage')->with('message', 'Product Added Successfully');
    }
    public function manage(){
        return view('admin.product.manage-product', [
            'products'=> Product::all()
        ]);
    }
    public function edit($id){
        return view('admin.product.edit-product', [
            'product'=>Product::find($id)
        ]);
    }

    public function update(Request $request){
//        return $request;
        Product::store($request);
        return redirect('/product/manage')->with('message', 'Product Updated Successfully');
    }
    public function status($id){
        Product::status($id);
        return back()->with('message', 'Status Changed');
    }

    public function delete(Request $request){
        Product::remove($request);
        return back()->with('message', 'Product Deleted Successfully');
    }
}
