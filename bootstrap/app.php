<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AuthAdmin::class,
            'nocache' => \App\Http\Middleware\nocache::class,
            'blockip' => \App\Http\Middleware\blockip::class,
            'AuthAdmin' => \App\Http\Middleware\AuthAdmin::class,
            'CheckUserIsLoggedIn' => \App\Http\Middleware\CheckUserIsLoggedIn::class,
            'admin_session' => \App\Http\Middleware\AdminSessionMiddleware::class,
            'member_session' => \App\Http\Middleware\MemberSessionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
