<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # 初期化
        DB::table('products')->delete();
        
        # テストデータ挿入
        DB::table('products')->insert([
            [
                'name' => 'ララカレー',
                'price' => 400,
                'text' => '看板メニュー。豆カレー',
                'category' => 1,
                'hot' => 2,
                'image' => 'curry_pot.png',
            ],
            [
                'name' => 'バターチキン',
                'price' => 400,
                'text' => '一番人気',
                'category' => 1,
                'hot' => 2,
                'image' => 'matsaman.png',
            ],
            [
                'name' => 'キーマ',
                'price' => 400,
                'text' => 'ひき肉ごろごろ',
                'category' => 1,
                'hot' => 3,
                'image' => 'keema_curry.png',
            ],
            [
                'name' => 'マトン',
                'price' => 400,
                'text' => 'スパイシーで臭みは少ない',
                'category' => 1,
                'hot' => 4,
                'image' => 'red_curry.png',
            ],
            [
                'name' => 'エビ',
                'price' => 400,
                'text' => 'エビがぷりぷり',
                'category' => 1,
                'hot' => 3,
                'image' => 'yellow_curry.png',
            ],
            [
                'name' => 'ほうれん草',
                'price' => 400,
                'text' => 'ヘルシー',
                'category' => 1,
                'hot' => 2,
                'image' => 'green_curry.png',
            ],

            [
                'name' => 'ナン',
                'price' => 200,
                'text' => 'でかさは負けない',
                'category' => 2,
                'hot' => 1,
                'image' => 'pan.png',
            ],
            [
                'name' => 'チーズナン',
                'price' => 300,
                'text' => 'チーズのびのび',
                'category' => 2,
                'hot' => 1,
                'image' => 'nan.png',
            ],
            [
                'name' => 'ライス',
                'price' => 200,
                'text' => '200g',
                'category' => 2,
                'hot' => 1,
                'image' => 'rice.png',
            ],

            [
                'name' => 'サラダ',
                'price' => 200,
                'text' => 'コールスロー',
                'category' => 3,
                'hot' => 1,
                'image' => 'salad.png',
            ],
            [
                'name' => 'タンドリーチキン',
                'price' => 300,
                'text' => 'ジュージー',
                'category' => 3,
                'hot' => 1,
                'image' => 'chicken.png',
            ],
            [
                'name' => 'サモサ',
                'price' => 300,
                'text' => '揚げ餃子みたいな。じゃがいも＋ひき肉＋豆',
                'category' => 3,
                'hot' => 1,
                'image' => 'samosa.png',
            ],

            [
                'name' => 'ラッシー',
                'price' => 200,
                'text' => 'ヨーグルトドリンク',
                'category' => 4,
                'hot' => 1,
                'image' => 'drink_lassi.png',
            ],
            [
                'name' => 'マンゴーラッシー',
                'price' => 300,
                'text' => 'とろーり濃厚',
                'category' => 4,
                'hot' => 1,
                'image' => 'lassi_mango.png',
            ],
            [
                'name' => 'チャイ',
                'price' => 300,
                'text' => 'スパイシーなミルクティー',
                'category' => 4,
                'hot' => 1,
                'image' => 'chai.png',
            ],
        ]);
    }
}
