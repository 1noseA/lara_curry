@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 my-5">
        <p>注文日</p>
        <p>合計金額</p>
        <table class="table">
          <tr>
            <th class="w-25">商品名</th>
            <th>個数</th>
            <th>小計</th>
          </tr>      
          @foreach($order_products as $order_product)
          <tr>
            <td>{{ $order_product->product_id }}</td>
            <td>
              {{ $order_product->quantity }}個
            </td>
            <td>￥{{ $order_product->price }}（￥{{ $order_product->price }}）</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection