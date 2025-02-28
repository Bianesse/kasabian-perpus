<?php

use Illuminate\Http\Request;
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
            "auth" => \App\Http\Middleware\AuthMiddleware::class,
            "logout" => \App\Http\Middleware\LogoutMiddleware::class,
            "role" => \App\Http\Middleware\RoleMiddleware::class,
            "checkPengembalian" => \App\Http\Middleware\PengembalianCheckMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
