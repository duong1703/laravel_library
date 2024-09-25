<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIPs = [
            '192.168.0.166',   
            '103.186.147.106',
            '127.0.0.1',   
        ];
        // Nếu yêu cầu tới IP cho phép thì được phép truy cập , và ngược lại
        if (!in_array($request->ip(), $allowedIPs)) {
            abort(403, 'Unauthorized access.');
        }
        return $next($request);
    }
}
