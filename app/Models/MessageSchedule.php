<?php
/*
========================================
File: MessageSchedule.php

Description:
Eloquent model representing messages
exchanged within a course.

Purpose:
- Stores user messages related to courses
- Supports communication between users
  (students, doctors, admins)

Table:
- messages

Fillable Fields:
- course_id: Reference to the related course
- user_id: Reference to the sender (user)
- message: Message content

Relationships:
- user():
  Belongs to User model

Author:
Dina Salah

Notes:
- Uses HasFactory trait for factory support
- Can be extended to include course relationship if needed
- Useful for chat/discussion features inside courses
========================================
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MessageSchedule extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'course_id',
        'user_id',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
