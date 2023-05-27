<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index(){
        return view('admin.unit.add-unit');
    }

    public function newUnit(Request $request){
        Unit::saveUnit($request);
        return redirect('/unit/manage')->with('message', 'Unit Added Successfully');
    }
    public function manage(){
        return view('admin.unit.manage-unit', [
            'units'=> Unit::all()
        ]);
    }
    public function editUnit($id){
        return view('admin.unit.edit-unit', [
            'unit'=>Unit::find($id)
        ]);
    }

    public function updateUnit(Request $request){
        Unit::saveUnit($request);
        return redirect('/unit/manage')->with('message', 'unit Updated Successfully');
    }
    public function statusUnit($id){
        Unit::statusUnit($id);
        return back()->with('message', 'Status Changed');
    }

    public function deleteUnit(Request $request){
        Unit::deleteUnit($request);
        return back()->with('message', 'unit Deleted Successfully');
    }
}
