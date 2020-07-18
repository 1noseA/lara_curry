@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 my-5">
        @if ($product->image == null)
          <img class="card-img" src="/img/curry_pot.png">
        @else
          <img class="card-img" src="../../uploads/{{ $product->image }}">
        @endif
      </div>
      <div class="col-md-6 mt-5 p-5">
        <p>{{ $product->category_label }}</p>
        <p>商品名　：{{ $product->name }}</p>
        <p>値段　　： ￥{{ $product->price }}</p>
        <p>商品説明：{{ $product->text }}</p>
        @if ($product->category == 1)
        <p>辛さ　　：{{ $product->hot_label }}</p>
        @endif
    
        {{-- エラーメッセージ --}}
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
            @endforeach
          </div>
        @endif
        <form action="/cart" method="post">
          @csrf
          <div class="">
            <label for="quantity">個数</label>
            <input type="text" name="quantity">個
          </div>
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="submit" value="これに決めた！" class="btn btn-add my-5 mr-3">
        </form>
        <a class="btn btn-add mb-5" href="/">戻る</a>
        {{-- 削除確認
        <form action="/product/{{ $product->id }}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <input type="submit" name="" value="削除する">
        </form> --}}
      </div>
    </div>
  </div>
@endsection

