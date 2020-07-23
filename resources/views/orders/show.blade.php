@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto my-5">
        <h3 class="text-center mb-3">注文詳細</h3>
        <p>注文日　　：　{{ $order->created_at }}</p>
        <p>合計金額　：　￥{{ $order->total }}</p>
        <table class="table">
          <tr>
            <th class="w-50">商品名</th>
            <th class="w-25">個数</th>
            <th class="w-25">小計</th>
          </tr>      
          @foreach($order->products as $product)
            <tr>
              <td>{{ $product->name }}</td>
              <td>
                {{ $product->pivot->quantity }}個
              </td>
              <td>
                ￥{{ $product->pivot->price }}（￥{{ round($product->pivot->price*1.08) }}）
              </td>
            </tr>
          @endforeach
        </table>
        <div class="text-right">
          <a class="btn btn-move" href="/order">戻る</a>
        </div>
      </div>
    </div>
  </div>
@endsection