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
        $turnstileToken = $request->input('cf-turnstile-response');

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => env('SECRET_KEY'),
            'response' => $turnstileToken,
            'remoteip' => $request->ip(),
        ]);

        $responseData = $response->json();

        if (!$responseData['success']) {
            return redirect()->back()->withErrors([
                'captcha_failed' => 'Xác thực CAPTCHA không thành công. Vui lòng thử lại.',
            ]);
        }

       
        $credentials = $request->only('email', 'password');

      
        $admin = admin::where('email', $request->email)->first();

       
        if (!$admin) {
            return redirect()->back()->withErrors(['email' => 'Email không chính xác.']);
        }

      
        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->back()->withErrors(['password' => 'Mật khẩu không chính xác.']);
        }

      
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('homeadmin');
        }

        // Trường hợp khác, thông báo lỗi chung
        return redirect()->back()->withErrors([
            'login_failed' => 'Có lỗi xảy ra, vui lòng thử lại.',
        ]);
    }

    public function logout_process(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}