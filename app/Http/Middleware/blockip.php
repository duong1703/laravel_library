<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;
use Symfony\Component\HttpFoundation\Response;

class blockip
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $allowedIp = [
            '192.168.1.127',
            '103.186.147.106',
            '127.0.0.1',
        ];
        

        Log::info($request->ip());


        if (!in_array($request->ip(), $allowedIp)) {
            return response('Your IP address is not allowed to access this resource.', 403);
        }

        return $next($request);
    }
}
