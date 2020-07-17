<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'quantity'
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
        $result = $this->product->price * $this->quantity;
        return $result;
    }

    public function tax()
    {
        return $this->subtotal() * 1.08;
    }
    
    
}
