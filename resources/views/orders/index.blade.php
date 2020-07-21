@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto my-5">
        <h3 class="text-center mb-3">{{ Auth::user()->name }}さんの注文履歴</h3>
          {{-- 注文履歴があるときとないときで条件分岐 --}}
        @if ($orders->isNotEmpty())
        <table class="table">
          <tr>
            <th>注文日</th>
            <th>受け取り日</th>
            <th>受け取り時間</th>
            <th>合計金額</th>
            <th></th>
          </tr>      
          @foreach($orders as $order)
          <tr>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->date }}</td>
            <td>{{ $order->time }}</td>
            <td>￥{{ $order->total }}</td>
            <td><a class="btn btn-add my-5" href="/order/{{ $order->id }}">詳細を見る</a></td>
          </tr>
          @endforeach
        </table>
        @else
          <p>注文履歴はありません</p>
        @endif
      </div>
    </div>
  </div>
@endsection
