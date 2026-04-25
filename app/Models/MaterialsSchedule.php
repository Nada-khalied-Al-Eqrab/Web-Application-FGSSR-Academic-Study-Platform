<?php
/*
========================================
File: MaterialsSchedule.php

Description:
Eloquent model representing course materials
and resources.

Purpose:
- Stores different types of learning materials
  related to a course (files, videos, links)
- Links materials with course and related messages

Table:
- materials_schedules

Fillable Fields:
- course_id: Reference to the related course
- files_link: Link to downloadable files
- videos_link: Link to video resources
- online_link: External/online resource link
- description: Additional details about materials

Relationships:
- course():
  Belongs to Course model

- messages():
  One-to-many relationship with MessageSchedule model
  (includes user relationship for each message)

Author:
Dina Salah

Notes:
- Uses HasFactory trait for factory support
- Supports multiple resource types for flexibility
- Messages can be used for discussions/comments on materials
========================================
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialsSchedule extends Model
{
    use HasFactory;

    protected $table = 'materials_schedules';

    protected $fillable = [
        'course_id',
        'files_link',
        'videos_link',
        'online_link',
        'description',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function messages()
    {
        return $this->hasMany(MessageSchedule::class, 'material_id')->with('user');
    }
}
