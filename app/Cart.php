<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'user_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subtotal()
    {
        return $this->product->price * $this->quantity;
    }

    public function tax()
    {
        return $this->subtotal() * 1.08;
    }
}
