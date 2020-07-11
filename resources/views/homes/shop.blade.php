@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto my-5">
        <h2 class="text-center">店舗情報</h2>
        {{-- 地図 --}}
        <div class="shop-map my-3">
          <img src="{{ asset('/img/map.jpg') }}">
        </div>
        <table class="table">
          <tr>
            <th>営業時間</th>
            <td>11:00〜22:00</td>
          </tr>
            <th>定休日</th>
            <td>なし</td>
          </tr>
            <th>アクセス</th>
            <td>**線**駅徒歩5分</td>
          </tr>
            <th>住所</th>
            <td>東京都杉並区********************</td>
          </tr>
            <th>電話番号</th>
            <td>090-****-****</td>
          </tr>
            <th></th>
            <td>看板メニューはララカレー<br>
              チーズナンもおすすめ
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection