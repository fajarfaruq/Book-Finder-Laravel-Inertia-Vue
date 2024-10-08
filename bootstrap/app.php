<?php

// Add this line at the top
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\LoginVerification;
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
        $middleware->alias(['LoginVerification' => LoginVerification::class,]);
    })
    ->withExceptions(function (Exceptions $exceptions) {})
    // Find the line starting with ->withMiddleware and modify the contents
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class
        ]);
    })
    ->create();
