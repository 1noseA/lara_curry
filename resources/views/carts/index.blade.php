@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto my-5">
      <h3 class="text-center mb-3">{{ Auth::user()->name }}さんの注文リスト</h3>
      {{-- <p class="text-center">{{ $message }}</p> --}}
        @if (isset($carts))
        <table class="table">
          <tr>
            <th>商品名</th>
            <th>個数</th>
            <th>小計</th>
            <th></th>
          </tr>
          
            @foreach($carts as $cart)
            <tr>
              <td>{{ $cart->product->name }}</td>
              <td>{{ $cart->quantity }}</td>
              <td>￥{{ $cart->subtotal() }}（￥{{ $cart->tax() }}）</td>
              <td>
                <form method="post" action="/cart/{{ $cart->id }}">
                  @csrf
                  <input type="hidden" name="_method" value="delete">
                  <input type="submit" value="削除" class="btn btn-add">
                </form>
              </td>
            </tr>
            @endforeach
          </table>
          <p>合計金額：　{{ $subtotals }}</p>
        @else
          <p>商品はありません</p>
        @endif
          
        <button type="button" onclick="history.back()" class="btn btn-add">戻る</button>
    </div>
  </div>
</div>
@endsection