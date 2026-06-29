<?php
/*
========================================
File: Student.php

Description:
Eloquent model representing the Student entity.
Handles student data and academic relationships.

Purpose:
- Stores student information linked to users
- Connects students with diplomas and courses
- Tracks completed courses

Fillable Fields:
- user_id: Reference to users table
- diploma_id: Reference to diploma
- courses_completed: Number of completed courses

Relationships:
- user():
  Belongs to User model

- diploma():
  Belongs to Diploma model

- courses():
  Many-to-many relationship with Course model
  via course_student pivot table

- studentCourses():
  One-to-many relationship with StudentCourse model

Author:
Nada Khaled

Notes:
- Uses Notifiable trait for notification support
- Supports both direct and pivot-based course relationships
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Student extends Model
{
    use Notifiable;

    protected $fillable = ['user_id', 'diploma_id', 'courses_completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'course_student',
            'student_id',
            'course_id'
        );
    }

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class);
    }
}
