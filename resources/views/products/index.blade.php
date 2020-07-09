@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <div class="top-image">
          <img src="{{ asset('/img/top.jpg') }}">
          <h3>インドカレーのテイクアウト</h3>
          <h3>注文から20分で用意</h3>
        </div>
        <div class="menu">
          <h3>メニュー</h3>
          <h4>カレー（辛さは4段階）</h4>
          <h4>ナンorライス</h4>
          <h4>サイドメニュー</h4>
          <h4>ドリンク</h4>
        </div>
      </div>
    </div>
  </div>
@endsection
