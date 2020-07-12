<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products/index', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $this->validate($request, Product::$rules);

        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->text = $request->text;
        $product->hot = $request->hot;
        $product->category = $request->category;
        $product->profile_img = $fileName;
        $product->save();

        return redirect()->route('products/index');
    }
}
