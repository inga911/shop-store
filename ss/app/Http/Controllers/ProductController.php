<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('back.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $cats = Category::all();
        return view('back.products.create', [
            'cats' => $cats
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'product_description' => 'required',
            'product_how_to_use' => 'required',
            'product_warnings' => 'required',
            'product_ingredients' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);

         Product::create([
            'product_title' => $request->product_title,
            'product_description' => $request->product_description,
            'product_how_to_use' => $request->product_how_to_use,
            'product_warnings' => $request->product_warnings,
            'product_ingredients' => $request->product_ingredients,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products-index');
    }



    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $cats = Category::all();
        return view('back.products.edit', [
            'product' => $product,
            'cats' => $cats
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $product->update([
            'product_title' => $request->product_title,
            'product_description' => $request->product_description,
            'product_how_to_use' => $request->product_how_to_use,
            'product_warnings' => $request->product_warnings,
            'product_ingredients' => $request->product_ingredients,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('products-index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products-index');
    }
}
