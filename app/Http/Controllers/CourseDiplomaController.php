<?php
/*
========================================
File: CourseDiplomaController.php

Description:
Controller responsible for managing the
relationship between Courses and Diplomas.

Purpose:
- Assign courses to specific diplomas
- Define course type within diploma structure
- Manage prerequisites for courses
- Handle CRUD operations for course-diploma mapping

Main Functions:

- index():
  Displays all course-diploma relationships.

- create():
  Loads all available courses and diplomas
  to assign a course to a diploma.

- store(Request $request):
  Creates a new relation between a course and a diploma
  including:
  - Course ID
  - Diploma ID
  - Course type (General, Core, etc.)
  - Prerequisite (if exists)

- show($id):
  Displays all courses under a specific diploma
  grouped by course type.

- edit($id):
  Loads a specific course-diploma relation
  for editing.

- update(Request $request, $id):
  Updates course-diploma relationship data.

- destroy($id):
  Deletes a specific course-diploma relation.

- deleteAll():
  Removes all course-diploma relationships from the system.

Important Notes:
- This controller controls many-to-many relationships
  between courses and diplomas
- Uses pivot table: course_diploma
- Supports grouping courses by type inside diplomas

Author:
Nada Khaled

========================================
*/
namespace App\Http\Controllers;

use App\Models\course;
use App\Models\Diploma;
use App\Models\CourseDiploma;
use Illuminate\Http\Request;

class CourseDiplomaController extends Controller
{

    public function index()
    {
        $courseDiploma  = CourseDiploma::all();
        return view('table-course-diploma', compact('courseDiploma'));
    }

    public function create()
    {
        $courses = Course::all();
        $diplomas = Diploma::all();
        return view('form-add-subj-to-diploma', compact('courses', 'diplomas'));
    }

    public function store(Request $request)
    {
        CourseDiploma::create([
            'course_id' => $request->course_id,
            'diploma_id' => $request->diploma_id,
            'type' => $request->type,
            'prerequisite' => $request->prerequisite,
        ]);
        return view('table-course-diploma');
    }

    public function show($id)
    {
        $diploma = Diploma::with('courses')->findOrFail($id);
        $coursesByType = $diploma->courses->groupBy('pivot.type');
        return view('diplomas-subj', compact('diploma', 'coursesByType'));
    }

    public function edit($id)
    {
        $courseDiploma = CourseDiploma::findOrFail($id);
        $courses = course::all();
        $diplomas = Diploma::all();
        return view('form-edite-subj-to-diploma', compact('courseDiploma', 'courses', 'diplomas'));
    }

    public function update(Request $request, $id)
    {
        $courseDiploma  = CourseDiploma::findorfail($id);
        $courseDiploma->update([
            'course_id' => $request->course_id,
            'diploma_id' => $request->diploma_id,
            'type' => $request->type,
            'prerequisite' => $request->prerequisite,
        ]);
        return redirect()->route('course_diploma.index');
    }

    public function destroy($id)
    {
        CourseDiploma::findorfail($id)->delete();
        return redirect()->route('course_diploma.index');
    }

    public function deleteAll()
    {
        CourseDiploma::query()->delete();
        return redirect()->route('course_diploma.index');
    }
}
