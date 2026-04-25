<?php
/*
========================================
File: CheckUserActive.php (Middleware)

Description:
Middleware responsible for ensuring that only active users
can access the system after authentication.

Purpose:
- Blocks users whose accounts are inactive or disabled
- Prevents login continuation for non-active accounts
- Forces logout if account state is not active

Main Function:

- handle(Request $request, Closure $next):
  Checks the authenticated user's account state

Logic:
- Retrieve authenticated user from Auth system
- Check user "state" field
- If state is NOT 'active':
  - Logout the user
  - Redirect to login page
  - Display error message explaining account restriction
- If state is 'active':
  - Allow request to proceed normally

Account States:
- active   → user allowed access
- inactive → not yet activated
- disabled → blocked by administration

Security Purpose:
- Prevents unauthorized access from inactive accounts
- Enforces administrative control over user access

Author:
Nada Khaled

Notes:
- Works after authentication middleware
- Commonly used for admin-controlled user activation systems
========================================
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserActive
{
    public function handle(Request $request, Closure $next)
    {
        $users = Auth::user();
        if ($users && $users->state !== 'active') {
            Auth::logout();
            return redirect()->route('login')
                ->with('error',
                'عذرا ، لا يمكنك تسجيل الدخول الى المنصة و هذا لان حسابك  غير مفعل او معطل ، تواصل مع الادارة لمعرفت سبب ايقاف حسابك '
                );
        }
        return $next($request);
    }
}
