<?php
/*
========================================
File: DoctorCourse.php

Description:
Pivot/relationship model between doctors and courses.
Represents which courses are assigned to each doctor.

Purpose:
- Manages many-to-many relationship between Doctor and Course
- Acts as an explicit pivot model for better control

Table:
- doctor_courses

Fillable Fields:
- doctor_id: Reference to doctors table
- course_id: Reference to courses table

Relationships:
- doctor():
  Belongs to Doctor model

- course():
  Belongs to Course model

Author:
Nada Khaled

Notes:
- Uses Notifiable trait for notification support
- Useful when pivot table needs to behave like a full model
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class DoctorCourse extends Model
{

    use Notifiable;

    protected $fillable = [
        'doctor_id',
        'course_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

