<?php
/*
========================================
File: Place.php

Description:
Eloquent model representing physical locations
within the system (buildings, halls, floors).

Purpose:
- Stores location details for lectures and doctors
- Used to assign places to schedules and office locations

Fillable Fields:
- build_name: Building name
- hall_name: Hall/room name
- floor: Floor number or name

Relationships:
- lectures():
  One-to-many relationship with LectureSchedule model

- doctors():
  One-to-many relationship with Doctor model

Author:
Christin Mokbel

Notes:
- Used as a reference table for locations
- Can be extended to include more location details if needed
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'build_name',
        'hall_name',
        'floor',
    ];

    public function lectures()
    {
        return $this->hasMany(LectureSchedule::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
