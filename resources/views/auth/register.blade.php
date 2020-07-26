@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card my-5 p-4">
          <div class="card-body">
            <h3 class="text-center">会員登録</h3>
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-add my-3">登録</button>
              </div>
            </form>
            <div class="text-center">
              <a href="/login">ログインはこちらから</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection