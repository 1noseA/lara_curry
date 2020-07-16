<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->where('product_id', $request['product_id'])->get();
        return view('carts.index', compact('carts'));
    }

    public function add(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = Auth::user();
        // $cart->product_id = $request->product_id;
        if($request->product_id == $product_id){
            $cart->quantity += $request->quantity;
            $cart->update();
            $message = '個数を追加しました';
        } else {
            $cart->quantity = $request->quantity;
            $cart->save();
            $message = '注文リストに追加しました';
        }
        $carts = Cart::where('user_id', Auth::user()->id)->where('product_id', $request['product_id'])->get();
        return view('carts.index',compact('carts' , 'message'));
    }

    public function destroy(Cart $cart)
    {
        // $cart = Cart::find($id);
        $cart->delete();
        return redirect('/cart');
    }
}
