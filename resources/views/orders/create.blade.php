@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto my-5">
      <h3 class="text-center mb-3">受け取り情報入力</h3>
      <form method="post" action="/order">
        @csrf
        <div class="form-group">
          <label for="name">受け取り者の名前　　</label>
          <input class="form-control" type="text" name="name" value="{{ old('name') }}" >
        </div>
        <div class="form-group">
          <label for="price">電話番号</label>
          <input class="form-control" type="text" name="tel" value="{{ old('tel') }}" >
        </div>
        <div class="form-group">
          <div>受け取り日
            <input class="form-control" type="text" name="date" value="{{ old('date') }}" >
          </div>
        </div>
        <div class="form-group">
          <div>受け取り時間
           <input class="form-control" type="text" name="time" value="{{ old('time') }}" >
        </div>
        <div class="text-center">
          <input type="submit" value="確認画面へ" class="btn btn-add mt-5">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection