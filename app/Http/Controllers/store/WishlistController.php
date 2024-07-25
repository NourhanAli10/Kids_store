<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function index() {
        $products = auth()->user()->wishlist()->latest()->get();

        return view('store.wishlist', compact('products'));

    }



    public function store()
    {
        $product_id = request('productId');
        $user = auth()->user();
        if ($user) {
            $wishlistItem = auth()->user()->wishlist()->where('product_id', $product_id)->first();
            if (!$wishlistItem) {
                $user->wishlist()->attach($product_id);
                return response()->json(['msg' => 'Product has been added to wishlist']);
            }
            else {
                return response()->json(['msg' => 'Product already in wishlist']);

            }
        }
        else {
            return response()->json(['msg' => 'Please login to add product to wishlist']);
        }

    }


    public function destroy() {
        $product_id = request('productId');
        auth()->user()->wishlist()->detach($product_id);
        return response()->json(['msg' => 'product has been deleted']);
    }
}
