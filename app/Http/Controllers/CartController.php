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
        // $cart = new Cart;
        $user_id = Auth::id();
        $product_id = $request->product_id;
        // $quantity = $request->quantity;
        $cart_info=Cart::firstOrCreate(['product_id' => $product_id, 'user_id' => $user_id, 'quantity' => $request->quantity]);
        if($cart_info->wasRecentlyCreated){
            // $cart->save();
            $message = '注文リストに追加しました';
        } else {
            $quantity += $request->quantity;
            $cart->update();
            $message = '個数を追加しました';
        }
        $carts = Cart::where('user_id', Auth::user()->id)->where('product_id', $request['product_id'])->get();
        return redirect('carts.index',compact('carts' , 'message'));
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }
}
