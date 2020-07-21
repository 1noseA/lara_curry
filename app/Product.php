<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function OrderProducts()
    {
        return $this->hasMany('App\Order');
    }
}
