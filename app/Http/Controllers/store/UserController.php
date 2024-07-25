<?php

namespace App\Http\Controllers\store;

use App\Models\User;
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

    


    
}
