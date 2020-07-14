@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto my-5">
      <h3 class="text-center">{{ Auth::user()->name }}さんのカートの中身</h3>
        <div class="">
          @foreach($carts as $cart)
            {{$cart->product_id}}<br>
            {{$cart->user_id}}<br>
          @endforeach
        </div>
    </div>
  </div>
</div>
@endsection