<?php
/*
========================================
File: DoctorController.php

Description:
Controller responsible for managing doctors
within the system.

Purpose:
- Handles CRUD operations for doctors
- Manages linked User account for each doctor
- Assigns doctors to departments and places
- Manages office hours and academic information
- Ensures transactional integrity between User and Doctor tables

Main Functions:

- index():
  Retrieves all doctors with related data:
  - User information
  - Assigned place
  - Courses taught by doctor

- create():
  Loads all available places for assigning
  a doctor’s office location.

- store(Request $request):
  Creates a new doctor by:
  - Creating a User account (role = doctor)
  - Creating a Doctor profile linked to that user
  - Uses database transaction for data consistency

- edit($id):
  Loads doctor data with user information
  for editing purposes.

- update(Request $request, $id):
  Updates:
  - User data (name, phone, code, state, password)
  - Doctor profile data (degree, department, place, office hours)

- destroy($id):
  Deletes a doctor and its related user account.

- deleteAll():
  Deletes all doctors and their linked user accounts
  using a transaction for safety.

Important Notes:
- Strong dependency between Doctor and User models
- Uses DB transactions to ensure data consistency
- Supports role-based user system (doctor role)
- Department and academic degree are restricted via enums

Author:
Nada Khaled

========================================
*/
namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Doctor;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with([
            'user',
            'place',
            'doctorCourses.course'
        ])->get();
        return view('table-dr', compact('doctors'));
    }

    public function create()
    {
        $places = Place::all();
        return view('form-dr', compact('places'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:11|unique:users,phone',
            'doctor_code' => 'required|digits:9|unique:users,code',
            'academic_degree' => 'required|in:teaching_assistant,assistant_lecturer,lecturer,associate_professor,professor,professor_emeritus',
            'state' => 'required|string|in:active,inactive,disabled',
            'department' => 'required|in:Statistics,Mathematical Statistics,Biostatistics and Demography,Information Systems,Computer Science,Operations Research,Operations Management,Data Science,Software Engineering',
            'place_id' => 'nullable|exists:places,id',
            'office_hours_from' => 'required|date_format:H:i',
            'office_hours_to' => 'required|date_format:H:i',
            'password' => 'required|digits:14',
        ], [
            'phone.digits' => 'رقم الهاتف يجب أن يكون 11 رقم ',
            'doctor_code.digits' => 'الكود يجب أن يكون 9 أرقام ',
            'password.digits' => 'الرقم القومي يجب أن يكون 14 رقم ',
        ]);
        DB::transaction(function () use ($request) {
            $user = User::create([
                'code' => $request->doctor_code,
                'name' => $request->name,
                'phone' => $request->phone,
                'role' => 'doctor',
                'state' => $request->state,
                'password' => Hash::make($request->password),
            ]);
            Doctor::create([
                'user_id' => $user->id,
                'academic_degree'   => $request->academic_degree,
                'department' => $request->department,
                'place_id' => $request->place_id,
                'office_hours_from' => $request->office_hours_from,
                'office_hours_to' => $request->office_hours_to,
            ]);
        });
        return redirect()->route('doctors.index')->with('success', 'تم إضافة الدكتور بنجاح');
    }

    public function edit($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        $places = Place::all();
        return view('form-dr', compact('doctor', 'places'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        DB::transaction(function () use ($request, $doctor) {
            if ($doctor->user) {
                $userData = [
                    'code' => $request->doctor_code,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'state' => $request->state,
                ];
                if ($request->filled('password')) {
                    $userData['password'] = Hash::make($request->password);
                }
                $doctor->user->update($userData);
            }
            $doctor->update([
                'academic_degree'   => $request->academic_degree,
                'department' => $request->department,
                'place_id' => $request->place_id,
                'office_hours_from' => $request->office_hours_from,
                'office_hours_to' => $request->office_hours_to,
            ]);
        });
        return redirect()->route('doctors.index')->with('success', 'تم تحديث بيانات الدكتور بنجاح');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return redirect()->route('doctors.index')
                ->with('error', 'الدكتور غير موجود');
        }
        if ($doctor->user) {
            $doctor->user->delete();
        }
        $doctor->delete();
        return redirect()->route('doctors.index')
            ->with('success', 'تم حذف الدكتور بنجاح');
    }

    public function deleteAll()
    {
        DB::transaction(function () {
            $doctors = Doctor::all();
            foreach ($doctors as $doctor) {
                $doctor->user->delete();
            }
        });
        return redirect()->route('doctors.index')->with('success', 'تم حذف كل الدكاترة وحساباتهم بنجاح');
    }
}
