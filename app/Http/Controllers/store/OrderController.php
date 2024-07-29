<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function index() {
    $user = Auth::user();
    return view('store.orders', compact('user'));
   }


   public function placeOrder(Request $request) {

    dd($request->all());


   }
}
