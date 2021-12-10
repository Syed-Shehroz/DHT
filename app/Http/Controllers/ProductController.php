<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = products::all();
      return view ('products.index')->with('products', $products);
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        products::create($input);
        return redirect('product')->with('flash_message', 'Product Addedd!');
    }


    public function show($id)
    {
        $product = products::find($id);
        return view('products.show')->with('products', $product);
    }


    public function edit($id)
    {
        $product = products::find($id);
        return view('products.edit')->with('products', $product);

    }


    public function update(Request $request, $id)
    {
        $product = products::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product')->with('flash_message', 'Product Updated!');
    }


    public function destroy($id)
    {
        products::destroy($id);
        return redirect('product')->with('flash_message', 'Product deleted!');
    }
}
