@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto my-5">
      <h3 class="text-center">{{ Auth::user()->name }}さんのカートの中身</h3>
      <p class="text-center">{{ $message }}</p><br>
        <div class="">
          @foreach($my_carts as $my_cart)
            {{$my_cart->product_id}}<br>
            {{$my_cart->user_id}}<br>
          @endforeach
        </div>
    </div>
  </div>
</div>
@endsection