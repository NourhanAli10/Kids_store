<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */

    public function create(): View
    {
        $currentRouteName = Route::currentRouteName();

        if ($currentRouteName === 'admin.login') {
            return view('dashboard.auth.login');
        } else {
            return view('store.auth.login');
        }
    }

    /**
     * Handle an incoming authentication request.
     */

     public function store(LoginRequest $request): RedirectResponse
     {
         $request->authenticate();

         $request->session()->regenerate();

         $user = Auth::user();

         if ($user->role === 'admin') {
             return redirect()->route('dashboard');
         }
         return redirect()->route('home');
     }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
