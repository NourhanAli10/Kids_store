<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function register()
    {
        return view('dashboard.auth.register');
    }
}

