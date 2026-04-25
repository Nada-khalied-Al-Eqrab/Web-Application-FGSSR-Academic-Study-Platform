<?php
/*
========================================
File: MaterialScheduleController.php

Description:
Controller responsible for managing course materials
within the system (CRUD operations + content management + notifications).

Purpose:
- Handles creation, update, deletion, and listing of course materials
- Manages educational content (files, videos, online links, descriptions)
- Sends notifications when materials are added or updated

Main Functions:

- index():
  Retrieves all courses and materials
  and displays the material creation form

- indextable():
  Retrieves all materials
  and displays them in a table view

- store(Request $request):
  Validates and stores new course material
  ensuring each course has only one material record
  then sends notifications to:
  - Assigned doctors (except actor)
  - Enrolled students
  - Admin users (except actor)

- edit($id):
  Retrieves a specific material for editing
  along with all courses

- update(Request $request, $id):
  Updates course material data
  and sends update notifications to related users

- destroy($id):
  Deletes a specific course material record

- deleteAll():
  Deletes all course materials from the database

Validation Rules:
- course_id: required, must exist in courses table, unique in materials table
- files_link: nullable URL
- videos_link: nullable URL
- online_link: nullable URL
- description: nullable string

Notification Recipients:
- Doctors assigned to the course
- Students enrolled in the course
- Admin users (excluding actor)

Author:
Dina Salah

Notes:
- Each course can have only one material record
- Uses Laravel Notification system (database notifications)
- Relies on relationships between Course, Doctor, and Student models
========================================
*/
namespace App\Http\Controllers;

use App\Models\MaterialsSchedule;
use Illuminate\Http\Request;
use App\Models\course;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

use App\Notifications\CourseNotification;
use App\Models\User;


class MaterialScheduleController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $materials = MaterialsSchedule::all();
        return view('form-subj-contant', compact('materials', 'courses'));
    }

    public function indextable()
    {
        $materials = MaterialsSchedule::all();
        return view('table-subj-study', compact('materials'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id|unique:materials_schedules,course_id',
            'files_link' => 'nullable|url',
            'videos_link' => 'nullable|url',
            'online_link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);
        MaterialsSchedule::create($request->only([
            'course_id',
            'files_link',
            'videos_link',
            'online_link',
            'description',
        ]));
        $course = Course::findOrFail($request->course_id);
        $actor = Auth::user();
        $message = "{$actor->name} أضاف محتوى جديد لمادة {$course->name_ar}";
        $otherDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->where('id', '!=', $actor->id)
            ->get();
        $students = User::where('role', 'student')
            ->whereHas('student.courses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
        $employees = User::where('role', 'admin')
            ->where('id', '!=', $actor->id)
            ->get();
        if ($otherDoctors->isNotEmpty()) {
            Notification::send($otherDoctors, new CourseNotification("تم اضافة منهج دراسى لمادة {$course->name_ar}", $message, $course->id));
        }
        if ($students->isNotEmpty()) {
            Notification::send($students, new CourseNotification("تم اضافة منهج دراسى لمادة {$course->name_ar}", $message, $course->id));
        }
        if ($employees->isNotEmpty()) {
            Notification::send($employees, new CourseNotification("تم اضافة منهج دراسى لمادة {$course->name_ar}", $message, $course->id));
        }
        return redirect()
            ->route('table-subj-study')
            ->with('success', ' تمت إضافة المناهج بنجاح');
    }

    public function edit($id)
    {
        $material = MaterialsSchedule::find($id);
        $courses  = Course::all();
        return view('form-subj-contant', compact('material', 'courses'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id|unique:materials_schedules,course_id,' . $id,
        ]);
        $material = MaterialsSchedule::findOrFail($id);
        $material->update($request->all());
        $course = Course::findOrFail($material->course_id);
        $actor = Auth::user();
        $message = "{$actor->name} قام بتعديل محتوى مادة {$course->name_ar}";
        $otherDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function ($q) use ($course) {
                $q->where('course_id', $course->id);
            })
            ->where('id', '!=', $actor->id)
            ->get();
        $students = User::where('role', 'student')
            ->whereHas('student.courses', function ($q) use ($course) {
                $q->where('course_id', $course->id);
            })
            ->get();
        $employees = User::where('role', 'admin')
            ->where('id', '!=', $actor->id)
            ->get();
        if ($otherDoctors->isNotEmpty()) {
            Notification::send(
                $otherDoctors,
                new CourseNotification(
                    "تم تعديل منهج دراسى لمادة {$course->name_ar}",
                    $message,
                    $course->id
                )
            );
        }
        if ($students->isNotEmpty()) {
            Notification::send(
                $students,
                new CourseNotification(
                    "تم تعديل منهج دراسى لمادة {$course->name_ar}",
                    $message,
                    $course->id
                )
            );
        }
        if ($employees->isNotEmpty()) {
            Notification::send(
                $employees,
                new CourseNotification(
                    "تم تعديل منهج دراسى لمادة {$course->name_ar}",
                    $message,
                    $course->id
                )
            );
        }
        return redirect()->route('table-subj-study')
            ->with('success', ' تم تحديث المادة بنجاح');
    }

    public function destroy($id)
    {
        $material = MaterialsSchedule::findOrFail($id);
        $material->delete();
        return redirect()->route('table-subj-study')->with('success', ' تم حذف المناهج بنجاح');
    }

    public function deleteAll()
    {
        MaterialsSchedule::truncate();
        return redirect()->route('table-subj-study')->with('success', ' تم حذف جميع المناهج بنجاح');
    }

    public function messages()
    {
        return [
            'course_id' => 'هذا الحقل مطلوب',
            'files_link'   => 'هذا الحقل مطلوب',
            'videos_link'     => 'هذا الحقل مطلوب',
            'online_link'     => 'هذا الحقل مطلوب',
            'description'   => 'هذا الحقل مطلوب'
        ];
    }
}
