<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'superadmin') {
            return redirect('/views/admin/pages/login')->with('error', 'Bạn cần đăng nhập với tư cách quản trị viên để truy cập.');
        }

        return $next($request);
    }
}
