<?php
/*
========================================
File: ProfileDrController.php

Description:
Controller responsible for managing the
doctor profile section in the system.

Purpose:
- Displays doctor profile information
- Allows doctor to view and edit personal data
- Handles profile image update
- Manages linked doctor and user data

Main Functions:

- index():
  Retrieves the authenticated doctor profile
  including:
  - User information
  - Assigned courses
  Then displays it in the profile view.

- edit():
  Loads the doctor profile data for editing.

- update(Request $request):
  Updates doctor personal information:
  - Name
  - Phone number
  - Profile image (with storage replacement)
  Ensures old image is deleted from storage
  before uploading a new one.

Important Notes:
- Uses Auth to get the currently logged-in doctor
- Profile image is stored in storage/app/public/users
- Ensures safe deletion of old images before update
- Updates only user-related fields (not doctor academic data)

Author:
Nada Khaled

========================================
*/
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Doctor;

class ProfileDrController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $doctor = Doctor::with('user', 'doctorCourses.course')
            ->where('user_id', $user->id)
            ->firstOrFail();
        return view('pages-profile-dr', compact('doctor'));
    }

    public function edit()
    {
        $user = Auth::user();
        $doctor = Doctor::with('user')->where('user_id',  $user->id)->firstOrFail();
        return view('pages-profile-dr', compact('doctor'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $doctor = Doctor::with('user')->where('user_id', $user->id)->firstOrFail();
        if ($request->hasFile('image')) {
            if ($doctor->user->image && Storage::disk('public')->exists($doctor->user->image)) {
                Storage::disk('public')->delete($doctor->user->image);
            }
            $imagePath = $request->file('image')->store('users', 'public');
            $doctor->user->image = $imagePath;
        }
        $doctor->user->name  = $request->name;
        $doctor->user->phone = $request->phone;
        $doctor->user->save();
        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
    }
}
