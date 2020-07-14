<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
    public function myCart()
   {
       $my_carts = Cart::all();
       return view('carts.mycart', compact('my_carts'));
   }
}
