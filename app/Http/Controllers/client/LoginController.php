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

       
        $request->validate([
           'name_login' => 'required|string|max:255',
           'password' => 'required|string|min:8',
        ]);

      
        $member = member::where('name_login', $request->input('name_login'))->first();

        if ($member && Hash::check($request->input('password'), $member->password)) {

            Session::flush(); 
            $request->session()->regenerate(); 
          
            Session::put('member_name_login', $member->name_login);

         
            Auth::login($member);
            $request->session()->regenerate();

           
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công');
        }

        
        return redirect()->back()->withErrors([
            'login_failed' => 'Tên đăng nhập hoặc mật khẩu không chính xác.',
        ]);

    }


    public function userLogoutpost(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user_login');
    }
}
