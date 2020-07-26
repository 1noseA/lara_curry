# 【Laravel】ララカレー
<img width="1440" alt="01" src="https://user-images.githubusercontent.com/59720615/88476906-ec8d5f80-cf76-11ea-8d0e-6c220214d8d1.png">
<img width="1440" alt="02" src="https://user-images.githubusercontent.com/59720615/88476907-eeefb980-cf76-11ea-915a-845c649a575b.png">
http://lara-curry.herokuapp.com/<br>
（テストユーザーの用の簡単ログインボタンがあります）<br>
（管理者画面は/adminで、ID:admin、password:adminです）

## アプリ概要
- インドカレーテイクアウト注文システム

## 開発環境
- macOS Catalina 10.15.3
- PHP 7.4.7
- Laravel 7.19.0
- PostgreSQL 12.3

## 機能一覧
- 顧客
  - ログイン機能
  - 商品一覧、詳細表示
  - カート（注文リスト）に商品を追加、編集、削除
  - 注文機能
  - 注文一覧、詳細表示
  - ページネーション
- 管理者（Laravel-admin）
  - 顧客情報、注文情報の確認、編集、削除
  - 商品登録、編集、削除

<img width="1440" alt="03" src="https://user-images.githubusercontent.com/59720615/88476910-f0b97d00-cf76-11ea-9baa-b5a01c863438.png">
<img width="1440" alt="04" src="https://user-images.githubusercontent.com/59720615/88476913-f2834080-cf76-11ea-8273-c92931ae36fb.png">
<img width="1440" alt="06" src="https://user-images.githubusercontent.com/59720615/88476914-f57e3100-cf76-11ea-8096-04f3b4185a66.png">
<img width="1440" alt="07" src="https://user-images.githubusercontent.com/59720615/88476916-f6af5e00-cf76-11ea-8ec9-1701beb115d6.png">
<img width="1440" alt="admin" src="https://user-images.githubusercontent.com/59720615/88476920-f9aa4e80-cf76-11ea-8fc4-226132c64174.png">

## 作った理由
- 近所のインドカレー屋にはまっており、テイクアウトが電話かその場で頼んで待つ形式だったので、<br>
ネットから注文できたらいいなと思いました。
- プログラミングスクールのチーム開発でECサイトを作った際カート機能を担当しており、<br>
自力で実装できなかったので復習したい思いがあり、ちょうどLaravelに興味を持ったので<br>
Laravelで実装することにしました。

## 学習歴
- 約1ヶ月半前にPHPの学習開始。Progate1周、書籍「気づけばプロ並みPHP改訂版」で1週間ほどで<br>
さらっと基礎を学びました。
- そのあとLaravelへ。書籍「Laravel入門第2版」を終えた後、LaravelチュートリアルでToDoアプリを<br>
作成。どちらも1週間ほどかかりました。
- このアプリはちょうど３週間で完成。あらゆる記事やGitHub、ドキュメントを読み、自力で完成させました。

## 苦労した点
- 最も苦労したのは中間テーブル（OrderProducts)の書き方。注文情報を保存する時に同時に<br>
注文商品も保存したり、注文商品テーブルのデータの表し方など、Railsに慣れているがゆえに<br>
基本的な部分を見逃していました。
- カート機能の、カート内に同じ商品があれば数量を増やす、カート内商品全削除にも苦労しました。