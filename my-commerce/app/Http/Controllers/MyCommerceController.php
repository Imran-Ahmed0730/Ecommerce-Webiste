<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index(){
        return view('website.home.home');
    }

    public function category(){
        return view('website.category.category');
    }
    public function details(){
        return view('website.details.details');
    }
}
