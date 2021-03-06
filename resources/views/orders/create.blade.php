@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto my-5">
      <h3 class="text-center mb-3">受け取り情報入力</h3>
      {{-- エラーメッセージ --}}
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
          @endforeach
        </div>
      @endif
      <form method="post" action="/order/confirm">
        @csrf
        <div class="form-group">
          <span class="required rounded">必須</span>
          <label for="name">受け取り者の名前　　</label>
          <input class="form-control" type="text" name="name" placeholder="フルネームでお願いいたします" value="{{ old('name') }}" >
        </div>
        <div class="form-group">
          <span class="required rounded">必須</span>
          <label for="tel">電話番号</label>
          <input class="form-control" type="text" name="tel" placeholder="例：000-0000-0000" value="{{ old('tel') }}" >
        </div>
        <div class="form-group">
          <span class="required rounded">必須</span>
          <label for="date">受け取り日</label>
            <input class="form-control" type="text" name="date" placeholder="例：◯/◯" value="{{ old('date') }}" >
        </div>
        <div class="form-group">
          <span class="required rounded">必須</span>
          <label for="time">受け取り時間</label>
           <input class="form-control" type="text" name="time" placeholder="ご注文からご用意までに20分ほどかかります" value="{{ old('time') }}" >
        </div>
        <input type="hidden" name="total" value="{{ $total }}">
        <div class="text-center">
          <input type="submit" value="確認画面へ" class="btn btn-add mt-5">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection