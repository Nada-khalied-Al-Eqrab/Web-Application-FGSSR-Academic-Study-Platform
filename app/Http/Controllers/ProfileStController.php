<?php
/*
========================================
File: ProfileStController.php

Description:
Controller responsible for managing the
student profile page.

Purpose:
- Displays student profile information
- Allows student to view and edit their profile data
- Handles updating personal information and profile image
- Manages student progress data (courses_completed)

Main Functions:

- index():
  Retrieves authenticated student data with:
  - User information
  - Enrolled courses
  Then displays the profile page

- edit():
  Loads the student profile data for editing
  (similar to index but used for edit view)

- update(Request $request):
  Validates and updates student profile:
  - Updates name and phone from users table
  - Updates number of completed courses
  - Handles profile image upload:
    * Deletes old image from storage
    * Stores new image in "users" directory

Validation Rules:
- name: required, string, max 255
- phone: required, string, max 20
- courses_completed: required, integer, min 0
- image: optional image file (jpg, jpeg, png, webp, max 2MB)

Database Relations:
- Student belongs to User
- Student has many Courses (many-to-many relationship)

Author:
Nada Khaled

Notes:
- Uses Auth system to identify logged-in user
- Uses Storage facade for safe image handling
- Ensures consistency between User and Student tables
========================================
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;

class ProfileStController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $student = Student::with(['user', 'courses'])
            ->where('user_id', $user->id)
            ->firstOrFail();
        return view('pages-profile-st', compact('student'));
    }

    public function edit()
    {
        $user = Auth::user();
        $student = Student::with('user')
            ->where('user_id', $user->id)
            ->firstOrFail();
        return view('pages-profile-st', compact('student'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $student = Student::with('user')
            ->where('user_id', $user->id)
            ->firstOrFail();
        $request->validate([
            'name'              => 'required|string|max:255',
            'phone'             => 'required|string|max:20',
            'courses_completed' => 'required|integer|min:0',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($student->user->image && Storage::disk('public')->exists($student->user->image)) {
                Storage::disk('public')->delete($student->user->image);
            }
            $imagePath = $request->file('image')->store('users', 'public');
            $student->user->image = $imagePath;
        }
        $student->user->name  = $request->name;
        $student->user->phone = $request->phone;
        $student->user->save();
        $student->courses_completed = $request->courses_completed;
        $student->save();
        return redirect()->back()->with('success', 'تم تحديث بيانات الطالب بنجاح');
    }
}
