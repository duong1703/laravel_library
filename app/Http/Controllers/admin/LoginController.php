<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use Auth;
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
        $credentials = $request->only('email', 'password');


        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('views/admin/pages/home');
        }


        return redirect('views/admin/pages/login')->withErrors([
            'email' => 'Email đăng nhập không chính xác.',
            'password' => 'Password đăng nhập không chính xác.',
        ]);
    }

    public function logout_process(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('loginadmin');
    }
}