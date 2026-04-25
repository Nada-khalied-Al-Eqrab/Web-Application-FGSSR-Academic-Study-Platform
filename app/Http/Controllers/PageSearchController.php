<?php
/*
========================================
File: PageSearchController.php

Description:
Controller responsible for handling internal page search
within the system navigation and dashboard pages.

Purpose:
- Provides search functionality across system pages
- Filters predefined routes based on user query
- Returns matching pages for quick navigation

Main Functions:

- index(Request $request):
  Accepts a search query from the user
  and filters a predefined list of system pages such as:
  - Home page
  - Lecture schedule
  - Study timetable
  - Exams
  - Students
  - Teachers

Logic:
- Converts query and page names to lowercase
- Performs partial match using string containment
- Returns only matched pages as a collection

Search Data:
- Static list of system routes (name + URL)
- Uses Laravel route() helper for navigation links

Output:
- Returns results to index view
- Includes:
  - results (filtered pages)
  - query (user search input)

Author:
Christin Mokbel

Notes:
- Simple in-memory search (no database used)
- Designed for dashboard navigation assistance
- Case-insensitive matching implemented using strtolower
========================================
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query', null);
        $results = collect();
        if ($query) {
            $pages = [
                ['name' => 'الرئيسية', 'url' => route('index')],
                ['name' => 'المحاضرات', 'url' => route('lecture.form')],
                ['name' => 'الجدول الدراسي', 'url' => route('table-study')],
                ['name' => 'الامتحانات', 'url' => route('exam.index')],
                ['name' => 'الطلاب', 'url' => route('students.index')],
                ['name' => 'المدرسين', 'url' => route('teachers.index')],
            ];
            $results = collect($pages)->filter(function ($page) use ($query) {
                return str_contains(strtolower($page['name']), strtolower($query));
            });
        }
        return view('index', [
            'results' => $results,
            'query' => $query,
        ]);
    }
}
