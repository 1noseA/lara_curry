<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/index');
    }

    public function store(Request $request)
    {
        $this->validate($request, Product::$rules);

        if ($file = $request->product_img) {
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
