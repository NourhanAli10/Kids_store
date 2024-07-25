<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::all();
        return view('dashboard.size.all', compact('sizes'));
    }

    public function create() {
        return view('dashboard.size.add');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|unique:sizes,name|min:2',
        ]);

        $data = $request->except('_token');
        $data['created_by'] = Auth::user()->name;
        Size::create($data);
        return redirect()->back()->with('success', 'Size has been added successfully!');

    }

    public function edit(string $id) {
        $size = Size::findOrFail($id);
        return view('dashboard.size.edit', compact('size'));
    }


    public function update(Request $request, string $id) {

        $color = Size::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:sizes,name|min:2',
        ]);
        $data = $request->except('_token');
        $color->update($data);
        return redirect()->route('dashboard.all-sizes');

    }
    public function destroy(string $id) {
        $color = Size::findOrFail($id);
        $color->delete();
        return redirect()->back()->with('success', 'size has been deleted successfully');
    }
}
