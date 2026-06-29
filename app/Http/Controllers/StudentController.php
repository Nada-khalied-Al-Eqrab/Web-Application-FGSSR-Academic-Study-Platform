<?php
/*
========================================
File: StudentController.php

Description:
Controller responsible for managing student
accounts and their academic data.

Purpose:
- Handles full CRUD operations for students
- Creates and manages both User and Student records
- Links students with diplomas
- Manages student deletion with proper cascading

Main Functions:

- index():
  Retrieves all students with their:
  - User information
  - Related diploma
  Displays them in a table view

- create():
  Loads available diplomas for student creation form

- store(Request $request):
  Creates a new student with:
  - User account (role = student)
  - Student profile record
  Uses database transaction to ensure consistency
  Password is hashed using national_id

- edit($id):
  Retrieves student data with user relation
  Loads diplomas for editing form

- update(Request $request, $id):
  Updates:
  - User name and phone
  - Student diploma assignment
  Ensures phone uniqueness per user

- destroy($id):
  Deletes a student and its related user account

- deleteAll():
  Deletes all students and their related users
  Uses transaction for safe bulk deletion

Validation Rules:
- name: required, string, max 255
- code: must be unique in users table
- phone: must be unique in users table
- diploma_id: must exist in diplomas table

Database Relations:
- Student belongs to User
- Student belongs to Diploma
- Student has many-to-many relation with Courses (optional)

Security:
- Password is hashed using Hash::make()
- Uses DB transactions for critical operations

Author:
Nada Khaled

Notes:
- Ensures data consistency between users and students
- Handles edge cases like missing user relation
========================================
*/
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with(['user', 'diploma'])->get();
        return view('table-st', compact('students'));
    }

    public function create()
    {
        $diplomas = Diploma::all();
        return view('form-st', compact('diplomas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'code'       => 'required|unique:users,code',
            'phone'      => 'required|unique:users,phone',
            'diploma_id' => 'required|exists:diplomas,id',
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name'     => $request->name,
                'code'     => $request->code,
                'phone'    => $request->phone,
                'role'     => 'student',
                'state'    => $request->state,
                'password' => Hash::make($request->national_id),
            ]);
            Student::create([
                'user_id'    => $user->id,
                'diploma_id' => $request->diploma_id,
            ]);
            DB::commit();
            return redirect()
                ->route('students.index')
                ->with('success', 'تم إضافة الطالب بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء إضافة الطالب');
        }
    }

    public function edit($id)
    {
        $student = Student::with('user')->findOrFail($id);
        $diplomas = Diploma::all();
        return view('form-st', compact('student', 'diplomas'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::with('user')->findOrFail($id);
        if (!$student->user) {
            return redirect()->back()->with('error', 'هذا الطالب غير مرتبط بحساب مستخدم');
        }
        $user = $student->user;
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|unique:users,phone,' . $user->id,
            'diploma_id' => 'required|exists:diplomas,id',
        ]);
        $user->update([
            'name'  => $request->name,
            'phone' => $request->phone,
        ]);
        $student->update([
            'diploma_id' => $request->diploma_id,
        ]);
        return redirect()->route('students.index')
            ->with('success', 'تم تحديث بيانات الطالب');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')
                ->with('error', 'الطالب غير موجود');
        }
        if ($student->user) {
            $student->user->delete();
        }
        $student->delete();
        return redirect()->route('students.index')
            ->with('success', 'تم حذف الطالب بنجاح');
    }

    public function deleteAll()
    {
        DB::beginTransaction();
        try {
            $students = Student::with('user')->get();
            foreach ($students as $student) {
                $student->user->delete();
            }
            DB::commit();
            return redirect()
                ->route('students.index')
                ->with('success', 'تم حذف جميع الطلاب');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء حذف الطلاب');
        }
    }
}
