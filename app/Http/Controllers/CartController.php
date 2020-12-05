<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($idProduct){
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->add($product);
        session()->put('cart',$cart);
        return back()->with('successAddToCart','Add successfully');
    }

    public function showCart(){
        $cart = session('cart');
        return view('cart',compact('cart'));
    }
}
