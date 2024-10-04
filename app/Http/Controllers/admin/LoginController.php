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

        if ($responseData['success']) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('homeadmin');

            }

            return redirect()->route('login')->withErrors([
                'email' => 'Email đăng nhập không chính xác.',
                'password' => 'Password đăng nhập không chính xác.',
            ]);
        } else {
            return redirect()->back()->withErrors([
                'captcha_failed' => 'Xác thực captcha không thành công.',
            ]);
        }
    }
    
    public function logout_process(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}