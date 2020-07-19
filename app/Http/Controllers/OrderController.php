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
        $carts = Cart::select('carts.*', 'products.name', 'carts.quantity')
            ->where('user_id', Auth::id())
            ->join('products', 'products.id','=','carts.product_id')
            ->get();
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
        // $order = new Order($request->all());
        $name = $request->name;
        $tel = $request->tel;
        $date = $request->date;
        $time = $request->time;
        $total = 1;
        $input_data = [
            'name' => $name,
            'tel' => $tel,
            'date' => $date,
            'time' => $time,
            'total' => $total
        ];
        return view('orders.confirm', $input_data, compact('carts'));
    }

    // お客様情報送信
    public function store(Request $request)
    {
        // 戻るボタンが押された場合
        if ($request->post('back')) {
            return redirect('/order/create')->withInput();
    }
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
