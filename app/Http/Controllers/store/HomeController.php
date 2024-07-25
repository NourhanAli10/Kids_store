<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() : View
    {
        $products = Product::with('images')->get();
        $brands = Brand::all();
        $categories = Category::all();
        return view('store.index', compact('products', 'brands', 'categories'));
    }


    public function CategoryProducts($slug) {

        return view('store.shop');
    }


    public function ProductBoys() : View
    {
        $products = Product::where('images')->get();

        return view('store.index', compact('products', 'brands'));
    }

    public function newProducts()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return response()->json($products);
    }


    public function Offers()
    {
        $products = Product::all();

    }


    public function showAllProducts()
    {
        $products = Product::all();
        return view('store.shop', compact('products'));

    }



}
