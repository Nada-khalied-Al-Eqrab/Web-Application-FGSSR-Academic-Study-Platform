<?php
/*
========================================
File: CheckRole.php (Middleware)

Description:
Middleware responsible for restricting access to routes
based on the user's role (authorization layer).

Purpose:
- Ensures users can only access routes allowed for their role
- Prevents unauthorized access to admin/doctor/student areas
- Validates user role before proceeding with request

Main Function:

- handle(Request $request, Closure $next, string $role):
  Checks the authenticated user's role and compares it with
  the required role for the route.

Logic:
- Retrieve authenticated user from Auth system
- Compare user role with required role parameter
- Case-insensitive comparison using trim + strtolower
- If mismatch or user not authenticated → abort with 403 error
- Otherwise → allow request to proceed

Access Control:
- Role-based access control (RBAC)
- Used in routes via middleware alias 'checkrole'

Error Handling:
- Returns HTTP 403 Forbidden with message:
  "غير مصرح لك بالدخول لهذه الصفحة."

Author:
Nada Khaled

Notes:
- Lightweight role validation middleware
- Can be extended to support multiple roles in future
========================================
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();
        if (!$user || strtolower(trim($user->role)) !== strtolower(trim($role))) {
            abort(403, 'غير مصرح لك بالدخول لهذه الصفحة.');
        }
        return $next($request);
    }
}
