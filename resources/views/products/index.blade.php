@extends('layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="top-image">
        <img src="{{ asset('/img/top.jpg') }}">
        <h1>インドカレーのテイクアウト<br>ご来店までにご用意します</h1>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto my-5">
        <div class="menu">
          <h3>メニュー</h3>
          <h4 class="my-3">カレー</h4>
          <div class="product-wrapper">
            @foreach ($products as $product)
              @if ($product->category === 1)
                <div class="card col-md-4">
                  <a href="/product/{{$product->id}}">
                    @if ($product->image == null)
                      <img class="card-img" src="/img/curry_pot.png">
                    @else
                      <img class="card-img" src="../../uploads/{{ $product->image }}">
                    @endif
                  </a>
                  <div class="card-body">
                    <p>{{ $product->name }}</p>
                    <p>¥{{ $product->price }}</p>
                  </div>
                </div>
              @endif
            @endforeach
          </div>

          <h4 class="my-3">ナンorライス</h4>
          <div class="product-wrapper">
            @foreach ($products as $product)
              @if ($product->category === 2)
                <div class="card col-md-4">
                  <a href="/product/{{$product->id}}">
                    @if ($product->image == null)
                      <img class="card-img" src="/img/curry_pot.png">
                    @else
                      <img class="card-img" src="../../uploads/{{ $product->image }}">
                    @endif
                  </a>
                  <div class="card-body">
                    <p>{{ $product->name }}</p>
                    <p>¥{{ $product->price }}</p>
                  </div>
                </div>
              @endif
            @endforeach
          </div>

          <h4 class="my-3">サイドメニュー</h4>
          <div class="product-wrapper">
            @foreach ($products as $product)
              @if ($product->category === 3)
                <div class="card col-md-4">
                  <a href="/product/{{$product->id}}">
                    @if ($product->image == null)
                      <img class="card-img" src="/img/curry_pot.png">
                    @else
                      <img class="card-img" src="../../uploads/{{ $product->image }}">
                    @endif
                  </a>
                  <div class="card-body">
                    <p>{{ $product->name }}</p>
                    <p>¥{{ $product->price }}</p>
                  </div>
                </div>
              @endif
            @endforeach
          </div>

          <h4 class="my-3">ドリンク</h4>
          <div class="product-wrapper">
            @foreach ($products as $product)
              @if ($product->category === 4)
                <div class="card col-md-4">
                  <a href="/product/{{$product->id}}">
                    @if ($product->image == null)
                      <img class="card-img" src="/img/curry_pot.png">
                    @else
                      <img class="card-img" src="../../uploads/{{ $product->image }}">
                    @endif
                  </a>
                  <div class="card-body">
                    <p>{{ $product->name }}</p>
                    <p>¥{{ $product->price }}</p>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

