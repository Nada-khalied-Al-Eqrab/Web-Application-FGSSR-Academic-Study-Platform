<?php
/*
========================================
File: StudentCourseController.php

Description:
Controller responsible for managing the
relationship between students and courses.

Purpose:
- Assign courses to students
- Remove courses from students
- Display student-course relationships
- Prevent duplicate course enrollment per student

Main Functions:

- show($id):
  Displays a single course with:
  - Enrolled students and their user data
  - Related doctors assigned to the course
  Also loads all diplomas for view context

- index():
  Retrieves all students with:
  - User data
  - Enrolled courses (via StudentCourse relation)
  Displays student-course mapping table

- create($id):
  Loads a specific student and all available courses
  to assign a new course to the student

- store(Request $request, $id):
  Adds a course to a student:
  - Validates course_id existence
  - Checks for duplicate enrollment
  - Inserts into student_courses pivot table

- destroy($student_id, $course_id):
  Removes a specific course from a student
  using composite key (student_id + course_id)

- deleteAll():
  Deletes all student-course relationships
  (clears pivot table completely)

Validation Rules:
- course_id: required, must exist in courses table

Business Logic:
- Prevents duplicate course registration per student
- Uses pivot table (student_course) for many-to-many relation

Database Relations:
- Student ↔ Course (Many-to-Many)
- Implemented via StudentCourse pivot model

Author:
Nada Khaled

Notes:
- Uses composite key logic for deletion
- Ensures data integrity before inserting records
========================================
*/
namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{

    public function show($id)
    {
        $course = Course::with([
            'students.user',
            'doctors.user'
        ])->findOrFail($id);
        $diplomas = Diploma::all();
        return view('subj_studants_num', compact('course', 'diplomas'));
    }

    public function index()
    {
        $students = Student::with([
            'user',
            'studentCourses.course'
        ])->get();

        return view('table-st-course', compact('students'));
    }

    public function create($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('form-add-st-course', compact('student', 'courses'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);
        $student = Student::findOrFail($id);
        $exists = StudentCourse::where('student_id', $student->id)
            ->where('course_id', $request->course_id)
            ->exists();
        if ($exists) {
            return back()->with('error', 'المادة مسجلة بالفعل');
        }
        StudentCourse::create([
            'student_id' => $student->id,
            'course_id'  => $request->course_id,
        ]);
        return redirect()
            ->route('profile.st', $student->id)
            ->with('success', 'تمت إضافة المادة بنجاح');
    }

    public function destroy($student_id, $course_id)
    {
        $studentCourse = StudentCourse::where('student_id', $student_id)
            ->where('course_id', $course_id)
            ->firstOrFail();
        $studentCourse->delete();
        return redirect()
            ->route('profile.st', $student_id)
            ->with('success', 'تم حذف المادة بنجاح');
    }

    public function deleteAll()
    {
        StudentCourse::truncate();
        return redirect()->route('Student_courses.index')
            ->with('success', 'تم حذف كل المواد لكل الطلاب بنجاح');
    }
}
