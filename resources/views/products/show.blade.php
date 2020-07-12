@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5">
        @if ($product->image == null)
          <img class="card-img" src="/img/curry_pot.png">
        @else
          <img class="card-img" src="../../uploads/{{ $product->image }}">
        @endif
      </div>
      <div class="col-md-6 mt-5 p-5">
        <p>{{ $product->category_label }}</p>
        <p>商品名　：{{ $product->name }}</p>
        <p>値段　　： ¥{{ $product->price }}</p>
        <p>商品説明：{{ $product->text }}</p>
        <p>辛さ　　：{{ $product->hot_label }}</p>
      </div>
      <div class="mx-auto">
        <button class="btn btn-add my-5 mr-3">これに決めた</button>
        <a class="btn btn-add my-5" href="/">戻る</a>
      </div>
    </div>
  </div>
@endsection

