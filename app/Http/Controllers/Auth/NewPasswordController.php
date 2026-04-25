<?php
/*
========================================
File: NewPasswordController.php

Description:
Controller responsible for handling the
password reset process for users.

Purpose:
- Displays password reset form
- Validates password reset request
- Updates user password securely
- Triggers password reset event

Main Functions:

- create(Request $request):
  Displays the password reset view:
  - Passes request data to the view
  - Loads reset password form

- store(Request $request):
  Handles new password submission:
  - Validates input:
      * code must exist in users table
      * password must be confirmed and meet rules
  - Finds user by unique code
  - Hashes and updates new password
  - Saves changes to database
  - Triggers PasswordReset event
  - Redirects user based on role logic route

Validation Rules:
- code: required, must exist in users table
- password: required, confirmed, strong password rules

Security Features:
- Password hashing using Hash::make()
- Uses Laravel Password Reset event system
- Prevents direct password storage
- Ensures only valid users can reset password

Database Relations:
- Works directly with User model
- Uses "code" field as identifier instead of email

Author:
Nada Khaled

Notes:
- Custom password reset flow (not email-based)
- Uses user code for authentication instead of email
- Redirects to role-based routing after reset
========================================
*/
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => ['required', 'exists:users,code'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::where('code', $request->code)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->save();
        event(new PasswordReset($user));
        return redirect('/redirect-by-role')->with('status', 'تم تغيير كلمة المرور بنجاح');
    }
}
