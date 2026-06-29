<?php
/*
========================================
File: ExameSchedule.php

Description:
Eloquent model representing the exam schedule
for courses.

Purpose:
- Stores exam details for each course
- Manages exam timing and scheduling information

Table:
- exame_schedules

Fillable Fields:
- course_id: Reference to the related course
- exam_type: Type of exam (e.g., midterm, final)
- day: Day of the exam
- exam_date: Exact exam date
- exam_time: Time of the exam
- duration: Duration of the exam
- exam_mode: Mode of exam (online/offline)
- exam_link: Online exam link (if applicable)

Relationships:
- course():
  Belongs to Course model

Author:
Dina Salah

Notes:
- Uses HasFactory trait for factory support
- Linked directly to Course via foreign key
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExameSchedule extends Model
{
    use HasFactory;

    protected $table = 'exame_schedules';

    protected $fillable = [
        'course_id',
        'exam_type',
        'day',
        'exam_date',
        'exam_time',
        'duration',
        'exam_mode',
        'exam_link',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
