<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateOrder;

class OrderController extends Controller
{
    // お客様情報入力画面表示
    public function create()
    {
        // $carts = Cart::select('carts.*', 'products.name', 'carts.quantity')
        //     ->where('user_id', Auth::id())
        //     ->join('products', 'products.id','=','carts.product_id')
        //     ->get();
        $total = 1;
        return view('orders.create', compact('total'));
    }

    // 確認画面
    public function confirm(CreateOrder $request)
    {
        $carts = Cart::select('carts.*', 'products.name', 'carts.quantity')
            ->where('user_id', Auth::id())
            ->join('products', 'products.id','=','carts.product_id')
            ->get();
        $order = new Order($request->all());
        return view('orders.confirm', compact('order'));
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
        return view('orders.thanks');
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
