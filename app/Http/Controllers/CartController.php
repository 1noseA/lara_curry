<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('carts.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request['product_id'])->first();
        if (isset($cart)) {
            $cart->update(['quantity' => $cart->quantity + $request['quantity']]);
        } else{
            $cart = Cart::create(['user_id' => Auth::user()->id, 'product_id' => $request['product_id'], 'quantity' =>$request['quantity']]);
        }
        return view('carts.index');
    }
}
