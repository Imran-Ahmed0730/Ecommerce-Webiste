<?php

namespace App\Http\Controllers;

use App\Models\OtherImage;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
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

    public function store(Request $request){
//        return $request->other_image;
        $this->product = Product::store($request);
        OtherImage::newOtherImage($request->other_image, $this->product->id);
        return redirect('/product/manage')->with('message', 'Product Added Successfully');
    }
    public function manage(){
        return view('admin.product.manage-product', [
            'products'=> Product::all()
        ]);
    }
    public function edit($id){
        return view('admin.product.edit-product', [
            'product'=>Product::find($id),
            'categories'=>Category::all(),
            'subcategories'=>SubCategory::all(),
            'brands'=>Brand::all(),
            'units'=>Unit::all()
        ]);
    }

    public function update(Request $request){
        Product::store($request);
        if ($request->other_image){
            OtherImage::UpdateOtherImages($request->other_image, $request->id);
        }
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

    public function detail($id){
        return view('admin.product.details-product',[
            'product'=>Product::find($id)
        ]);
    }
}
