<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProduct;

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
    $category = config('category');
    $hot = config('hot');
    return view('products.show', ['product' => $product])->with(['category' =>$category, 'hot'=>$hot]);
    }

    public function create()
    {
        $category = config('category');
        $hot = config('hot');
        return view('products.create')->with(['category' =>$category, 'hot'=>$hot]);
    }

    public function store(CreateProduct $request)
    {
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

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Product::$rules);

        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->text = $request->text;
        $product->hot = $request->hot;
        $product->category = $request->category;
        $product->image = $fileName;
        $product->save();
        return redirect("/product/".$id);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
}
