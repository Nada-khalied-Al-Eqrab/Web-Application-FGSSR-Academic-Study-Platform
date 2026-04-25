<?php
/*
========================================
File: bootstrap/app.php

Description:
Application bootstrap configuration file.
Initializes the Laravel application and
configures routing, middleware, and exceptions.

Purpose:
- Defines application base path
- Registers route files (web, console)
- Configures middleware aliases
- Sets up exception handling

Configuration:
- Routing:
  Loads web routes and console commands
  Defines health check endpoint (/up)

- Middleware:
  - checkrole: Custom role-based access middleware
  - active: Middleware to check if user is active

- Exceptions:
  Placeholder for custom exception handling

Author:
Nada Khaled

Notes:
- Entry point for configuring core application behavior
- Middleware aliases simplify usage in routes
- Can be extended for global exception handling
========================================
*/
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckUserActive;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checkrole' => \App\Http\Middleware\CheckRole::class,
            'active' => CheckUserActive::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
    })->create();
