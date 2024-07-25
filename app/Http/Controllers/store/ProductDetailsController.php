<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{

    public function productDetails($slug)
    {
        $product = Product::with(['images', 'sizes', 'colors'])->where('slug', $slug)->first();
        $categoryId = $product->category->id;
        $relatedProducts = Product::whereHas('category', function($query) use ($product) {
            $query->where('id',  $product->category->id);
        })
        ->where('id', '!=', $product->id)
        ->limit(4)
        ->get();
        return view('store.product-details', compact('product', 'categoryId', 'relatedProducts'));

    }





}
