<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(Request $request) 
    {
        $products = Product::all();
        $products->map(function($p) use ($request) {
            //VOTES
            if (!$request->user()) {
                $showVoteButton = false;
            } else {
                $rates = collect($p->rates);
                $showVoteButton = $rates->first(fn($r) => $r['userId'] == $request->user()->id) ? false : true;
            }
            $p->votes = count($p->rates);
            $p->showVoteButton = $showVoteButton;

        });
        return view('front.index', [
            'products' => $products
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

    public function vote(Request $request, Product $product)
    {
        if ($request->user()) {
            $userId = $request->user()->id;
            $rates = collect($product->rates);

            if (!$rates->first(fn($r) => $r['userId'] == $userId) && $request->star) {
                $stars = count($request->star);
                $userRate = [
                    'userId' => $userId,
                    'rate' => $stars
                ];
                $rates->add($userRate);
                $rate = round($rates->sum('rate') / $rates->count(), 2);

                $product->update([
                    'rate' => $rate,
                    'rates' => $rates,
                ]);
            }

            return redirect()->back();
        }
        
    }
}
