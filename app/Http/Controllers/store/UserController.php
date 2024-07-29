<?php

namespace App\Http\Controllers\store;

use App\Models\City;
use App\Models\User;
use App\Models\Region;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profilePage() {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        return view('store.user-profile', compact('user'));
    }


    public function UpdateProfile(Request $request, string $id) {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|min:2|max:150',
            'email' => 'required|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/|max:190',
            'phone' => 'required|digits:11|regex:/^01[0125][0-9]{8}$/',
        ]);
        $data = $request->except('_token');
        $user->update($data);
        return redirect()->back()->with('success', 'User has been updated successfully!');
    }

    public function StoreAddress(Request $request) {
        $userId = Auth::user()->id;
        $city = City::firstOrCreate(['name' => $request->city]);
         $region = Region::firstOrCreate(['name' => $request->region, 'city_id' => $city->id]);
        $data = $request->except('_token', 'city', 'region');
        $data['user_id'] = $userId;
        $data['region_id'] = $region->id;
        Address::create($data);
       return redirect()->back()->with('success', 'Address has been added successfully!');
    }

    





}
