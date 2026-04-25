<?php
/*
========================================
File: UserController.php

Description:
Main dashboard controller responsible for
rendering different home pages based on
the authenticated user role (Admin, Student, Doctor).

Purpose:
- Routes users to their role-based dashboards
- Aggregates key statistics for each role
- Loads related data for dashboard views
- Central entry point after login

Main Functions:

- indexEm():
  Admin dashboard:
  - Retrieves authenticated admin user
  - Counts total:
    * Students
    * Doctors
    * Admins
    * Diplomas
  Displays admin dashboard view

- index():
  Student dashboard:
  - Loads authenticated student with:
    * Enrolled courses
    * Diploma information
  - Loads all diplomas and files
  - Calculates:
    * Registered courses count
    * Completed courses
    * Remaining courses
    * Total progress overview
  - Groups courses by diploma type

- indexDr():
  Doctor dashboard:
  - Loads doctor with assigned courses and students
  - Calculates:
    * Number of assigned subjects
    * Weekly hours (based on subjects)
    * Weekly lectures
    * Total students under supervision

User Roles Supported:
- admin
- student
- doctor

Database Relations Used:
- User ↔ Admin
- User ↔ Student
- User ↔ Doctor
- Doctor ↔ Courses ↔ Students
- Student ↔ Courses ↔ Diploma

Business Logic:
- Each role has a separate dashboard view
- Aggregates real-time statistics for UI display
- Uses Eloquent relationships for optimized queries

Author:
Nada Khaled

Notes:
- Acts as a central dashboard controller
- Strong dependency on Auth system
- Heavy use of eager loading for performance
========================================
*/
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Doctor;
use App\Models\Diploma;
use App\Models\File;

class UserController extends Controller
{
    // ================= ADMIN DASHBOARD =================
    public function indexEm()
    {
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->firstOrFail();
        $studentsCount  = Student::count();
        $doctorsCount   = Doctor::count();
        $adminsCount    = Admin::count();
        $diplomasCount  = Diploma::count();
        return view('index-em', compact('user', 'admin', 'studentsCount', 'doctorsCount', 'adminsCount', 'diplomasCount'));
    }
    // ================= STUDENT DASHBOARD =================
    public function index()
    {
        $user = Auth::user();
        $student = Student::with(['courses', 'diploma'])
            ->where('user_id', $user->id)
            ->firstOrFail();
        $diplomas = Diploma::all();
        $files = File::all();
        $registeredCoursesCount = $student->courses->count();
        $totalCourses = 20;
        $completedCourses = $student->courses_completed ?? 0;
        $remainingCourses = $totalCourses - $completedCourses - $registeredCoursesCount;
        $coursesByType = $student->diploma
            ? $student->diploma->courses
            : collect();
        return view('index', compact(
            'student',
            'diplomas',
            'files',
            'registeredCoursesCount',
            'remainingCourses',
            'totalCourses',
            'coursesByType'
        ));
    }
    // ================= DOCTOR DASHBOARD =================
    public function indexDr()
    {
        $user = Auth::user();
        $doctor = Doctor::with('doctorCourses.course.students')
            ->where('user_id', $user->id)
            ->firstOrFail();
        $diplomas = Diploma::all();
        $subjectsCount = $doctor->doctorCourses->count();
        $weeklyHours = $subjectsCount * 3;
        $weeklyLectures = $subjectsCount;
        $studentsCount = $doctor->doctorCourses->sum(function ($dc) {
            return $dc->course->students->count();
        });
        return view('index-dr', compact('doctor', 'diplomas', 'subjectsCount', 'weeklyHours', 'weeklyLectures', 'studentsCount'));
    }
}
