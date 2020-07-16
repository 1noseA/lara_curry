@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto my-5">
      <h3 class="text-center mb-3">{{ Auth::user()->name }}さんの注文リスト</h3>
        <table class="table">
          <tr>
            <th>商品名</th>
            <th>個数</th>
            <th>小計</th>
          </tr>
          @foreach($carts as $cart)
          <tr>
            <td>{{ $cart->product->name }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>{{ $cart->product->price }}</td>
          </tr>
          @endforeach
        </table>
    </div>
  </div>
</div>
@endsection