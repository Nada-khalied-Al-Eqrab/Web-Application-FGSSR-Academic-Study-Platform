<?php
/*
========================================
File: Kernel.php

Description:
HTTP Kernel configuration file responsible for
registering global middleware, middleware groups,
and route middleware aliases in the Laravel application.

Purpose:
- Defines global middleware executed on every request
- Organizes middleware into groups (web / api)
- Registers middleware aliases for easy route usage
- Controls request lifecycle security and filtering

Main Sections:

1. Global Middleware Stack ($middleware):
   - Runs on every HTTP request
   - Handles tasks like:
     * Proxy trust handling
     * CORS handling
     * Maintenance mode protection
     * Input trimming and sanitization

2. Middleware Groups ($middlewareGroups):

   - web:
     Used for web routes and includes:
     * Cookie encryption
     * Session handling
     * CSRF protection
     * Error sharing via session
     * Route model binding

   - api:
     Used for API routes and includes:
     * Stateful authentication (Sanctum)
     * Request throttling
     * Route model binding

3. Middleware Aliases ($middlewareAliases):
   Provides short names for middleware used in routes:

   - auth:
     Ensures user authentication

   - guest:
     Redirects authenticated users away from guest pages

   - checkrole:
     Custom middleware to restrict access based on user role

   - active:
     Custom middleware to ensure user account is active

   - throttle:
     Limits request rate

   - verified:
     Ensures email verification is completed

Security Notes:
- Protects application routes from unauthorized access
- Enforces authentication, authorization, and rate limiting
- Central point for middleware management

Author:
Nada Khaled
========================================
*/
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];
    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // Middleware
        'checkrole' => \App\Http\Middleware\CheckRole::class,
        'active' => \App\Http\Middleware\CheckUserActive::class,
    ];
}
