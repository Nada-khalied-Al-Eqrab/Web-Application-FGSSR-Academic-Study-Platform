<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;

use Illuminate\Support\Facades\Route;

//Team Members: Nada Khaled Said Ibrahim /////////////////////////////////////////////////////////////////////////////////////////////////
/*
========================================================
Authentication Routes (Login & Register System)

Description:
This section handles the authentication flow of the system,
including user registration, login, password update, and logout.

Route Groups:

1) guest middleware:
   - These routes are accessible only for non-authenticated users.
   - Includes:
     • Register page (GET /register)
     • Register submit (POST /register)
     • Login page (GET /login)
     • Login submit (POST /login)

   Purpose:
   - Allow new users to create accounts
   - Allow existing users to login safely
   - Prevent logged-in users from accessing login/register pages

2) auth middleware:
   - These routes are accessible only for authenticated users.
   - Includes:
     • Password update (PUT /password)
     • Logout (POST /logout)

   Purpose:
   - Allow users to securely update their password
   - Allow users to logout and destroy session

Security Notes:
- guest middleware prevents logged-in users from accessing auth pages
- auth middleware protects sensitive actions
- Sessions are used to manage user authentication state

Author:
Nada Khaled
========================================================
*/
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
Route::middleware('auth')->group(function () {
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
