<?php

// use App\Http\Middleware\TestMiddleware;
// use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);


        // $middleware->appendToGroup('test-group', [
        //    TestMiddleware::class,
        //    CheckRoleMiddleware::class
        // ]);
        // $middleware->web(append: [
        //     TestMiddleware::class,
        //     CheckRoleMiddleware::class
        //  ]);
        //  $middleware->alias([
        //     'checkRole' =>CheckRoleMiddleware::class
        //  ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
