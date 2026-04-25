<?php
/*
========================================
File: Doctor.php

Description:
Eloquent model representing the Doctor entity.
Handles doctor-related data and relationships.

Features:
- Stores doctor academic and administrative information
- Defines relationships with users, courses, and places
- Supports many-to-many and one-to-many relations

Fillable Fields:
- user_id: Reference to users table
- academic_degree: Doctor academic level
- department: Academic department
- place_id: Office location
- office_hours_from: Start time of office hours
- office_hours_to: End time of office hours

Relationships:
- user():
  Belongs to User model

- courses():
  Many-to-many relationship with Course model
  (with timestamps)

- place():
  Belongs to Place model

- doctorCourses():
  One-to-many relationship with DoctorCourse model

Author:
Nada Khaled

Notes:
- Uses Notifiable trait for notifications support
- Combines both direct and pivot-based relationships with courses
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Doctor extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'academic_degree',
        'department',
        'place_id',
        'office_hours_from',
        'office_hours_to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps();
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function doctorCourses()
    {
        return $this->hasMany(DoctorCourse::class);
    }
}
