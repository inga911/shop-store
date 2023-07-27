<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('back.cats.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('back.cats.create', [
        ]);
    }

    public function store(Request $request)
    {
        Category::create([
            'category_type' => $request->category_type,
        ]);
        return redirect()->route('cats-index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('back.cats.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'category_type' => $request->category_type,
        ]);
        return redirect()->route('cats-index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('cats-index');
    }
}
