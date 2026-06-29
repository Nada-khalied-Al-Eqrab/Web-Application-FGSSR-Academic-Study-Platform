<?php
/*
========================================
File: LectureSchedule.php

Description:
Eloquent model representing lecture schedules
for courses.

Purpose:
- Stores lecture timing and location details
- Links courses with their scheduled lectures

Table:
- lecture_schedules

Fillable Fields:
- course_id: Reference to the related course
- place_id: Reference to lecture location (place)
- day: Day of the lecture
- start_time: Lecture start time
- end_time: Lecture end time

Relationships:
- course():
  Belongs to Course model

- place():
  Belongs to Place model

Author:
Dina Salah

Notes:
- Uses HasFactory trait for factory support
- Each lecture is associated with a specific course and place
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LectureSchedule extends Model
{
    use HasFactory;
    protected $table = 'lecture_schedules';
    protected $fillable = [
        'course_id',
        'place_id',
        'day',
        'start_time',
        'end_time',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
