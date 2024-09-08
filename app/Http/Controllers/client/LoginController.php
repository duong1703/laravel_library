<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\member;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;
use Hash;
use Session;
use Illuminate\Support\Facades\Log;
class LoginController extends Controller
{
    public function user_login()
    {
        return view('client/pages/login');
    }

    public function userLoginpost(Request $request): RedirectResponse
    {


        $credentials = $request->only('name_login', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công');
            
        }

        return redirect()->back()->withErrors([
            'login_failed' => 'Tên đăng nhập hoặc mật khẩu không chính xác.',
        ]);

    }


    public function userLogoutpost(Request $request): RedirectResponse
    {
        Auth::guard('member')->logout();
        return redirect()->route('user_home');
    }
}
