<?php
/*
========================================
File: AdminController.php

Description:
Controller responsible for managing admin
users (CRUD operations).

Purpose:
- Handles creation, update, deletion, and listing of admins
- Manages both Admin model and related User model
- Controls admin roles and account state

Main Functions:

- index():
  Retrieves all admins with their related user data
  and displays them in a table view

- create():
  Returns the admin creation form

- store(Request $request):
  Validates input and creates:
  - A new User (role = admin)
  - A corresponding Admin record

- edit($id):
  Retrieves specific admin with user data
  for editing

- update(Request $request, $id):
  Updates:
  - Admin type (super / normal)
  - User state (active / inactive / disabled)

- destroy($id):
  Deletes admin by removing associated user

- deleteAll():
  Deletes all admins by removing all related users

Validation Rules:
- code: must be unique in users table
- password: must be unique in users table
- type: must be (super, normal)
- state: must be (inactive, active, disabled)

Author:
Nada Khaled

Notes:
- Uses Hash for secure password storage
- Relies on relationship between Admin and User models
- Ensures admin deletion cascades through user deletion
========================================
*/
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::with('user')->latest()->get();
        return view('table-em', compact('admins'));
    }

    public function create()
    {
        return view('form-em');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:users,code',
            'password' => 'required|unique:users,password',
            'type' => 'required|in:super,normal',
        ]);
        $user = User::create([
            'code' => $request->code,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'state' => 'inactive',
            'name'     => 'لم يتم الإضافة بعد',
            'phone'    => '0000000000',
        ]);
        Admin::create([
            'user_id' => $user->id,
            'type' => $request->type,
        ]);
        return redirect()->route('admins.index')
            ->with('success', 'تم إضافة الموظف بنجاح');
    }

    public function edit($id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        return view('form-em', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        $user = $admin->user;
        $request->validate([
            'type' => 'required|in:super,normal',
            'state' => 'required|in:inactive,active,disabled',
        ]);
        $admin->update([
            'type' => $request->type,
        ]);
        $user->update([
            'state' => $request->state
        ]);
        return redirect()->route('admins.index')
            ->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function destroy($id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        $admin->user->delete();
        return redirect()->route('admins.index')
            ->with('success', 'تم حذف الموظف بنجاح');
    }

    public function deleteAll()
    {
        Admin::with('user')->get()->each(function ($admin) {
            $admin->user->delete();
        });
        return redirect()->route('admins.index')
            ->with('success', 'تم حذف جميع البيانات');
    }
}
