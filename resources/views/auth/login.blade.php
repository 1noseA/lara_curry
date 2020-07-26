@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card my-5 p-4">
          <div class="card-body">
            <h3 class="text-center">ログイン</h3>
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-add my-3">ログイン</button>
              </div>
            </form>
            <form action="/login" method="post">
              @csrf
              <input name="email" type="hidden" value="test1@example.com">
              <input name="password" type="hidden" value="password">
              <div class="text-center">
                <button type="submit" class="btn btn-move">テストユーザーでログイン</button>
              </div>
            </form>
            <div class="text-center mt-3">
              <a href="/register">会員登録はこちらから</a><br>
              <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection