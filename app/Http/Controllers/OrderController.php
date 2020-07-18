<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // お客様情報入力画面表示
    public function create()
    {
        $carts = Cart::select('carts.*', 'products.name', 'carts.quantity')
            ->where('user_id', Auth::id())
            ->join('products', 'products.id','=','carts.product_id')
            ->get();
        $total = $carts->totalprice($carts);
        return view('orders.create', compact('total'));
    }

    // 確認画面
    public function confirm()
    {
        return view('confirm');
    }

    // お客様情報送信
    public function store(Request $request)
    {
        if( $request->has('post') ){
            Cart::where('user_id', Auth::id())->delete();
            return view('orders.thanks');
        }
        $request->flash();
        return $this->index();
    }

    // 注文完了画面
    public function thanks()
    {
        return view('thanks');
    }
    
    // 注文情報一覧
    public function index()
    {

    }

    // 注文商品の表示
    public function show()
    {

    }
}
