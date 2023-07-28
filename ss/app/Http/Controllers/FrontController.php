<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        return view('front.index', [
            'products' =>$products,
        ]);
    }

    public function singleCategory(Category $category)
    {
        $products = $category->product;

        return view('front.category-index', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function showProduct(Product $product)
    {
        return view('front.show-product', [
            'product' => $product,
        ]);
    }
}
