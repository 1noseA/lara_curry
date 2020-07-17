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
        $add = Cart::updateOrCreate(
            [
            'user_id' => Auth::id(),
            'product_id' => $request->post('product_id'),
            ],
            [
            'quantity' => $request->post('quantity')
            // 'quantity' => \DB::raw('quantity + ' . $request->post('quantity')),
            ]
        );
        return redirect('/cart')->with('flash_message', 'カートに追加しました');
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
