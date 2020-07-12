@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 my-5">
      <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
      </form> 
    </div>

    <div class="col-md-6 my-5">
      <form action="/product" method="post">
        @csrf
        <div>
          <label for="category">カテゴリー</label>
          <select>
            @foreach(config('category') as $key => $category)
              <option value="{{ $key }}">{{ $category['label'] }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label for="name">商品名　　</label>
          <input type="text" name="name">
        </div>
        <div>
          <label for="price">値段　　　</label>
          <input type="text" name="price">
        </div>
        <div>
          <label for="text">商品説明　</label>
          <input type="text" name="text">
        </div>
        <div>
          <label for="hot">辛さ　　　</label>
          <select>
            @foreach(config('hot') as $key => $hot)
              <option value="{{ $key }}">{{ $hot['label'] }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <input type="submit" value="登録" class="btn btn-add">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection