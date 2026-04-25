<?php
/*
========================================
File: CourseDiploma.php

Description:
Pivot model that represents the relationship
between courses and diplomas.

Purpose:
- Defines which courses belong to which diplomas
- Stores additional metadata about the relationship
  such as type and prerequisite

Table:
- course_diploma (custom pivot table)

Fillable Fields:
- course_id: Reference to course
- diploma_id: Reference to diploma
- type: Category of the course inside diploma
  (General Requirements, Major Field Requirements, Core Electives, Minor)
- prerequisite: Required course(s) before taking this course

Relationships:
- course():
  Belongs to Course model

- diploma():
  Belongs to Diploma model

Author:
Nada Khaled

Notes:
- Used as a custom pivot model instead of default Laravel pivot
- Allows adding extra attributes to many-to-many relationship
========================================
*/
namespace App\Models;

use App\Models\Course;
use App\Models\Diploma;
use Illuminate\Database\Eloquent\Model;

class CourseDiploma extends Model
{
    protected $table = 'course_diploma';
    protected $fillable = [
        'course_id',
        'diploma_id',
        'type',
        'prerequisite',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }
}
