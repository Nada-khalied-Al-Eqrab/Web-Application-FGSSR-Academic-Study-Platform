<?php
/*
========================================
File: ProfileEmController.php

Description:
Controller responsible for managing the
admin (employee) profile section in the system.

Purpose:
- Displays admin profile information
- Allows admin to view and edit personal data
- Handles profile image updates
- Manages linked admin and user data

Main Functions:

- index():
  Retrieves the authenticated admin profile
  including user-related information,
  then displays it in the profile view.

- edit():
  Loads admin profile data for editing purposes.

- update(Request $request):
  Updates admin personal information:
  - Name
  - Phone number
  - Profile image (with safe replacement)
  Validates input data before updating.

Important Notes:
- Uses Auth to get the currently logged-in admin
- Profile images are stored in storage/app/public/users
- Automatically deletes old image before uploading a new one
- Updates only user-related fields linked to Admin model

Author:
Nada Khaled

========================================
*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Admin;

class ProfileEmController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $admin = Admin::with('user')
            ->where('user_id', $user->id)
            ->firstOrFail();
        return view('pages-profile-em', compact('admin'));
    }

    public function edit()
    {
        $user = Auth::user();
        $admin = Admin::with('user')
            ->where('user_id', $user->id)
            ->firstOrFail();
        return view('pages-profile-em', compact('admin'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $admin = Admin::with('user')
            ->where('user_id', $user->id)
            ->firstOrFail();
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($admin->user->image && Storage::disk('public')->exists($admin->user->image)) {
                Storage::disk('public')->delete($admin->user->image);
            }
            $imagePath = $request->file('image')->store('users', 'public');
            $admin->user->image = $imagePath;
        }
        $admin->user->name  = $request->name;
        $admin->user->phone = $request->phone;
        $admin->user->save();
        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
    }
}
