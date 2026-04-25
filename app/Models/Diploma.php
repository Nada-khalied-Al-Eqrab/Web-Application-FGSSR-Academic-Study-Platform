<?php
/*
========================================
File: Diploma.php

Description:
Eloquent model representing the Diploma entity.
Defines diploma data structure and its relationships.

Features:
- Mass assignable fields for diploma information
- Image URL accessor for handling image paths
- Relationships with courses and students

Fillable Fields:
- code: Unique diploma code
- name_ar: Diploma name in Arabic
- name_en: Diploma name in English
- description: Detailed description of the diploma
- img: Diploma image path

Relationships:
- courses():
  Many-to-many relationship with Course model
  using course_diploma pivot table
  Includes pivot fields: type, prerequisite

- students():
  One-to-many relationship with Student model

Accessor:
- getImgUrlAttribute():
  Returns full URL for diploma image based on storage path

Author:
Nada Khaled

Notes:
- Uses HasFactory trait for factory support
- Supports pivot table customization for course relationships
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name_ar',
        'name_en',
        'description',
        'img',
    ];

    public function getImgUrlAttribute()
    {
        if (str_starts_with($this->img, 'assets/') || str_starts_with($this->img, '/assets/')) {
            return asset($this->img);
        }
        return asset('storage/' . $this->img);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_diploma')
            ->withPivot('type', 'prerequisite');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
