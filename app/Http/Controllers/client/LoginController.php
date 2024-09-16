<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\member;
use Http;
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
        $turnstileToken = $request->input('cf-turnstile-response');

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => env('SECRET_KEY'),
            'response' => $turnstileToken,
            'remoteip' => $request->ip(),
        ]);

        $responseData = $response->json();

        if ($responseData['success']) {
            $credentials = $request->only('name_login', 'password');

            if (Auth::guard('member')->attempt($credentials)) {
                return redirect()->route('user_home');

            }

            return redirect()->route('user_login')->withErrors([
                'name_login' => 'Tên đăng nhập không chính xác.',
                'password' => 'Password đăng nhập không chính xác.',
            ]);
        } else {
            return redirect()->back()->withErrors([
                'captcha_failed' => 'Xác thực captcha không thành công.',
            ]);
        }
    }


    public function userLogoutpost(Request $request): RedirectResponse
    {
        Auth::guard('member')->logout();
        return redirect()->route('user_home');
    }
}
