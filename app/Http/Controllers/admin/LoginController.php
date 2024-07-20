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

        Log::info('Thông tin đăng nhập:', $credentials);

        if (Auth::attempt($credentials)) {
            Log::info('Đăng nhập thành công');
            $user = Auth::user();
            Session::put('user_name', $user->name);
            return redirect()->intended('views/admin/pages/home');
        }

        Log::info('Đăng nhập thất bại');
        return redirect('views/admin/pages/login')->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function logout_process(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginadmin');
    }
}