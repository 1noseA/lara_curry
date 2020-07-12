<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required|max: 20',
        'price' => 'required',
        'text' => 'required|max: 100',
        'hot' => 'required',
        'category' => 'required',
        'image' => 'image|file',
    ];

    // config/category.phpの数値を文字に変換
    public function getCategoryLabelAttribute()
    {
        $category_name = $this->attributes['category'];

        return config('category')[$category_name]['label'];
    }

    // config/hot.phpの数値を文字に変換
    public function getHotLabelAttribute()
    {
        $hot_name = $this->attributes['hot'];

        return config('hot')[$hot_name]['label'];
    }
}
