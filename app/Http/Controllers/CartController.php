<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
    public function myCart()
    {
        $my_carts = Cart::all();
        return view('carts.mycart', compact('my_carts'));
    }

    public function addCart(Request $request)
    {
        // ログイン状態のユーザーのidを取得
        $user_id = Auth::id(); 
        $product_id = $request->product_id;

        // product_idとuser_idが全く同じレコードが存在しないか確認
        $cart_add = Cart::firstOrCreate(['product_id' => $product_id, 'user_id' => $user_id]);

        if($cart_add->wasRecentlyCreated){
            $message = 'カートに追加しました';
        }
        else{
            $message = 'カートに登録済みです';
        }

        $my_carts = Cart::where('user_id', $user_id)->get();

        return view('carts/mycart', compact('my_carts', 'message'));
    }
}
