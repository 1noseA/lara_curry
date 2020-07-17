<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        // $carts = Cart::where('user_id', Auth::user()->id)->get();
        $carts = Cart::select('carts.*', 'products.name', 'carts.quantity')
            ->where('user_id', Auth::id())
            ->join('products', 'products.id','=','carts.product_id')
            ->get();
        $subtotals = $this->subtotals($carts);
        $totalprice = $this->totalprice($carts);
        return view('carts.index', compact('carts', 'subtotals', 'totalprice'));
    }

    private function subtotals($carts) 
    {
        $result = 0;
        foreach ($carts as $cart) {
            $result += $cart->subtotal();
        }
        return $result;
    }

    private function totalprice($carts) {
        $result = $this->subtotals($carts) * 1.08;
        return $result;
    }


    public function add(Request $request)
    {
        if (Cart::where([['user_id', Auth::id()],['product_id', $request->post('product_id')]])->exists())
        {
            $cart = Cart::select('carts.quantity')
            ->where([['user_id', Auth::id()],['product_id', $request->post('product_id')]])->first();
            $cartquantity = $cart->quantity +  $request->post('quantity');
        } else {
            $cartquantity = $request->post('quantity');  
        }       
        Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $request->post('product_id'),
            ],
            [
                'quantity' => $cartquantity,
            ]
        );
        return redirect('/cart')->with('flash_message', '商品を追加しました');

    }

    public function update(Request $request, Cart $cart)
    {
        $cart->quantity = $request->post('quantity');
        $cart->save();
        return redirect('/cart')->with('flash_message', '個数を変更しました');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart')->with('flash_message', '商品を削除しました');
    }
}
