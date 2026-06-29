<?php
/*
========================================
File: StudentCourse.php

Description:
Pivot model representing the relationship
between students and courses.

Purpose:
- Manages enrollment of students in courses
- Acts as an explicit pivot model for the
  course_student table

Table:
- course_student

Fillable Fields:
- student_id: Reference to students table
- course_id: Reference to courses table

Relationships:
- student():
  Belongs to Student model

- course():
  Belongs to Course model

Author:
Nada Khaled

Notes:
- Uses Notifiable trait for notification support
- Represents many-to-many relationship as a full model
- Useful if additional attributes are added later
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class StudentCourse extends Model
{
    use Notifiable;

    protected $table = 'course_student';

    protected $fillable = [
        'student_id',
        'course_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
