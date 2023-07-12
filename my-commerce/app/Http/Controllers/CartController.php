<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{
    private $product;
    public function index(Request $request, $id){
//        return Product::find($id);
        $this->product = Product::find($id);
        ShoppingCart::add($this->product->id,
            $this->product->name,
            $request->qty,
            $this->product->selling_price,
            [
                'feature_image' => $this->product->feature_image,
                'category'=>$this->product->category->name,
                'brand'=> $this->product->brand->name
                ]);
        return redirect('/show-cart');
    }
    public function show(){
//        return ShoppingCart::all();
        return view('website.cart.cart', [
            'cart_products'=>ShoppingCart::all()
        ]);
    }
    public function update( Request $request, $id){
//        return $request;
        ShoppingCart::update($id, $request->qty);
        return back()->with('message', 'Item Updated');
    }
    public function removeFromCart($id){
        ShoppingCart::remove($id);
        return back()->with('message', 'Item Removed');
    }
}
