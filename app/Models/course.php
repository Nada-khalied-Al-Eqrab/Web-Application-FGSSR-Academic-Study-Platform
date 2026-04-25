<?php
/*
========================================
File: Course.php

Description:
Eloquent model representing the Course entity.
Defines course data structure, relationships,
and helper accessor methods.

Features:
- Mass assignable course fields
- Image URL accessor for proper image path handling
- Relationships with materials, lectures, exams
- Many-to-many relationships with students and doctors

Fillable Fields:
- code: Course code
- img: Course image path
- name_ar: Arabic name
- name_en: English name
- language: Course language
- tools: Tools/technologies used
- description: Course description

Relationships:
- material(): One-to-one with MaterialsSchedule
- lectures(): One-to-many with LectureSchedule
- exams(): One-to-many with ExameSchedule
- students(): Many-to-many with Student (course_student table)
- doctors(): Many-to-many with Doctor (doctor_courses table)

Accessor:
- getImgUrlAttribute():
  Returns full URL for course image depending on storage path

Author:
Nada Khaled

Notes:
- Uses HasFactory for factory support
- Uses Notifiable for notification capabilities
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Course extends Model
{
    use Notifiable;

    use HasFactory;
    protected $fillable = [
        'code',
        'img',
        'name_ar',
        'name_en',
        'language',
        'tools',
        'description',
    ];

    public function getImgUrlAttribute()
    {
        if (str_starts_with($this->img, 'assets/') || str_starts_with($this->img, '/assets/')) {
            return asset($this->img);
        }
        return asset('storage/' . $this->img);
    }

    public function material()
    {
        return $this->hasOne(MaterialsSchedule::class);
    }

    public function lectures()
    {
        return $this->hasMany(LectureSchedule::class);
    }

    public function exams()
    {
        return $this->hasMany(ExameSchedule::class);
    }

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'course_student',
            'course_id',
            'student_id'
        );
    }

    public function doctors()
    {
        return $this->belongsToMany(
            Doctor::class,
            'doctor_courses',
            'course_id',
            'doctor_id'
        )->withTimestamps();
    }

}
