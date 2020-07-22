<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => '佐藤',
                'email' => 'test1@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => '鈴木',
                'email' => 'test2@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => '田中',
                'email' => 'test3@example.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
