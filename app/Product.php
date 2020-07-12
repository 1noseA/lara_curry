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
}
