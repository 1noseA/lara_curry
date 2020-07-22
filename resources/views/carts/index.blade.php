@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto my-5">
      <h3 class="text-center mb-3">{{ Auth::user()->name }}さんの注文リスト</h3>
        {{-- サクセスメッセージ --}}
        @if(Session::has('flash_message'))
          <div class="alert alert-success">
              {{ session('flash_message') }}
          </div>
        @endif
        {{-- エラーメッセージ --}}
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
            @endforeach
          </div>
        @endif
        {{-- 商品があるときとないときで条件分岐 --}}
        @if ($carts->isNotEmpty())
        {{-- <form method="post" action="/cart/delete">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <input type="submit" value="全削除" class="btn btn-add">
        </form> --}}
          <table class="table">
            <tr>
              <th class="w-25">商品名</th>
              <th>個数</th>
              <th>小計</th>
              <th></th>
            </tr>
            
            @foreach($carts as $cart)
            <tr>
              <td>{{ $cart->product->name }}</td>
              <td>
                <form method="post" action="/cart/{{ $cart->id }}">
                  @method('PATCH')
                  @csrf
                  <input type="text" name="quantity" value="{{ $cart->quantity }}" class="qty-form">
                  個
                  <button type="submit" class="btn btn-add">更新</button>
                </form>
              </td>
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
          {{ $carts->links('pagination::default') }}
          <p class="text-center">合計金額　：　￥{{ $subtotals }}（￥{{ $total }}）</p>
          <div class="text-center">
            <a class="btn btn-add mt-3" href="/order/create">注文する</a>
          </div>
        @else
          <p>商品はありません</p>
        @endif
          
        <div class="text-center">
          <a class="btn btn-add my-5" href="/">戻る</a>
        </div>
    </div>
  </div>
</div>
@endsection
