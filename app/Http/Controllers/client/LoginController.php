<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\member;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;
use Hash;
use Session;

class LoginController extends Controller
{
    public function user_login()
    {
        return view('client/pages/login');
    }

    public function userLoginpost(Request $request): RedirectResponse
    {

        // Xác thực thông tin đầu vào
        $request->validate([
            'name_login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tìm kiếm member với tên đăng nhập
        $member = Member::where('name_login', $request->input('name_login'))->first();

        if ($member && Hash::check($request->input('password'), $member->password)) {
            // Lưu thông tin member vào session
            Session::put('member_name_login', $member->name_login);

            // Tùy chọn: Sử dụng Auth::login nếu bạn muốn dùng Auth
            Auth::login($member);
            $request->session()->regenerate();

            // Chuyển hướng sau khi đăng nhập thành công
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công');
        }

        // Nếu thông tin đăng nhập không đúng
        return redirect()->back()->withErrors([
            'login_failed' => 'Tên đăng nhập hoặc mật khẩu không chính xác.',
        ]);

    }


    public function userLogoutpost(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user_home');
    }
}
