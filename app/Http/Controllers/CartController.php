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
        $carts = Cart::where('user_id', Auth::user()->id)->get();
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
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect('/cart');
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->quantity = $request->post('quantity');
        $cart->save();
        return redirect('/cart');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }
}
