<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/admin.php'));
            Route::middleware('web')
                ->group(base_path('routes/affiliate.php'));
            Route::middleware('web')
                ->group(base_path('routes/candidate.php'));
            Route::middleware('web')
                ->group(base_path('routes/committee.php'));
            Route::middleware('web')
                ->group(base_path('routes/finance.php'));
            Route::middleware('web')
                ->group(base_path('routes/legal.php'));
            Route::middleware('web')
                ->group(base_path('routes/communication.php'));
            Route::middleware('web')
                ->group(base_path('routes/dev.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'affiliation' => \App\Http\Middleware\CheckDirectoryAffiliation::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
