<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('dashboard.colors.all', compact('colors'));
    }

    public function create() {
        return view('dashboard.colors.add');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|unique:colors,name|min:2',
            'code' => 'required|unique:colors,code',
        ]);

        $data = $request->except('_token');
        $data['created_by'] = Auth::user()->name;
        Color::create($data);
        return redirect()->back()->with('success', 'Color has been added successfully!');

    }

    public function edit(string $id) {
        $color = Color::findOrFail($id);
        return view('dashboard.colors.edit', compact('color'));
    }


    public function update(Request $request, string $id) {

        $color = Color::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:colors,name|min:2',
            'code' => 'required|unique:colors,code',
        ]);
        $data = $request->except('_token');
        $color->update($data);
        return redirect()->back()->with('success', 'Color has been added successfully!');

    }
    public function destroy(string $id) {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->back()->with('success', 'color has been deleted successfully');
    }
}





