<?php
/*
========================================
File: User.php

Description:
Main authentication model representing system users.
Handles user data, authentication, roles, and relationships.

Purpose:
- Represents all system users (admin, doctor, student)
- Manages authentication using Laravel built-in system
- Defines relationships with role-specific models

Features:
- API token support via Sanctum
- Notification support
- Factory support for testing and seeding

Fillable Fields:
- code: Unique user code
- name: User name
- phone: User phone number
- role: User role (admin, doctor, student)
- state: Account status (active, inactive, disabled)
- password: User password

Hidden Fields:
- password
- remember_token

Relationships:
- doctor():
  One-to-one relationship with Doctor model

- student():
  One-to-one relationship with Student model

- admin():
  One-to-one relationship with Admin model

- teachingCourses():
  Many-to-many relationship with Course (for doctors)
  via doctor_courses table

- enrolledCourses():
  Many-to-many relationship with Course (for students)
  via course_student table

Accessors:
- getIsAdminAttribute():
  Returns true if user exists in admins table

Author:
Nada Khaled

Notes:
- Extends Authenticatable for login functionality
- Uses Sanctum for API authentication
- Central model for all user roles in the system
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'code',
        'name',
        'phone',
        'role',
        'state',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function teachingCourses()
    {
        return $this->belongsToMany(Course::class, 'doctor_courses', 'doctor_id', 'course_id');
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    }

    public function getIsAdminAttribute()
    {
        return \App\Models\Admin::where('user_id', $this->id)->exists();
    }
}
