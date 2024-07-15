<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use Auth;
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
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password) && $admin->role === 'admin') {
            Auth::login($admin);
            $request->session()->regenerate();

            return redirect()->route('homeadmin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records or you do not have admin access.',
        ])->onlyInput('email');
    }

    public function logout_process(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginadmin');
    }
}