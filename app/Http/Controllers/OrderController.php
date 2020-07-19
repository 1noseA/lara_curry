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
        $total = $this->total($carts);
        return view('orders.create', compact('carts', 'total'));
    }

    // 合計
    private function subtotals($carts) 
    {
        $result = 0;
        foreach ($carts as $cart) {
            $result += $cart->subtotal();
        }
        return $result;
    }

    // 税込合計
    private function total($carts) {
        $result = round($this->subtotals($carts) * 1.08);
        return $result;
    }

    // 確認画面
    public function confirm(CreateOrder $request)
    {
        $carts = Cart::select('carts.*', 'products.name', 'carts.quantity')
            ->where('user_id', Auth::id())
            ->join('products', 'products.id','=','carts.product_id')
            ->get();
        $name = $request->name;
        $tel = $request->tel;
        $date = $request->date;
        $time = $request->time;
        $subtotals = $this->subtotals($carts);
        $total = $this->total($carts);
        $price = $carts->tax();
        $input_data = [
            'name' => $name,
            'tel' => $tel,
            'date' => $date,
            'time' => $time,
            'total' => $total
        ];
        return view('orders.confirm', $input_data, compact('carts', 'subtotals', 'total'));
    }

    // お客様情報送信
    public function store(Request $request)
    {
        // 戻るボタンが押された場合
        if ($request->post('back')) {
            return redirect('/order/create')->withInput();
        }
        // 注文確定ボタンが押された場合
        if( $request->has('post') ){
            $order = $request->post('name', 'tel', 'date', 'time', 'total');
            $product = $request->post('product_id', 'quantity', 'price');
            $order->products()->attach($product->id);
            Cart::where('user_id', Auth::id())->delete();
            return view('orders.thanks');
        }
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
