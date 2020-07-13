@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 my-5">
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
          @endforeach
        </div>
      @endif
      <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
    </div>

    <div class="col-md-6 my-5">
        <div class="form-group">
          <label for="category">カテゴリー</label>
          <select class="form-control" id="category" name="category">
            <option value="">--選択してください--</option>
            @foreach(config('category') as $key => $category)
              <option value="{{ $key }}">{{ $category['label'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="name">商品名　　</label>
          <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
          <label for="price">値段　　　</label>
          <input class="form-control" type="text" name="price">
        </div>
        <div class="form-group">
          <label for="text">商品説明　</label>
          <input class="form-control" type="text" name="text">
        </div>
        <div class="form-group">
          <label for="hot">辛さ　　　</label>
          <select class="form-control" id="hot" name="hot">
            @foreach(config('hot') as $key => $hot)
              <option value="{{ $key }}">{{ $hot['label'] }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <input type="submit" value="登録" class="btn btn-add mt-3">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection