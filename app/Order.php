<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_products()
    {
        return $this->belongsToMany('App\OrderProduct');
    }
}
