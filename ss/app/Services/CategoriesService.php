<?php

namespace App\Services;

use App\Models\Category;

class CategoriesService
{
    public function get()
    {
        return Category::all();
    }
}