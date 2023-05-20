<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.subcategory.add-subcategory', [
            'categories'=>Category::all()
        ]);
    }

    public function newSubCategory(Request $request){
//        return $request;
        SubCategory::saveSubCategory($request);
        return back()->with('message', 'SubCategory Added Successfully');
    }
    public function manage(){
        return view('admin.subcategory.manage-subcategory', [
            'subcategories'=> SubCategory::all()
        ]);
    }
    public function editSubCategory($id){
        return view('admin.subcategory.edit-subcategory', [
            'SubCategory'=>SubCategory::find($id)
        ]);
    }

    public function updateSubCategory(Request $request){
        SubCategory::saveSubCategory($request);
        return back();
    }
    public function statusSubCategory($id){
        SubCategory::statusSubCategory($id);
        return back();
    }

    public function deleteSubCategory(Request $request){
        SubCategory::deleteSubCategory($request);
        return back();
    }
}
