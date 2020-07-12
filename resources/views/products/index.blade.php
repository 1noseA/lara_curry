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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 mx-auto my-5">
        <div class="menu">
          <h3>メニュー</h3>
          <h4>カレー（辛さは4段階）</h4>
          @foreach ($products as $product)
            @if ($product->category === 1)
            {{-- <p><img src="../../uploads/{{ $product->image }}"></p> --}}
            <p>{{ $product->name }}</p>
            <p>{{ $product->price }}</p>
            @endif
          @endforeach

          <h4>ナンorライス</h4>
          @foreach ($products as $product)
            @if ($product->category === 2)
            {{-- <p><img src="../../uploads/{{ $product->image }}"></p> --}}
            <p>{{ $product->name }}</p>
            <p>{{ $product->price }}</p>
            @endif
          @endforeach

          <h4>サイドメニュー</h4>
          @foreach ($products as $product)
            @if ($product->category === 3)
            {{-- <p><img src="../../uploads/{{ $product->image }}"></p> --}}
            <p>{{ $product->name }}</p>
            <p>{{ $product->price }}</p>
            @endif
          @endforeach

          <h4>ドリンク</h4>
          @foreach ($products as $product)
            @if ($product->category === 4)
            {{-- <p><img src="../../uploads/{{ $product->image }}"></p> --}}
            <p>{{ $product->name }}</p>
            <p>{{ $product->price }}</p>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

