<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductPhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

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

    public function store(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'product_title' => 'required',
            'product_description' => 'required',
            'product_how_to_use' => 'required',
            'product_warnings' => 'required',
            'product_ingredients' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required|integer',
            'photo' => 'sometimes|required|image|max:512',
            'gallery.*' => 'sometimes|required|image|max:512'
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        $photo = $request->photo;
        if ($photo) {
            $name = $product->savePhoto($photo);
        }


        $id = Product::create([
            'product_title' => $request->product_title,
            'product_description' => $request->product_description,
            'product_how_to_use' => $request->product_how_to_use,
            'product_warnings' => $request->product_warnings,
            'product_ingredients' => $request->product_ingredients,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
            'photo' => $name ?? null,
        ])->id;


        foreach ($request->gallery ?? [] as $gallery) {
            ProductPhotoGallery::add($gallery, $id);
        }

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
        if ($request->delete == 1) {
            if ($product->photo) {
                $product->deletePhoto();
            }
            return redirect()->back();
        }
    
        $validator = Validator::make($request->all(), [
            'product_title' => 'required',
            'product_description' => 'required',
            'product_how_to_use' => 'required',
            'product_warnings' => 'required',
            'product_ingredients' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required|integer',
            'photo' => 'sometimes|required|image|max:512',
            'gallery.*' => 'sometimes|required|image|max:512'
        ]);
    
        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
    
        $photo = $request->photo;
        if ($photo) {
            $name = $product->savePhoto($photo);
        } else {
            $name = $product->photo;
        }
    
        $product->update([
            'product_title' => $request->product_title,
            'product_description' => $request->product_description,
            'product_how_to_use' => $request->product_how_to_use,
            'product_warnings' => $request->product_warnings,
            'product_ingredients' => $request->product_ingredients,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
            'photo' => $name,
        ]);
    
        foreach ($request->gallery ?? [] as $gallery) {
            ProductPhotoGallery::add($gallery, $product->id);
        }
    
        return redirect()->route('products-index');
    }
    




    public function destroy(Product $product)
    {
        if ($product->gallery->count()) {
            foreach ($product->gallery as $gal) {
                $gal->deletePhoto();
            }
        }

        if ($product->photo) {
            $product->deletePhoto();
        }

        $product->delete();
        return redirect()->route('products-index');
    }


    public function destroyPhoto(ProductPhotoGallery $photo)
    {
        $photo->deletePhoto();
        return redirect()->back();
    }
    

}
