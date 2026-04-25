<?php
/*
========================================
File: ExameScheduleController.php

Description:
Controller responsible for managing exam schedules
for courses, including creation, updates, deletion,
and sending notifications to related users.

Purpose:
- Create and manage exam schedules for courses
- Notify doctors, students, and admins about exams
- Provide exam listing and management views
- Handle updates and deletions of exam schedules

Main Functions:

- index():
  Loads all exams and all courses
  Used for exam creation form view

- indextable():
  Retrieves paginated exam schedules
  with related course data
  Displays exams in a table view

- create():
  Returns exam creation view

- store(Request $request):
  Handles creating a new exam schedule:
  - Validates exam data (type, date, time, etc.)
  - Saves exam into database
  - Retrieves course and authenticated user
  - Sends notifications to:
      * Doctors assigned to course
      * Students enrolled in course
      * Admin users (excluding actor)
  - Uses CourseNotification system

- edit($id):
  Loads specific exam and courses
  for editing form

- update(Request $request, $id):
  Updates existing exam schedule:
  - Validates input data
  - Updates exam record
  - Sends notifications to:
      * Doctors
      * Students
      * Admins
  - Includes detailed update message

- destroy($id):
  Deletes a specific exam schedule

- deleteAll():
  Deletes all exam schedules (truncate table)

- messages():
  Custom validation error messages for exam fields

Validation Rules:
- course_id: required
- exam_type: required, string
- exam_date: required, date
- exam_time: required
- duration: required, integer
- exam_mode: required, string
- exam_link: optional, must be valid URL

Business Logic:
- Exams are linked to courses
- Notifications are sent to all stakeholders
- Tracks academic scheduling updates in real-time

Database Relations:
- ExamSchedule belongs to Course
- Course relates to:
    * Doctors (via doctor_courses)
    * Students (via course_student)

Notifications:
- Uses CourseNotification class
- Sent via Laravel Notification system
- Targets doctors, students, and admins

Author:
Dina Salah

Notes:
- Heavy use of notifications system
- Central scheduling controller
- Ensures all users stay updated on exam changes
========================================
*/
namespace App\Http\Controllers;
use App\Models\MaterialsSchedule;

use App\Models\course;
use App\Models\ExameSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use App\Notifications\CourseNotification;


use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ExameScheduleController extends Controller
{
    public function index()
    {
        $exams = ExameSchedule::all();
        $courses = course::all();
        return view('form-exam-schedule', compact('exams', 'courses'));
    }

    public function indextable()
    {
        $exams = ExameSchedule::with('course')->paginate(5);
        return view('table-ex', compact('exams'));
    }

    public function create()
    {
        return view('exames.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|string|max:50',
            'exam_type'    => 'required|string|max:100',
            'day'          => 'required|string|max:50',
            'exam_date'    => 'required|date',
            'exam_time'    => 'required',
            'duration'     => 'required|integer',
            'exam_mode'    => 'required|string',
            'exam_link'    => 'nullable|url',
        ]);
        ExameSchedule::create([
            'course_id' => $request->course_id,
            'exam_type'    => $request->exam_type,
            'day'          => $request->day,
            'exam_date'    => $request->exam_date,
            'exam_time'    => $request->exam_time,
            'duration'     => $request->duration,
            'exam_mode'    => $request->exam_mode,
            'exam_link'    => $request->exam_link,
        ]);
        $course = Course::findOrFail($request->course_id);
        $actor = Auth::user();
        $message = "تم إضافة امتحان ({$request->exam_type}) لمادة {$course->name_ar} بتاريخ {$request->exam_date} الساعة {$request->exam_time} بواسطة {$actor->name}";
        $courseDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
            $students = User::where('role', 'student')
            ->whereHas('student.courses', function($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
            $employees = User::where('role','admin')
            ->where('id','!=',$actor->id)
            ->get();
        if($courseDoctors->isNotEmpty()){
            Notification::send($courseDoctors, new CourseNotification("تم اضافة ميعاد امتحان  لمادة {$course->name_ar}", $message, $course->id));
        }
        if($students->isNotEmpty()){
            Notification::send($students, new CourseNotification("تم اضافة ميعاد امتحان  لمادة {$course->name_ar}", $message, $course->id));
        }
        if($employees->isNotEmpty()){
            Notification::send($employees, new CourseNotification("تم اضافة ميعاد امتحان  لمادة {$course->name_ar}", $message, $course->id));
        }
        return redirect()
            ->route('table-ex')
            ->with('success', ' تمت إضافة الامتحان بنجاح');
    }

    public function edit($id)
    {
        $courses = course::all();
        $exam = ExameSchedule::findOrFail($id);
        return view('form-exam-schedule', compact('exam', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $exam = ExameSchedule::findOrFail($id);
        $data = $request->validate([
            'course_id' => 'required|string|max:50',
            'exam_type'    => 'required|string|max:100',
            'day'          => 'required|string|max:50',
            'exam_date'    => 'required|date',
            'exam_time'    => 'required',
            'duration'     => 'required|integer',
            'exam_mode'    => 'required|string',
            'exam_link'    => 'nullable|url',
        ], $this->messages());
        $exam->update($data);
        $course = Course::findOrFail($request->course_id);
        $actor = Auth::user();
        $message = "تم تعديل ميعاد امتحان ({$request->exam_type}) لمادة {$course->name_ar} بتاريخ {$request->exam_date} الساعة {$request->exam_time} بواسطة {$actor->name}";
        $courseDoctors = User::where('role', 'doctor')
            ->whereHas('doctor.doctorCourses', function($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
            $students = User::where('role', 'student')
            ->whereHas('student.courses', function($q) use ($request) {
                $q->where('course_id', $request->course_id);
            })
            ->get();
            $employees = User::where('role','admin')
            ->where('id','!=',$actor->id)
            ->get();
        if($courseDoctors->isNotEmpty()){
            Notification::send($courseDoctors, new CourseNotification("تم تعديل ميعاد امتحان  لمادة {$course->name_ar}", $message, $course->id));
        }
        if($students->isNotEmpty()){
            Notification::send($students, new CourseNotification("تم تعديل ميعاد امتحان  لمادة {$course->name_ar}", $message, $course->id));
        }
        if($employees->isNotEmpty()){
            Notification::send($employees, new CourseNotification("تم تعديل ميعاد امتحان  لمادة {$course->name_ar}", $message, $course->id));
        }
        return redirect()
            ->route('table-ex')
            ->with('success', ' تم تحديث بيانات الامتحان بنجاح');
    }

    public function destroy($id)
    {
        $exam = ExameSchedule::findOrFail($id);
        $exam->delete();
        return redirect()->route('table-ex')->with('success', ' تم حذف الامتحان بنجاح');
    }

    public function deleteAll()
    {
        ExameSchedule::truncate();
        return redirect()->route('table-ex')->with('success', ' تم حذف جميع الامتحانات بنجاح');
    }

    public function messages()
    {
        return [
            'course_id.required' => 'هذا الحقل مطلوب',
            'exam_type.required'    => 'هذا الحقل مطلوب',
            'day.required'          => 'هذا الحقل مطلوب',
            'exam_date.required'    => 'هذا الحقل مطلوب',
            'exam_time.required'    => 'هذا الحقل مطلوب',
            'duration.required'     => 'هذا الحقل مطلوب',
            'exam_mode.required'    => 'هذا الحقل مطلوب',
            'exam_link.required'    => 'هذا الحقل مطلوب',
        ];
    }
}
