@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5">
        <img src="{{ asset('/img/curry_pot.png') }}">
        {{-- <p><img src="../../uploads/{{ $product->image }}"></p> --}}
      </div>
      <div class="col-md-6 mt-5 p-5">
        <p>{{ $product->category }}</p>
        <p>{{ $product->name }}</p>
        <p>¥{{ $product->price }}</p>
        <p>{{ $product->text }}</p>
        <p>{{ $product->hot }}</p>
      </div>
      <div class="mx-auto">
        <button class="btn btn-add my-5 mr-3">これに決めた</button>
        <a class="btn btn-add my-5" href="/">戻る</a>
      </div>
    </div>
  </div>
@endsection

