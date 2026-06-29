<?php
/*
========================================
File: PasswordController.php

Description:
Controller responsible for updating the
authenticated user's password.

Purpose:
- Allows logged-in users to change their password
- Validates current password before update
- Ensures secure password update process

Main Functions:

- update(Request $request):
  Handles password update request:
  - Validates input using updatePassword bag:
      * current_password must be correct
      * new password must be confirmed
      * password must follow Laravel default rules
  - Updates authenticated user password
  - Hashes new password before saving
  - Returns back with success status

Validation Rules:
- current_password: required, must match current user password
- password: required, confirmed, strong password rules

Security Features:
- Verifies current password before allowing change
- Uses Laravel built-in "current_password" validation rule
- Password is securely hashed using Hash::make()
- Prevents unauthorized password changes

Database Relations:
- Operates on authenticated User model only

Author:
Nada Khaled

Notes:
- Used for logged-in users only (profile settings)
- Works independently from reset password system
- Uses Laravel validation bag for organized error handling
========================================
*/
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return back()->with('status', 'password-updated');
    }
}
