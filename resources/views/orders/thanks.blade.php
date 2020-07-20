@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto my-5">
      <h3 class="text-center">ご注文ありがとうございました！</h3>
      <h4 class="text-center my-5">指定日時にご来店くださいませ。</h4>
      <div class="thanks text-center">
        <img src="{{ asset('/img/namasute.png') }}">
      </div>
    </div>
  </div>
</div>
@endsection