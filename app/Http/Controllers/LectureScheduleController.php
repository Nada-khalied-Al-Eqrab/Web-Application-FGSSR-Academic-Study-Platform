<?php
/*
========================================
File: LectureScheduleController.php

Description:
Controller responsible for managing lecture schedules
within the system (CRUD operations + notifications + scheduling).

Purpose:
- Handles creation, update, deletion, and listing of lecture schedules
- Manages lecture timing, location, and course assignment
- Sends notifications to doctors, students, and admins when lectures are added or updated

Main Functions:

- index():
  Retrieves all lectures, courses, and places
  and displays the lecture creation/scheduling form

- indextable():
  Retrieves all lecture schedules
  and displays them in a table view

- store(Request $request):
  Validates input and creates a new lecture schedule
  then sends notifications to:
  - Course doctors
  - Enrolled students
  - Admin employees

- edit($id):
  Retrieves a specific lecture schedule for editing
  along with courses and places data

- update(Request $request, $id):
  Updates lecture schedule data
  and sends update notifications to related users

- destroy($id):
  Deletes a specific lecture schedule

- deleteAll():
  Deletes all lecture schedules from the database

Validation Rules:
- course_id: required, must exist in courses table
- day: required
- start_time: required
- end_time: required
- place_id: required, must exist in places table

Notification Recipients:
- Doctors assigned to the course
- Students enrolled in the course
- Admin users (excluding actor)

Author:
Dina Salah

Notes:
- Uses Laravel Notification system (database notifications)
- Relies on relationships between Course, Doctor, Student, and Place models
- Builds dynamic notification messages with lecture details
========================================
*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

use App\Notifications\CourseNotification;
use App\Models\Place;
use App\Models\User;
use App\Models\LectureSchedule;
use App\Models\course;

class LectureScheduleController extends Controller
{

    public function index()
    {
        $places = Place::all();
        $lectures = LectureSchedule::all();
        $courses  = course::all();
        return view('form-study-schedule', compact('lectures', 'courses', 'places'));
    }

    public function indextable()
    {
        $lectures = LectureSchedule::all();
        return view('table-study', compact('lectures'));
    }

    public function create()
    {
        return view('lectures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'  => 'required|exists:courses,id',
            'day'        => 'required',
            'start_time' => 'required',
            'end_time'   => 'required',
            'place_id'  => 'required|exists:places,id',
        ], $this->messages());
        $lecture = LectureSchedule::create([
            'course_id' => $request->course_id,
            'day'          => $request->day,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'place_id'  => $request->place_id,
        ]);
        $course = Course::findOrFail($request->course_id);
        $actor = Auth::user();
        $building = $lecture->place->build_name;
        $hall = $lecture->place->hall_name;
        $floor = $lecture->place->floor;
        $message = "قام {$actor->name} بإضافة محاضرة لمادة {$course->name_ar} يوم {$request->day} من {$request->start_time} إلى {$request->end_time} فى مبنى {$building} فى قاعة {$hall} فى دور {$floor}";
        $courseDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
        $students = User::where('role', 'student')
            ->whereHas('student.courses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
        $employees = User::where('role', 'admin')
            ->where('id', '!=', $actor->id)
            ->get();
        if ($courseDoctors->isNotEmpty()) {
            Notification::send($courseDoctors, new CourseNotification("تم اضافة ميعاد المحاضرة  لمادة {$course->name_ar}", $message, $course->id));
        }
        if ($students->isNotEmpty()) {
            Notification::send($students, new CourseNotification("تم اضافة ميعاد المحاضرة  لمادة {$course->name_ar}", $message, $course->id));
        }
        if ($employees->isNotEmpty()) {
            Notification::send($employees, new CourseNotification("تم اضافة ميعاد المحاضرة   لمادة {$course->name_ar}", $message, $course->id));
        }
        return redirect()
            ->route('table-study')
            ->with('success', ' تمت إضافة الامتحان بنجاح');
    }

    public function edit($id)
    {
        $places = Place::all();
        $lecture = LectureSchedule::findOrFail($id);
        $courses = course::all();
        return view('form-study-schedule', compact('lecture', 'courses', 'places'));
    }

    public function update(Request $request, $id)
    {
        $lecture = LectureSchedule::findOrFail($id);
        $lecture->update($request->all());
        $course = Course::findOrFail($request->course_id);
        $actor = Auth::user();
        $building = $lecture->place->build_name;
        $hall = $lecture->place->hall_name;
        $floor = $lecture->place->floor;
        $message = "قام {$actor->name} بتعديل محاضرة لمادة {$course->name_ar} يوم {$request->day} من {$request->start_time} إلى {$request->end_time} فى مبنى {$building} فى قاعة {$hall} فى دور {$floor}";
        $courseDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
        $students = User::where('role', 'student')
            ->whereHas('student.courses', function ($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
        $employees = User::where('role', 'admin')
            ->where('id', '!=', $actor->id)
            ->get();
        if ($courseDoctors->isNotEmpty()) {
            Notification::send($courseDoctors, new CourseNotification("تم تعديل ميعاد المحاضرة  لمادة {$course->name_ar}", $message, $course->id));
        }
        if ($students->isNotEmpty()) {
            Notification::send($students, new CourseNotification("تم تعدبل ميعاد المحاضرة  لمادة {$course->name_ar}", $message, $course->id));
        }
        if ($employees->isNotEmpty()) {
            Notification::send($employees, new CourseNotification("تم تعديل ميعاد المحاضرة   لمادة {$course->name_ar}", $message, $course->id));
        }
        return redirect()->route('table-study')->with('success', ' تم تعديل المحاضرة بنجاح');
    }

    public function destroy($id)
    {
        $lecture = LectureSchedule::findOrFail($id);
        $lecture->delete();
        return redirect()->route('table-study')->with('success', ' تم حذف الجدول بنجاح');
    }

    public function deleteAll()
    {
        LectureSchedule::truncate();
        return redirect()->route('table-study')->with('success', ' تم حذف جميع الجداول بنجاح');
    }

    public function messages()
    {
        return [
            'course_id.required' => 'كود المادة مطلوب',
            'course_id.exists'   => 'المادة غير موجودة',
            'day.required'        => 'اليوم مطلوب',
            'start_time.required' => 'وقت البداية مطلوب',
            'end_time.required'   => 'وقت النهاية مطلوب',
            'place_id.required'   => 'المكان مطلوب',
        ];
    }
}
