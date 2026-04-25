<?php
/*
========================================
File: PlaceController.php

Description:
Controller responsible for managing lecture/exam locations
within the system (CRUD operations for places/rooms).

Purpose:
- Handles creation, update, deletion, and listing of places
- Manages buildings, halls, and floors used for scheduling lectures and exams
- Provides reference data for lecture scheduling system

Main Functions:

- index():
  Retrieves all places and displays them in a table view

- create():
  Returns the form for adding a new place

- store(Request $request):
  Validates and stores a new place record

- edit($id):
  Retrieves a specific place for editing

- update(Request $request, $id):
  Updates place information (building, hall, floor)

- destroy($id):
  Deletes a specific place record

- destroyAll():
  Deletes all places from the database

Validation Rules:
- build_name: required string
- hall_name: required string
- floor: required string

Validation Messages:
- Custom Arabic error messages for all fields

Data Usage:
- Used by LectureScheduleController for assigning lecture locations
- Used as reference data for scheduling system

Author:
Christin Mokbel

Notes:
- Represents physical locations inside the institution
- Essential for lecture and exam scheduling modules
========================================
*/
namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;


class PlaceController extends Controller
{

    public function index()
    {
        $places = Place::get();
        return view('table-places', compact('places'));
    }

    public function create()
    {
        return view('form-place');
    }

    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'build_name' => 'required|string',
            'hall_name' => 'required|string',
            'floor' => 'required|string',
        ], $messages);
        Place::create($data);
        return redirect()->route('places');
    }

    public function edit(string $id)
    {
        $place = Place::findOrFail($id);
        return view('form-place', compact('place'));
    }

    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'build_name' => 'required|string',
            'hall_name' => 'required|string',
            'floor' => 'required|string',
        ], $messages);
        Place::where('id', $id)->update($data);
        return redirect()->route('places');
    }

    public function destroy(string $id)
    {
        Place::where('id', $id)->delete();
        return redirect()->route('places');
    }

    public function destroyAll()
    {
        Place::truncate();
        return redirect()->route('places');
    }

    public function messages()
    {
        return [
            'build_name.required' => 'هذا الحقل مطلوب',
            'build_name.string' => 'يجب ان يكون نص ',
            'hall_name.required' => 'هذا الحقل مطلوب',
            'hall_name.string' => 'يجب ان يكون نص',
            'floor.required' => 'هذا الحقل مطلوب',
            'floor.string' => 'يجب ان يكون نص ',
        ];
    }
}
