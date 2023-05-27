<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.add-brand');
    }

    public function newBrand(Request $request){
        Brand::saveBrand($request);
        return redirect('/brand/manage')->with('message', 'Brand Added Successfully');
    }
    public function manage(){
        return view('admin.brand.manage-brand', [
            'brands'=> Brand::all()
        ]);
    }
    public function editBrand($id){
        return view('admin.brand.edit-brand', [
            'brand'=>Brand::find($id)
        ]);
    }

    public function updateBrand(Request $request){
//        return $request;
        Brand::saveBrand($request);
        return redirect('/brand/manage')->with('message', 'Brand Updated Successfully');
    }
    public function statusBrand($id){
        Brand::statusBrand($id);
        return back()->with('message', 'Status Changed');
    }

    public function deleteBrand(Request $request){
        Brand::deleteBrand($request);
        return back()->with('message', 'Brand Deleted Successfully');
    }
}
