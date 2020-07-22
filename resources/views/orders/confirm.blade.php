@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto my-5">
      <h3 class="text-center mb-5">ご確認お願いいたします</h3>
      <form method="post" action="{{ route('order.store') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user_id }}">
      <p>受け取り者　：　{{ $name }}
        <input type="hidden" name="name" value="{{ $name }}">
      </p>
      <p>電話番号　　：　{{ $tel }}
        <input type="hidden" name="tel" value="{{ $tel }}">
      </p>
      <p>受け取り日　：　{{ $date }}
        <input type="hidden" name="date" value="{{ $date }}">
      </p>
      <p>受け取り時間：　{{ $time }}
        <input type="hidden" name="time" value="{{ $time }}">
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mx-auto mb-5">
      <h4 class="text-center mb-3">〜注文リスト〜</h3>
        <table class="table">
          <tr>
            <th class="w-50">商品名</th>
            <th>個数</th>
            <th>小計</th>
          </tr>
            @foreach($carts as $cart)
            <tr>
              <td>{{ $cart->product->name }}</td>
              <td>{{ $cart->quantity }}</td>
              <td>￥{{ $cart->subtotal() }}（￥{{ $cart->tax() }}）</td>
            </tr>
            @endforeach
          </table>
        <p class="text-center">合計金額　：　￥{{ $subtotals }}（￥{{ $total }}）
          <input type="hidden" name="total" value="{{ $total }}">
        </p>
    </div>
  </div>
  <div class="text-center">
    <button type="submit" name="action" value="post" class="btn btn-add">注文を確定する</button>
  </div>
  <div class="text-center">
    <button type="submit" name="action" value="back" class="btn btn-move my-5">情報入力に戻る</button>
    <a class="btn btn-move my-5" href="/cart">注文リストに戻る</a>
  </div>
</div>
@endsection