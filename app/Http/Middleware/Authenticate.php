<?php
/*
========================================
File: Authenticate.php (Middleware)

Description:
Middleware responsible for handling authentication checks
and redirecting unauthenticated users to the login page.

Purpose:
- Ensures that only authenticated users can access protected routes
- Redirects guests to the login page if they are not logged in
- Handles both web and API authentication behavior

Main Functions:

- redirectTo(Request $request):
  Determines where unauthenticated users should be redirected
  - Returns null for JSON/API requests
  - Redirects web users to the login route

Behavior:
- If user is authenticated → allow request to proceed
- If user is not authenticated → redirect to login page

Authentication Flow:
- Used automatically by Laravel middleware stack
- Applied to protected routes via 'auth' middleware

Author:
Nada Khaled

Notes:
- Extends Laravel default Authenticate middleware
- Supports both API (JSON) and web requests
========================================
*/
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
