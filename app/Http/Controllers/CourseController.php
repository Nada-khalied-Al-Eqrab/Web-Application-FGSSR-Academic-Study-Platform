<?php
/*
========================================
File: CourseController.php

Description:
Controller responsible for managing courses
within the system.

Purpose:
- Handles all CRUD operations for courses
- Manages course images upload and deletion
- Provides course search functionality
- Displays course details with related data

Main Functions:

- index():
  Retrieves all courses and displays them in a table view.

- create():
  Returns the form used to add a new course.

- store(Request $request):
  Creates a new course and uploads its image
  into the storage system.

- show($id):
  Displays full course details including:
  - Materials
  - Lectures
  - Exams
  - Number of enrolled students

- edit($id):
  Returns the edit form for a specific course.

- update(Request $request, $id):
  Updates course data and handles:
  - Updating course image
  - Deleting old image from storage

- destroy($id):
  Deletes a course and removes its image from storage.

- deleteAll():
  Deletes all courses and cleans up all stored images.

- search(Request $request):
  Searches courses by:
  - Arabic name
  - English name
  - Course code

Important Notes:
- Images are stored in storage/app/public/courses
- Old images are automatically removed when updated or deleted
- Uses Eloquent relationships for related data (materials, lectures, exams)

Author:
Nada Khaled

========================================
*/
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    public function index()
    {
        $courses  = Course::all();
        return view('table-subj', compact('courses'));
    }

    public function create()
    {
        return view('form-add-subj');
    }

    public function store(Request $request)
    {
        $path = $request->file('img')->store('courses', 'public');
        Course::create([
            'img' => $path,
            'code' => $request->code,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'tools' => $request->tools,
            'language' => $request->language,
            'description' => $request->description,
        ]);
        return redirect()->route('courses.index');
    }

    public function show($id)
    {
        $course = Course::with(['material', 'lectures', 'exams'])->findOrFail($id);
        $studentsCount = $course->students()->count();
        return view('subj-contant', compact('course', 'studentsCount'));
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('form-edite-subj', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $data = $request->only(['code', 'name_ar', 'name_en', 'language', 'tools', 'description']);
        if ($request->hasFile('img')) {
            $oldImage = ltrim($course->img, '/');
            if (
                $oldImage &&
                !str_starts_with($oldImage, 'assets/') &&
                !str_starts_with($oldImage, 'public/assets/') &&
                !str_starts_with($oldImage, '/assets/') &&
                !str_starts_with($oldImage, 'http')
            ) {
                if (Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $data['img'] = $request->file('img')->store('courses', 'public');
        }
        $course->update($data);
        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->img) {
            if (
                !str_starts_with($course->img, 'assets/') &&
                !str_starts_with($course->img, 'public/assets/') &&
                !str_starts_with($course->img, '/assets/') &&
                !str_starts_with($course->img, 'http')
            ) {
                if (Storage::disk('public')->exists($course->img)) {
                    Storage::disk('public')->delete($course->img);
                }
            }
        }
        $course->delete();
        return redirect()->route('courses.index');
    }

    public function deleteAll()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            if ($course->img) {
                if (
                    !str_starts_with($course->img, 'assets/') &&
                    !str_starts_with($course->img, 'public/assets/') &&
                    !str_starts_with($course->img, '/assets/') &&
                    !str_starts_with($course->img, 'http')
                ) {
                    if (Storage::disk('public')->exists($course->img)) {
                        Storage::disk('public')->delete($course->img);
                    }
                }
            }
        }
        Course::query()->delete();
        return redirect()->route('courses.index');
    }

    public function search(Request $request)
    {
        $query = trim($request->q);
        if (!$query) {
            return redirect()->back()->with('error', 'من فضلك اكتب كلمة للبحث');
        }
        $courses = Course::where(function ($q) use ($query) {
            $q->where('name_ar', 'like', "%{$query}%")
                ->orWhere('name_en', 'like', "%{$query}%")
                ->orWhere('code', 'like', "%{$query}%");
        })
            ->orderBy('code')
            ->get();
        return view('pages-search-result', compact('courses', 'query'));
    }
}
