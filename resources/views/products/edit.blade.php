@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 my-5">
      <form action="{{ route('products.edit', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
    </div>

    <div class="col-md-6 my-5">
        <div class="form-group">
          <label for="category">カテゴリー</label>
          <select class="form-control" id="category" name="category">
            @foreach(config('category') as $key => $category)
              <option value="{{ $key }}"{{ $key == old('category', $diary->category) ? 'selected' : '' }}>{{ $condition['label']  }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="name">商品名　　</label>
          <input class="form-control" type="text" name="name" value="{{ old('name', $product->name)}}">
        </div>
        <div class="form-group">
          <label for="price">値段　　　</label>
          <input class="form-control" type="text" name="price" value="{{ old('price', $product->price)}}">
        </div>
        <div class="form-group">
          <label for="text">商品説明　</label>
          <input class="form-control" type="text" name="text" value="{{ old('text', $product->text)}}">
        </div>
        <div class="form-group">
          <label for="hot">辛さ　　　</label>
          <select class="form-control" id="hot" name="hot">
            @foreach(config('hot') as $key => $hot)
              <option value="{{ $key }}"{{ $key == old('hot', $product->hot) ? 'selected' : '' }}>{{ $hot['label']  }}</option>
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