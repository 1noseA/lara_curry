@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto my-5">
      {{-- 入力情報の確認 --}}
      <p>受け取り者　：{{ $order->name }}</p>
      <p>電話番号　　：{{ $order->tel }}</p>
      <p>受け取り日　：{{ $order->date }}</p>
      <p>受け取り時間：{{ $order->time }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mx-auto mb-5">
      {{-- 注文リストの確認 --}}
      {{-- <table class="table">
        <tr>
          <th class="w-25">商品名</th>
          <th>個数</th>
        </tr>
          @foreach($carts as $cart)
          <tr>
            <td>{{ $cart->product->name }}</td>
            <td>{{ $cart->quantity }}</td>
          </tr>
          @endforeach
        </table>
        <p class="text-center">合計金額　：　￥{{ $order->total }}</p> --}}
    </div>
  </div>
  <div class="text-center">
    <a class="btn btn-add my-5" href="/order/create">情報入力に戻る</a>
    <a class="btn btn-add my-5" href="/cart">注文リストに戻る</a>
  </div>
</div>
@endsection