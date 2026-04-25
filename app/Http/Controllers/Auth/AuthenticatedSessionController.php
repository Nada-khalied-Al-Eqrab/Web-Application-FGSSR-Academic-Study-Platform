<?php
/*
========================================
File: AuthenticatedSessionController.php

Description:
Controller responsible for handling user
authentication (login/logout) and redirecting
users based on their roles.

Purpose:
- Displays login page
- Authenticates users
- Redirects users to role-based dashboards
- Handles logout and session destruction

Main Functions:

- create():
  Returns the login view (auth.login page)

- store(LoginRequest $request):
  Handles login request:
  - Validates credentials using LoginRequest
  - Authenticates user
  - Regenerates session for security
  - Redirects user based on role:
      * admin   → admin dashboard
      * doctor  → doctor dashboard
      * student → student dashboard
  - Redirects back to login if role is invalid

- destroy(Request $request):
  Logs out the user:
  - Invalidates session
  - Regenerates CSRF token
  - Redirects to login page

User Roles Supported:
- admin
- doctor
- student

Security Features:
- Session regeneration after login
- Session invalidation on logout
- CSRF token regeneration
- Uses Laravel authentication guard

Database Relations:
- Depends on User model (role field)
- Role determines navigation flow

Author:
Nada Khaled

Notes:
- Central authentication controller
- Implements role-based routing after login
- Works with Laravel authentication system
========================================
*/
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\User;
use App\Models\DoctorCourse;
use App\Models\Admin;
use App\Models\Student;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        if ($user->role === 'doctor') {
            return redirect()->route('doctor.dashboard');
        }
        if ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        }
        return redirect('/login');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
