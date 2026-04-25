<?php
/*
========================================
File: helpers.php

Description:
Contains helper functions to dynamically
determine user routes based on their role.

Functions:
- userProfileRoute():
  Returns the profile page route depending on
  the authenticated user's role (admin, student, doctor).

- userSettingsRoute():
  Returns the profile edit/settings route based on
  the authenticated user's role.

Author:
Nada Khaled

Notes:
- Uses Laravel Auth to get the current user
- Returns '#' if no user is authenticated or role is undefined
- Helps centralize route handling for different user roles
========================================
*/
use Illuminate\Support\Facades\Auth;

if (!function_exists('userProfileRoute')) {
    function userProfileRoute() {
        $user = Auth::user();
        if (!$user) return '#';

        switch ($user->role) {
            case 'admin':
                return route('profile.admin');
            case 'student':
                return route('profile.st');
            case 'doctor':
                return route('profile.dr');
            default:
                return '#';
        }
    }
}

if (!function_exists('userSettingsRoute')) {
    function userSettingsRoute() {
        $user = Auth::user();
        if (!$user) return '#';
        switch ($user->role) {
            case 'admin':
                return route('profile.admin.edit');
            case 'student':
                return route('profile.st.edit');
            case 'doctor':
                return route('profile.dr.edit');
            default:
                return '#';
        }
    }
}
