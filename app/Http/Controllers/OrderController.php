<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateOrder;
use App\OrderProduct;

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
        $user_id = Auth::id();
        $name = $request->name;
        $tel = $request->tel;
        $date = $request->date;
        $time = $request->time;
        $subtotals = $this->subtotals($carts);
        $total = $this->total($carts);
        $input_data = [
            'user_id' => $user_id,
            'name' => $name,
            'tel' => $tel,
            'date' => $date,
            'time' => $time,
            'total' => $total
        ];
        return view('orders.confirm', $input_data, compact('carts', 'subtotals', 'total'));
    }

    // お客様情報送信
    public function store(CreateOrder $request)
    {
        // 戻るボタンが押された場合
        if ($request->get('action') === 'back') {
            return redirect('/order/create')->withInput();
        }
        // 注文確定ボタンが押された場合
        // order保存→order_products保存→カート内削除
        $order = Order::create($request->all());
        $order_products = Cart::where('user_id', Auth::id())->get();
        foreach ($order_products as $order_product)
        {
            $order->OrderProducts()->attach($order_product->product->id, [
                'quantity' => $order_product->quantity,
                'price' => $order_product->quantity*$order_product->product->price
            ]);
        }
        Cart::where('user_id', Auth::id())->delete();
        return view('orders.thanks');
    }

    // 注文完了画面
    public function thanks()
    {
        return view('orders.thanks');
    }
    
    // 注文情報一覧
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    // 注文商品の表示
    public function show($id)
    {
        $order = Order::find($id);
        $order_products = OrderProduct::where('order_id', $order->id)->get();
        return view('orders.show', compact('order', 'order_products'));
    }
}
