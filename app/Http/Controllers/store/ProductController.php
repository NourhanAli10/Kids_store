<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_products()
    {
        $products = Product::all();
        return response()->json($products);
    }


    public function newProducts()
    {
        $newProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        return response()->json($newProducts);

    }


    public function Best_selling()
    {

    }


    public function offers()
    {

    }


    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        dd($productId);

        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found!');
        }

        // Add product to cart
        $cart = session()->get('cart', []);
        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
        ];
        session()->put('cart', $cart);

        return redirect()->route('product-details')->with('success', 'Product added to cart successfully!');
    }


}
