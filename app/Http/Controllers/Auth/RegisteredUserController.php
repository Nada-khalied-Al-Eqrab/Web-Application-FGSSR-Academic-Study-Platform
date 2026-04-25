<?php
/*
========================================
File: RegisteredUserController.php

Description:
Controller responsible for handling user
registration and account activation process.

Purpose:
- Displays registration form
- Validates registration request
- Activates pre-created user accounts (by admin)
- Controls access based on user state and role

Main Functions:

- create():
  Displays the registration view (auth.register page)

- store(Request $request):
  Handles registration process:
  - Validates input data (name, code, password)
  - Checks if user exists in database (pre-created by admin)
  - Verifies password (acts as national ID check)
  - Ensures role is admin only
  - Checks account state:
      * disabled → blocked access
      * active   → already registered
      * inactive → allow activation
  - Updates user data and activates account
  - Logs user in automatically
  - Redirects to admin dashboard

Validation Rules:
- name: required, string, max 255
- code: required, string, exactly 9 characters
- password: required, confirmed

Business Logic:
- Only pre-created users (by admin) can register
- System does NOT allow free self-registration
- Password is verified against stored hashed value
- Account activation depends on user state

User States:
- inactive → can register and activate account
- active   → already registered
- disabled → blocked by admin

Security Features:
- Prevents unauthorized account creation
- Uses hashed password verification
- Restricts registration to valid employee accounts only

Database Relations:
- Works with User model only
- Depends on role and state fields for access control

Author:
Nada Khaled

Notes:
- Custom registration flow (not public signup system)
- Designed for controlled internal system users
- Admin pre-creates accounts before activation
========================================
*/
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'size:9'],
            'password' => ['required', 'confirmed'],
        ]);
        $user = User::where('code', $request->code)->first();
        if (!$user) {
            return back()->withErrors([
                'code' => 'البيانات غير صحيحة أو الحساب غير مضاف من الإدارة.'
            ])->withInput();
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'الرقم القومي غير صحيح.'
            ])->withInput();
        }
        if ($user->role !== 'admin') {
            return back()->withErrors([
                'code' => 'يسمح فقط للموظفين بإنشاء الحساب.'
            ]);
        }
        if ($user->state === 'disabled') {
            return back()->withErrors([
                'code' => 'هذا الحساب معطل من الإدارة ولا يمكن استخدامه.'
            ]);
        }
        if ($user->state === 'active') {
            return back()->withErrors([
                'code' => 'الحساب مفعل بالفعل، يمكنك تسجيل الدخول.'
            ]);
        }
        if ($user->state === 'inactive') {
            $user->name = $request->name;
            $user->state = 'active';
            $user->save();
            Auth::login($user);
            return redirect()->route('admin.dashboard')
                ->with('success', 'تم تفعيل الحساب بنجاح');
        }
        return back();
    }
}
