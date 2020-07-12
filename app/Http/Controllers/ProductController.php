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

    public function show($id)
    {
    $product = Product::find($id);
    return view('products.show', ['product' => $product]);
    }

    public function create()
    {
        $category = config('category');
        $hot = config('hot');
        return view('products.create')->with(['category' =>$category, 'hot'=>$hot]);
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
        $product->image = $fileName;
        $product->save();

        return redirect('/');
    }
}
