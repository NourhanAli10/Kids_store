<?php

namespace App\Http\Controllers\store;

use App\Models\Cart as CartModel;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $data = $request->except('_token');
        $request->validate([
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'product_id' => 'exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $data['id'] = $product->id;
        $data['name'] =  $product->name;
        $data['price'] = $product->price;
        $data['size_id'] = $request->size_id;
        $data['color_id'] = $request->color_id;
        $data['attributes'] = [
            'size' => $product->sizes->find($request->size_id)->name,
            'color' => $product->colors->find($request->color_id)->name,
            'image' => $product->images[0],
        ];
        if (Auth::check()) {
            $data['user_id'] = Auth::id();
            CartModel::create($data);
        } else {
            cart::add($data);
        }
        return redirect()->back()->with('message', 'Product has been added to cart');
    }


    public function cart()
    {
        $cart = Cart::getContent();
        return view('store.cart', compact('cart'));
    }

}
