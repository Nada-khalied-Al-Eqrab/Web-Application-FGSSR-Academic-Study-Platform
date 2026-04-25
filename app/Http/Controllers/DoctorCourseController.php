<?php
/*
========================================
File: DoctorCourseController.php

Description:
Controller responsible for managing the
assignment of courses to doctors.

Purpose:
- Handles the relationship between doctors and courses
- Assigns courses to doctors for teaching
- Updates and removes course assignments
- Sends notifications when assignments are created or updated

Main Functions:

- index():
  Displays all doctor-course assignments
  with related doctor and course information.

- create():
  Loads all doctors and courses to create
  a new assignment between them.

- store(Request $request):
  Creates a new doctor-course relationship and:
  - Assigns a course to a doctor
  - Sends notifications to:
    * The assigned doctor
    * Other doctors teaching the same course
    * Admin users
  - Includes details about who performed the action

- edit($id):
  Loads a specific doctor-course assignment
  for editing.

- update(Request $request, $id):
  Updates the assigned doctor or course and:
  - Sends notification about the modification
  - Notifies related doctors and admins

- destroy($id):
  Deletes a specific doctor-course assignment.

- deleteAll():
  Removes all doctor-course assignments
  using database truncation inside a transaction.

Important Notes:
- Uses many-to-many relationship via doctor_courses table
- Includes real-time notification system using Laravel Notifications
- Ensures communication between admins and doctors on changes
- Uses Auth to track action performer

Author:
Nada Khaled

========================================
*/
namespace App\Http\Controllers;

use App\Models\DoctorCourse;
use App\Models\Doctor;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseNotification;

class DoctorCourseController extends Controller
{

    public function index()
    {
        $doctorCourses = DoctorCourse::with('doctor.user', 'course')->get();
        return view('table-dr-course', compact('doctorCourses'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();
        $courses = Course::all();
        return view('form-dr-subj', compact('doctors', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'course_id' => 'required|exists:courses,id',
        ]);
        DoctorCourse::create([
            'doctor_id' => $request->doctor_id,
            'course_id' => $request->course_id,
        ]);
        $actor = Auth::user();
        $course = Course::findOrFail($request->course_id);
        $doctor = Doctor::findOrFail($request->doctor_id)->user;
        $message = "تم تخصيص المادة بواسطة {$actor->name}, الدكتور {$doctor->name} سيقوم بتدريس مادة {$course->name_ar}";
        $doctor->notify(
            new CourseNotification(
                "تخصيص مادة {$course->name_ar} لتدريسها ",
                $message,
                $course->id
            )
        );
        $courseDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->where('id', '!=', $doctor->id)
            ->get();
        $employees = User::where('role', 'admin')
            ->where('id', '!=', $actor->id)
            ->get();
        if ($courseDoctors->isNotEmpty()) {
            Notification::send($courseDoctors, new CourseNotification(" تخصيص تدريس مادة للدكتور {$doctor->name} مادة  {$course->name_ar}", $message, $course->id));
        }
        if ($employees->isNotEmpty()) {
            Notification::send($employees, new CourseNotification(" تخصيص تدريس مادة للدكتور {$doctor->name} مادة {$course->name_ar}", $message, $course->id));
        }
        return redirect()->route('doctor_courses.index')->with('success', 'تم ربط المادة بالدكتور بنجاح');
    }

    public function edit($id)
    {
        $doctorCourse = DoctorCourse::findOrFail($id);
        $doctors = Doctor::with('user')->get();
        $courses = Course::all();
        return view('form-dr-subj', compact('doctorCourse', 'doctors', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'course_id' => 'required|exists:courses,id',
        ]);
        $doctorCourse = DoctorCourse::findOrFail($id);
        $doctorCourse->update([
            'doctor_id' => $request->doctor_id,
            'course_id' => $request->course_id,
        ]);
        $actor = Auth::user();
        $course = Course::findOrFail($request->course_id);
        $doctor = Doctor::findOrFail($request->doctor_id)->user;
        $message = "تم تعديل  المادة بواسطة {$actor->name}, الدكتور {$doctor->name} سيقوم بتدريس مادة {$course->name_ar}";
        $doctor->notify(
            new CourseNotification(
                " تعديل تخصيص مادة  {$course->name_ar} لتدريسها ",
                $message,
                $course->id
            )
        );
        $courseDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->where('id', '!=', $doctor->id)
            ->get();
        $employees = User::where('role', 'admin')
            ->where('id', '!=', $actor->id)
            ->get();
        if ($courseDoctors->isNotEmpty()) {
            Notification::send($courseDoctors, new CourseNotification("  تعديل تخصيص تدريس مادة للدكتور {$doctor->name} مادة  {$course->name_ar}", $message, $course->id));
        }
        if ($employees->isNotEmpty()) {
            Notification::send($employees, new CourseNotification("  تعديل تخصيص تدريس مادة للدكتور {$doctor->name} مادة {$course->name_ar}", $message, $course->id));
        }
        return redirect()->route('doctor_courses.index')->with('success', 'تم تحديث ربط المادة بنجاح');
    }

    public function destroy($id)
    {
        $doctorCourse = DoctorCourse::findOrFail($id);
        $doctorCourse->delete();
        return redirect()->route('doctor_courses.index')->with('success', 'تم حذف الربط بنجاح');
    }

    public function deleteAll()
    {
        DB::transaction(function () {
            DoctorCourse::truncate();
        });
        return redirect()->route('doctor_courses.index')->with('success', 'تم حذف كل الروابط بنجاح');
    }
}
