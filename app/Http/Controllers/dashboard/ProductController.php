<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Services\Media;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\dashboard\StoreProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['colors', 'sizes'])->orderBy('created_at', 'DESC')->get();
        return view('dashboard.product.all-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('dashboard.product.create-product', compact(
            'categories',
            'brands',
            'colors',
            'sizes'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduct $request)
    {


        $data = $request->except('_token', 'image');
        $slug = Str::slug($request->name, '-');
        $productId = Product::max('id') + 1;
        $data['slug'] = $slug . '-' . $productId;
        $data['created_by'] = Auth::user()->name;
        $product = Product::create($data);


        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $media = new Media();
                $imageUrl = $media->UploadMedia($image, 'products');
                $productImage['image_url'] = $imageUrl;
                $productImage['product_id'] = $product->id;
                Image::create($productImage);
            }
        }

        foreach ($request->colors as $colorId) {
            foreach ($request->sizes as $sizeId) {
                DB::table('product_variants')->insert([
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                    'size_id' => $sizeId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        return redirect()->back()->with('success', 'Product added successfully!');

        // if ($product) {
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Product has been added successfully',
        //     ]);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Product has not been added successfully',
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        return view();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);


        $data = $request->except('image', '_token', '_method');

        if ($request->file('image'))
        {
            $media = new Media;
            $NewImageName = $media->UploadMedia($request->file('image'), 'products');
            $data['image'] = $NewImageName;
            $media->deleteMedia($product->image, 'products');
        };
        $product->update($data);
        return redirect()->route('dashboard.all-products')->with('success', 'product has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        $media = new Media;
        $media->deleteMedia($product->image, 'products');
        $product->delete();
        return redirect()->back()->with('success', 'product has been deleted successfully');

    }
}
