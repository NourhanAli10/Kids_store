<?php

namespace App\Http\Controllers\dashboard;

use App\Services\Media;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('dashboard.category.all', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'category name is required.',
            'name.unique' => 'category name has already been taken.',
            'name.min' => 'category name must be at least 4 characters.',
            'name.max' => 'category name may not be greater than2 55 characters.',
            'status.required' => 'status field is required.',
        ];

        $request->validate([
            'name' => 'required|unique:categories|min:2|max:255',
            'status' => 'required',
            'image' => 'required',
        ], $messages);

        $data = $request->except('_token', 'image');
        $media = new Media;
        $image= $media->UploadMedia($request->file('image'), 'categories');
        $data['image'] = $image;
        $data['slug'] = Str::slug($request->input('name'), '-');
        $data['created_by'] = Auth::user()->name;
        Category::create($data);
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findorFail($id);
        return view('dashboard.category.edit', compact( 'category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findorFail($id);
        $messages = [
            'name.required' => 'category name is required.',
            'name.unique' => 'category name has already been taken.',
            'name.min' => 'category name must be at least 4 characters.',
            'name.max' => 'category name may not be greater than2 55 characters.',
            'status.required' => 'status field is required.',
        ];

        $request->validate([
            'name' => 'required|min:2|max:255',
            'status' => 'required',
        ], $messages);

        $data = $request->except('_token', '_method');
        $data['slug'] = Str::slug($request->input('name'), '-');
        $data['created_by'] = Auth::user()->name;
        if ($request->file('image'))
        {
            $media = new Media;
            $NewImageName = $media->UploadMedia($request->file('image'), 'categories');
            $data['image'] = $NewImageName;
            $media->deleteMedia($category->image, 'categories');
        };
        $category->update($data);
        return redirect()->route('admin.categories')->with('success', 'Category Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findorFail($id);
        $category->delete();
        return redirect()->back()->with( 'success','Category deleted Successfully!');
    }
}
