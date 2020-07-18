<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Product;
use App\Http\Requests\CreateCart;

class CartController extends Controller
{
    public function index()
    {
        // $carts = Cart::where('user_id', Auth::id())->get();
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

    public function totalprice($carts) {
        $result = round($this->subtotals($carts) * 1.08);
        return $result;
    }


    public function store(CreateCart $request)
    {
        $user_id = Auth::id();
        $product_id = $request->post('product_id');
        if (Cart::where([['user_id', $user_id],['product_id', $product_id]])->exists())
        {
            $cart = Cart::select('carts.quantity')
            ->where([['user_id', $user_id],['product_id', $product_id]])->first();
            $quantity = $cart->quantity +  $request->post('quantity');
        } else {
            $quantity = $request->post('quantity');  
        }       
        Cart::updateOrCreate(
            [
                'user_id' => $user_id,
                'product_id' => $product_id,
            ],
            [
                'quantity' => $quantity,
            ]
        );
        return redirect('/cart')->with('flash_message', '商品を追加しました');

    }

    public function update(CreateCart $request, Cart $cart)
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
