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
        DB::table('products')->insert([
            [
                'name' => 'ララカレー',
                'price' => 400,
                'text' => '看板メニュー。豆カレー',
                'category' => 1,
            ],
            [
                'name' => 'バターチキン',
                'price' => 400,
                'text' => '一番人気',
                'category' => 1,
            ],
            [
                'name' => 'キーマ',
                'price' => 400,
                'text' => 'ひき肉ごろごろ',
                'category' => 1,
            ],
            [
                'name' => 'マトン',
                'price' => 400,
                'text' => 'スパイシーで臭みは少ない',
                'category' => 1,
            ],
            [
                'name' => 'エビ',
                'price' => 400,
                'text' => 'エビがぷりぷり',
                'category' => 1,
            ],
            [
                'name' => 'ほうれん草',
                'price' => 400,
                'text' => 'ヘルシー',
                'category' => 1,
            ],

            [
                'name' => 'ナン',
                'price' => 200,
                'text' => 'でかさは負けない',
                'category' => 2,
            ],
            [
                'name' => 'チーズナン',
                'price' => 300,
                'text' => 'チーズのびのび',
                'category' => 2,
            ],
            [
                'name' => 'ライス',
                'price' => 200,
                'text' => '200g',
                'category' => 2,
            ],

            [
                'name' => 'サラダ',
                'price' => 200,
                'text' => 'コールスロー',
                'category' => 3,
            ],
            [
                'name' => 'タンドリーチキン',
                'price' => 300,
                'text' => 'ジュージー',
                'category' => 3,
            ],
            [
                'name' => 'サモサ',
                'price' => 300,
                'text' => '揚げ餃子みたいな。じゃがいも＋ひき肉＋豆',
                'category' => 3,
            ],

            [
                'name' => 'ラッシー',
                'price' => 200,
                'text' => 'ヨーグルトドリンク',
                'category' => 4,
            ],
            [
                'name' => 'マンゴーラッシー',
                'price' => 300,
                'text' => 'とろーり濃厚',
                'category' => 4,
            ],
            [
                'name' => 'チャイ',
                'price' => 300,
                'text' => 'スパイシーなミルクティー',
                'category' => 4,
            ],
        ]);
    }
}
