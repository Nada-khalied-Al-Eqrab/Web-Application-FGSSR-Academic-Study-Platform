<?php
/*
========================================
File: LoginRequest.php

Description:
Form Request class responsible for handling
user login validation and authentication logic.

Purpose:
- Validates login input data (code & password)
- Handles authentication attempts using Laravel Auth
- Applies rate limiting to prevent brute-force attacks
- Manages login failure responses and error messages

Main Methods:

1. authorize():
   - Always returns true
   - Allows any user to attempt login

2. rules():
   - Validates incoming request fields:
     * code: required string (used instead of email)
     * password: required string

3. authenticate():
   - Attempts to log in the user using provided credentials
   - Uses Auth::attempt with code + password
   - Applies rate limiter on failed attempts
   - Throws validation error if authentication fails

4. ensureIsNotRateLimited():
   - Prevents excessive login attempts
   - Limits attempts to 5 tries
   - Triggers lockout event if exceeded

5. throttleKey():
   - Generates unique rate-limit key using:
     * user code (lowercased & sanitized)
     * IP address

Security Notes:
- Protects against brute-force login attacks
- Uses Laravel RateLimiter for security control
- Ensures only valid credentials are processed

Author:
Nada Khaled
========================================
*/
namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // استخدم 'code' بدل 'email'
        if (! Auth::attempt($this->only('code', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'code' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'code' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('code')).'|'.$this->ip());
    }
}
