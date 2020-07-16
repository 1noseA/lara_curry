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

    public function add(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        
        $cart_info=Cart::firstOrCreate(['product_id' => $cart->product_id, 'user_id' => $cart->user_id]);

        if($cart_info->wasRecentlyCreated){
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect('/cart');
            $message = '注文リストに追加しました';
        }
        else{
            $cart->quantity+=$request->quantity;
            $cart->save();
            return redirect('/cart');
        }
    }

    public function destroy(Cart $cart)
    {
        // $cart = Cart::find($id);
        $cart->delete();
        return redirect('/cart');
    }
}
