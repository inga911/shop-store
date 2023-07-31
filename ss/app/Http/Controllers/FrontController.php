<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function orders(Request $request)
    {
        $orders = $request->user()->order;

        return view('front.orders', [
            'orders' => $orders,
            'status' => Order::STATUS
        ]);
    }

    public function download(Order $order, Product $product)
    {
        $pdf = Pdf::loadView('front.pdf',[
            'order' => $order,
            'product' => $product,
            'status' => Order::STATUS

        ]);

        return $pdf->download('order-'.$order->id.'.pdf');
    }
}
