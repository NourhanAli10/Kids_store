<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ProductByCategory($slug) {
        $category = Category::where('slug', $slug)->first();
        $products = $category->products()->paginate(6);
        return view('store.Products-Category', compact('category', 'products'));
    }


}
