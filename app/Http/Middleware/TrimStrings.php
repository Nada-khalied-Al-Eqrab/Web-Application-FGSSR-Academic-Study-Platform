<?php
/*
========================================
File: CheckRole.php

Description:
Middleware responsible for restricting access
based on user role.

Purpose:
- Ensures that only users with the correct role
  can access specific routes
- Protects routes by comparing authenticated user role
  with the required role passed in middleware

Main Function:

- handle(Request $request, Closure $next, string $role):
  Checks if the authenticated user exists and
  verifies that their role matches the required role.
  - If role matches → request is allowed to proceed
  - If role does not match → aborts with 403 error

Validation Logic:
- User must be authenticated
- User role is compared case-insensitively after trimming spaces
- Unauthorized users receive 403 "Forbidden" response

Security Notes:
- Prevents unauthorized access to protected routes
- Works as role-based access control (RBAC)

Author:
Nada Khaled

Notes:
- Uses Laravel Auth facade
- Role comparison is normalized (lowercase + trim)
========================================
*/
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
