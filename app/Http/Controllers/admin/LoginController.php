<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use Auth;
use Http;
use Illuminate\Support\Facades\Session;
use Log;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function admin_login()
    {
        return view('/admin/pages/login');
    }

    public function login_process(Request $request)
    { 
        {
            $remember = $request->has('remeber');

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::guard('admin')->attempt($credentials, $remember)) {
                return redirect()->route('homeadmin');

            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function admin_forgot_pass()
    {
        return view('/admin/auth/forgot-password');
    }

    public function logout_process(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}